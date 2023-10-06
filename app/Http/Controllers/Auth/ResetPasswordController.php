<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\MessageBag;
use Auth;
use DB;
use Hash;
use Browser;
use Carbon\Carbon;
use App\User;
use App\Logs;
use App\PersonalProfile;
use App\Mail\ResetPasswordLink;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    // use ResetsPasswords;

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function index($token){
        $token = $token;
        return view('auth.passwords.reset', compact('token'));
    }
    
    public function verify(Request $req){

        $os = Browser::platformFamily() . ' ' . Browser::platFormVersion();
        $browser = Browser::browserName();
        $date = date("F j, Y, g:i a");
        $ip = request()->ip();
        
        $user_email = $req->email;

        $userdata = array(
            'email' => $req->email,
        );

        $validator = Validator::make($req->all(), [
            'email' => 'required|email|exists:users',
        ], $this->messages());


        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($req)) {
            $this->fireLockoutEvent($req);
            return $this->sendLockoutResponse($req);
        }

        if ($validator->fails()) {

            $logs = array('log_user_id' => 0, 
                          'log_email' => $req->email, 
                          'log_ip_address' => $ip,
                          'log_user_agent' => $os,
                          'log_browser' => $browser,
                          'log_description' => 'Reset password attempt (Incorrect/Unregistered account)', 
                          'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);

            Logs::create($logs);

            return redirect()->back()->withErrors($validator)->withInput();
        }else{ 

            $user_profile = PersonalProfile::getUserProfileByEmail($user_email);

            if(count($user_profile) > 0){
               
                //select info by email
                foreach($user_profile as $row){
                    $email_data['name'] =  $row->title_name . ' ' . $row->pp_first_name . ' ' . $row->pp_last_name;
                }
                
                //Create Password Reset Token
                DB::table('password_resets')->insert([
                    'email' => $user_email,
                    'token' => Str::random(60),
                    'created_at' => Carbon::now()
                ]);

                //Get the token just created above
                $tokenData = DB::table('password_resets')
                ->where('email', $user_email)->first()->token;

                $email_data['token'] =  $tokenData;

                Mail::to($user_email)->send(new ResetPasswordLink($email_data));

                
                $logs = array('log_user_id' => 0, 
                'log_email' => $req->email, 
                'log_ip_address' => $ip,
                'log_user_agent' => $os,
                'log_browser' => $browser,
                'log_description' => 'Password reset link sent successful', 
                'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);

                Logs::create($logs);

                return view('auth.verify', compact('tokenData'));
                
            }else{
                
                $logs = array('log_user_id' => 0, 
                'log_email' => $req->email, 
                'log_ip_address' => $ip,
                'log_user_agent' => $os,
                'log_browser' => $browser,
                'log_description' => 'Reset password attempt (Incorrect/Unregistered account)', 
                'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);

                Logs::create($logs);

                $errors = ['email' => 'The email you entered isn’t connected to an account.'];
                // validation not successful, send back to form 
                return redirect()->back()->withErrors($errors)->withInput($req->only('email')); // redirect back to the login page, using ->withErrors($errors) you send the error created above
            }

            
            
        }
    }
    
    public function resend($token){

        $os = Browser::platformFamily() . ' ' . Browser::platFormVersion();
        $browser = Browser::browserName();
        $date = date("F j, Y, g:i a");
        $ip = request()->ip();

        // get email from token
         $user_email = DB::table('password_resets')
         ->where('token', $token)->first()->email;

        // get token
         $tokenData = DB::table('password_resets')
         ->where('email', $user_email)->first()->token;
        
        $user_profile = PersonalProfile::getUserProfileByEmail($user_email);

        // select info by email
        foreach($user_profile as $row){
            $email_data['name'] =  $row->title_name . ' ' . $row->pp_first_name . ' ' . $row->pp_last_name;
        }
        
        $email_data['token'] =  $tokenData;

        Mail::to($user_email)->send(new ResetPasswordLink($email_data));

        
        $logs = array('log_user_id' => 0, 
        'log_email' => $user_email, 
        'log_ip_address' => $ip,
        'log_user_agent' => $os,
        'log_browser' => $browser,
        'log_description' => 'Resend reset password link successful', 
        'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);

        Logs::create($logs);
        
        return view('auth.verify', compact('tokenData'));
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(){
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'The email needs to have a valid format.',
            'email.exists' => 'The email you entered isn’t connected to an account.',

            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',

            'confirm-password.required' => 'Confirm Password is required.',
            'confirm-password.min' => 'Confirm Password must be at least 8 characters.',
            'confirm-password.same' => 'Password confirmation does not match.',
            
        ];
    }

    public function confirm(Request $req){

        $os = Browser::platformFamily() . ' ' . Browser::platFormVersion();
        $browser = Browser::browserName();
        $date = date("F j, Y, g:i a");
        $ip = request()->ip();
         // get email from token
         $user_email = DB::table('password_resets')
         ->where('token', $req->token)->first()->email;
        
        $validator = Validator::make($req->all(), [
            'password' => 'required|string|min:8',
            'confirm-password' => 'required|string|min:8|same:password'
        ], $this->messages());

        if ($validator->fails()) {

            $logs = array('log_user_id' => 0, 
            'log_email' => $user_email, 
            'log_ip_address' => $ip,
            'log_user_agent' => $os,
            'log_browser' => $browser,
            'log_description' => 'Reset password mismatch', 
            'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);
    
            Logs::create($logs);
            
            return redirect()->back()->withErrors($validator)->withInput();
        }else{ 

            $userData = array(
                'password'  => Hash::make($req->password),
                'password_copy' => $req->password,
            );

            User::where('email', $user_email)->update($userData);

            $logs = array('log_user_id' => 0, 
            'log_email' => $user_email, 
            'log_ip_address' => $ip,
            'log_user_agent' => $os,
            'log_browser' => $browser,
            'log_description' => 'Reset Password successful', 
            'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);
    
            Logs::create($logs);

            return redirect('/')->withSuccess('Reset Password Successful. You can now log in.');
        }

    }
}
