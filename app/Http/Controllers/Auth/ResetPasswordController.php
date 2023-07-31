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
use Carbon\Carbon;
use App\User;
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

            return redirect()->back()->withErrors($validator)->withInput();
        }else{ 

            $user_profile = PersonalProfile::getUserProfileByEmail($user_email);

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
            
            return view('auth.verify', compact('tokenData'));
        }
    }
    
    public function resend($token){

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

            'confirm-password.required' => 'Repeat password is required.',
            'confirm-password.min' => 'Repeat password must be at least 8 characters.',
            'confirm-password.same' => 'New passwords must match.'
        ];
    }

    public function confirm(Request $req){
         // get email from token
         $user_email = DB::table('password_resets')
         ->where('token', $req->token)->first()->email;
        
        $validator = Validator::make($req->all(), [
            'password' => 'required|string|min:8',
            'confirm-password' => 'required|string|min:8|same:password'
        ], $this->messages());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{ 

            $userData = array(
                'password'  => Hash::make($req->password),
                'password_copy' => $req->password,
            );

            User::where('email', $user_email)->update($userData);

            return redirect('/')->withSuccess('Reset Password Successfull! You can now log in.');
        }

    }
}
