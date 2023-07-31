<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Library;
use App\PersonalProfile;
use App\RegistrationProfile;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.register');
    }

    public function getRegisteredUsers(Request $request){
        return DB::table('users')->where('email', $request->email)->get()->toArray();
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = array();

        
        $uid = random_int(100000, 999999);

        $data['email'] = $request->input('email');

        // get password in SKMS if member
        if($request->pp_member == 1){
            $data['user_id'] = User::getNrcpMemberAuth($request->email);
        }else{
            $data['password'] = Hash::make($request->input('password'));
            $data['password_copy'] = $request->input('password');
            $data['user_id'] = $uid;
        }
    
        User::create($data);

        // save personal profile non member only
        if($request->pp_member == 2){

            $data1 = array();

            $model1 = new PersonalProfile;
            $row1 = $model1->getTableColumns('tblpersonal_profiles');
            foreach($row1 as $field1){
                    $data1[$field1] = $request->input($field1);
            }
            $data1['pp_user_id'] = $uid;

            PersonalProfile::create($data1);

        }

        // save both registration
        $data2 = array();

        $model2 = new RegistrationProfile;
        $row2 = $model2->getTableColumns('tblregistration_profiles');
        foreach($row2 as $field2){
                $data2[$field2] = $request->input($field2);
        }

        if($request->pp_member == 1){
            $data2['reg_user_id'] = User::getNrcpMemberAuth($request->email);
        }else{
            $data2['reg_user_id'] = $uid;
        }

        RegistrationProfile::create($data2);

        return $data;

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
