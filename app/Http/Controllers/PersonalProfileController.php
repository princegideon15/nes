<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Library;
use App\PersonalProfile;
use App\RegistrationProfile;
use App\Feedback;
use Auth;

class PersonalProfileController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        
        $user_info = User::personalProfile(Auth::user()->user_id);
        $personal = PersonalProfile::where('pp_user_id', Auth::user()->user_id)->get()->toArray();
        $registration = RegistrationProfile::where('reg_user_id', Auth::user()->user_id)->get()->toArray();
        $feedbacks = Feedback::getClientFeedbacksById(Auth::user()->user_id);
        return view('profile', compact('user_info', 'personal', 'registration', 'feedbacks'));
    }
    
    public function updateAccount(Request $request){

        $data = array();
        $uid = random_int(100000, 999999);

        $data['password'] = Hash::make($request->input('password'));
        $data['password_copy'] = $request->input('password');
       
        User::where('user_id' , Auth::user()->user_id)->update($data);
    }
    
    public function updatePersonal(Request $request){

        $data = array();

        $model = new PersonalProfile;
        $row = $model->getTableColumns('tblpersonal_profiles');
        foreach($row as $field){
                $data[$field] = $request->input($field);
        }

        PersonalProfile::where('pp_user_id' , Auth::user()->user_id)->update(array_filter($data));
    }

    public function getCurrentAddress(){
        return PersonalProfile::where('pp_user_id', Auth::user()->user_id)->get()->toArray();
    }
}
