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

        // save authentication
        if($request->pp_member == 1){
            $member = User::getNrcpMemberAuth($request->email);

            foreach($member as $row){
                $data['password'] = $row->usr_password;
                $data['user_id'] = $row->pp_id;
            }
        }else{
            $data['password'] = Hash::make($request->input('password'));
            $data['password_copy'] = $request->input('password');
            $data['user_id'] = $uid;
        }
    
        User::create(array_filter($data));

        // save personal profile
        $data1 = array();
        if($request->pp_member == 1){
        
            // get personal profile
            $member = User::getNrcpMemberAuth($request->email);
            $data1['pp_member'] = $request->pp_member;
            foreach($member as $row){
                $data1['pp_title'] = $row->pp_title;
                $data1['pp_last_name'] = $row->pp_last_name;
                $data1['pp_middle_name'] = $row->pp_middle_name;
                $data1['pp_first_name'] = $row->pp_first_name;
                $data1['pp_extension'] = $row->pp_extension ;
                $data1['pp_age'] = $row->pp_date_of_birth ;
                $data1['pp_sex'] = $row->pp_sex ;
            }

            // get employment details
            $member = User::getNrcpMemberEmp($data['user_id']);
            foreach($member as $row){
                $data1['pp_region'] = $row->emp_region;
                $data1['pp_prov'] = $row->emp_province;
                $data1['pp_city'] = $row->emp_city;
                $data1['pp_brgy'] = $row->emp_address;
                $data1['pp_ins'] = $row->emp_ins;
                $data1['pp_pos'] = $row->emp_pos ;
            }

            $data1['pp_user_id'] = $data['user_id'];
        }else{
            $model1 = new PersonalProfile;
            $row1 = $model1->getTableColumns('tblpersonal_profiles');
            foreach($row1 as $field1){
                    $data1[$field1] = $request->input($field1);
            }
            $data1['pp_user_id'] = $uid;
        }

        PersonalProfile::create(array_filter($data1));

        // save both registration
        $data2 = array();
        $model2 = new RegistrationProfile;
        $row2 = $model2->getTableColumns('tblregistration_profiles');
        foreach($row2 as $field2){
                $data2[$field2] = $request->input($field2);
        }

        if($request->pp_member == 1){
            // $data2['reg_user_id'] = User::getNrcpMemberAuth($request->email);
          
                $data2['reg_user_id'] = $data['user_id'];
            

        }else{
            $data2['reg_user_id'] = $uid;
        }

        RegistrationProfile::create($data2);
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
