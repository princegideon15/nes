<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\MessageBag;
use App\Mail\ResetPasswordLink;
use Illuminate\Support\Facades\Mail;
use Auth;
use Hash;
use Cookie;
use DB;
use Carbon\Carbon;
use Session;
use Crypt;
use Browser;

use App\User;
use App\PersonalProfile;
use App\Logs;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
   * The maximum number of attempts to allow.
   *
   * @return int
   */
    protected $maxAttempts = 3;


    /**
     * The number of minutes to throttle for.
     *
     * @return int
     */
    protected $decayMinutes = 3;

    protected $attempts = 0;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::OTP;
    // protected $redirectTo = '/otp';

    private $ipaddress;

    /**
     * Get IP address of the user
     *
     * @return void
     */
    public function get_ip(){
        
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN'; 

            return $ipaddress;
    }   

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

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
            'password.confirmed' => 'The password you’ve entered is incorrect.',
        ];
    }

    public function index(){
        return view('auth.login');
    }

    public function doLogin(Request $req){

        $os = Browser::platformFamily() . ' ' . Browser::platFormVersion();
        $browser = Browser::browserName();
        $date = date("F j, Y, g:i a");
        $ip = request()->ip();

        // get info of user by email
        $user_email = $req->email;
        $admin = 'nrcp.execom@gmail.com';

        $userdata = array(
            'email' => $req->email,
            'password'  => $req->password,
            // 'status' => 1,
        );

        $remember_me = $req->has('remember_me') ? true : false; 

        if($remember_me == 1){
            $rem = Cookie::forever('remember', $remember_me);
            $email = Cookie::forever('email', $req->email);
            $pass = Cookie::forever('password', $req->password);
        }else{
            $rem = Cookie::forget('remember');
            $email = Cookie::forget('email');
            $pass = Cookie::forget('password');
        }

      
        $validator = Validator::make($req->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8'
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
                          'log_description' => 'Login attempt (Account Unregistered)', 
                          'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);

            Logs::create($logs);

            return redirect()->back()->withErrors($validator)->withInput();
        }else{

            $role = User::checkRole($user_email);

            if($role > 0){
    
                $logs = array('log_user_id' => 0, 
                              'log_email' => $req->email, 
                              'log_ip_address' => $ip,
                              'log_user_agent' => $os,
                              'log_browser' => $browser,
                              'log_description' => 'Login attempt (Non-client account)', 
                              'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);
    
                Logs::create($logs);

                $errors = ['email' => 'The email you entered is not a client account.'];
                // validation not successful, send back to form 
                return redirect()->back()->withErrors($errors)->withInput($req->only('email')); // redirect back to the login page, using ->withErrors($errors) you send the error created above
           
            }else{
                // attempt to do the login
                if (Auth::attempt($userdata)) {

                    // validation successful!
                    // redirect them to the secure section or whatever
                    // return Redirect::to('secure');
                    // for now we'll just echo success (even though echoing in a controller is bad)
                    $att = Cookie::forget('attempts');
                    
                    $logs = array('log_user_id' => Auth::user()->user_id, 
                                'log_email' => $req->email, 
                                'log_ip_address' => $ip,
                                'log_user_agent' => $os,
                                'log_browser' => $browser,
                                'log_description' => 'Login successful', 
                                'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);

                    Logs::create($logs);

                    return redirect('/home');
                } 
                else {     
                    // $total = Cookie::get('attempts');
                    // $val = ($total > 0) ? $total++ : 0;
                    // $val++;
                    
                    // $att = Cookie::forever('attempts', $val);

            

                    // if($val > 2   ){ 
                    //     $message = new MessageBag(['error' => ['You\'ve reached the maximum logon attempts. Try again after 3 minutes.']]); // if Auth::attempt fails (wrong credentials) create a new message bag instance.
                    // }else{
                    //     $message = new MessageBag(['error' => ['Password invalid or Account not active. (' . $val .'/3 attempts)']]); // if Auth::attempt fails (wrong credentials) create a new message bag instance.
                    // } 
                    
                    
                    // $this->incrementLoginAttempts($req);

                    $logs = array('log_user_id' => 0, 
                                'log_email' => $req->email, 
                                'log_ip_address' => $ip,
                                'log_user_agent' => $os,
                                'log_browser' => $browser,
                                'log_description' => 'Login attempt (Incorrect Password)', 
                                'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);

                    Logs::create($logs);

                
                    // $data = array('title' => 'Login Attempt', 'name' => $name, 'user_email' => $user_email, 'admin' => $admin, 'os' => $os, 'browser' => $browser, 'date' => $date, 'ip' => $ip);

                    // Mail::send('auth.loginmail', $data, function($message) use ($admin, $name) {
                    //     $message->to($admin, $name)->subject
                    //         ('ExeCom IS Login Attempt Information');
                    //     $message->from('nrcp.execom@gmail.com','ExeCom IS Admin');
                    // });

                    $errors = ['password' => 'The password you’ve entered is incorrect.'];
                    // validation not successful, send back to form 
                    return redirect()->back()->withErrors($errors)->withInput($req->only('email')); // redirect back to the login page, using ->withErrors($errors) you send the error created above
                }
            }
        }

    }

    
    /**
     * Logouts user, flush sessions
     *
     * @return void
     */
    public function logout(){

        $os = Browser::platformFamily() . ' ' . Browser::platFormVersion();
        $browser = Browser::browserName();
        $date = date("F j, Y, g:i a");
        $ip = \Request::ip();

        $logs = array('log_user_id' => Auth::user()->user_id,
                    'log_email' => Auth::user()->email, 
                    'log_ip_address' => $ip,
                    'log_user_agent' => $os,
                    'log_browser' => $browser,
                    'log_description' => 'Logout successful', 
                    'log_controller' => str_replace('App\Http\Controllers\\','', __CLASS__) .'::'. __FUNCTION__);

        Logs::create($logs);

        Session::flush();
        Auth::logout();

        return redirect('/');
    }
}
