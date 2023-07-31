<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Auth;
use App\Mail\ApplicationNotification;
use Illuminate\Support\Facades\Mail;

use App\Contact;
use App\Activity;
use App\Objective;
use App\Venue;
use App\Participant;
use App\Attachment;
use App\Application;
use App\Tracking;
use App\PersonalProfile;
use App\Status;
use App\Particulars;
use App\Http\Controllers\LibraryController;
use App\NrcpBudget;
use App\Counterpart;
use App\OtherCounterpart;
use App\TotalBudget;
use App\User;
use App\EmailNotification;

class ApplicationsController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flag = 2;
        $active = 'bg-gray-900';
        $particulars = Particulars::all();
        $user_info = User::personalProfile(Auth::user()->user_id);
        return view('applications', compact('active', 'flag', 'particulars', 'user_info'));
    }

    /**
     * Form 1 (retreive, save, submit)
     *
     * @return void
     */
    static function getStep1Data(){
        $u_id = Auth::user()->user_id;
        return Contact::getData($u_id);
    }
    
    static function saveStep1(Request $request){

        $form_token = $request->form_token;
            
        $u_id = Auth::user()->user_id;
        $data = array();

        $model = new Contact;
        $row = $model->getTableColumns('tblcontacts');
        foreach($row as $field){
                $data[$field] = $request->input($field);
        }
        $id['con_usr_id'] = $u_id;
        $data['con_usr_id'] = $u_id;
        $data['con_submit'] = 0;

        if($form_token != ''){ // submitted na ang lahat ng form
            
            $check_if_submitted = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_submit'])->con_submit;
           
            if($check_if_submitted == '1'){

                $ref = Str::random(30);
                $data['con_form_token'] = $ref;
                Contact::Create($data)->save();
            }else{
                $ref  = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;
                $data['con_form_token'] = $ref;
                $id['con_form_token'] = $ref;
                Contact::updateOrCreate($id, $data);
            } 
        
        }else{ // dipa submitted ang lahat ng form

            try{
                $current_ref = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;

            }catch(\Exception $e){
                $current_ref = '0';
            }

            if($current_ref == '0'){
                $ref = Str::random(30);
            }else{
                $ref = $current_ref;
            } 

            $check_ref = Contact::where(['con_form_token' => $ref , 'con_usr_id' => $u_id])->get()->count();


            if($check_ref > 0){
                $id['con_form_token'] = $ref;
                $data['con_form_token'] = $ref;
                Contact::updateOrCreate($id, $data);
            }else{
                $data['con_form_token'] = $ref;
                Contact::Create($data)->save();
            }
       
        }

        
        $tracking['description'] = 'Step 1: Contact Information (Saved)';
        $tracking['form_token'] = $ref;
        $tracking['usr_id'] = $u_id;
        Tracking::Create($tracking)->save();
    
    }
    
    static function submitStep1(Request $request){

        $form_token = $request->form_token;
            
        $u_id = Auth::user()->user_id;
        $data = array();

        $model = new Contact;
        $row = $model->getTableColumns('tblcontacts');
        foreach($row as $field){
                $data[$field] = $request->input($field);
        }
        $id['con_usr_id'] = $u_id;
        $data['con_usr_id'] = $u_id;
        $data['con_submit'] = 0;

        if($form_token != ''){ // submitted na ang lahat ng form
            
            $check_if_submitted = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_submit'])->con_submit;
           
            if($check_if_submitted == '1'){

                $ref = Str::random(30);
                $data['con_form_token'] = $ref;
                $data['con_submit'] = 1;
                Contact::Create($data)->save();
            }else{
                $ref  = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;
                $data['con_form_token'] = $ref;
                $data['con_submit'] = 1;
                $id['con_form_token'] = $ref;
                Contact::updateOrCreate($id, $data);
            } 
        
        }else{ // dipa submitted ang lahat ng form

            try{
                $current_ref = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;

            }catch(\Exception $e){
                $current_ref = '0';
            }

            if($current_ref == '0'){
                $ref = Str::random(30);
            }else{
                $ref = $current_ref;
            } 

            $check_ref = Contact::where(['con_form_token' => $ref , 'con_usr_id' => $u_id])->get()->count();
            $data['con_form_token'] = $ref;


            if($check_ref > 0){
                $id['con_form_token'] = $ref;
                $data['con_submit'] = 1;
                Contact::updateOrCreate($id, $data);
            }else{
                Contact::Create($data)->save();
            }
       
        }

        $tracking['description'] = 'Step 1: Contact Information (Submitted)';
        $tracking['form_token'] = $ref;
        $tracking['usr_id'] = $u_id;
        Tracking::Create($tracking)->save();
    }

    /**
     * Form 2 (retreive, save, submit)
     *
     * @return void
     */
    static function getStep2Data(){
        $u_id = Auth::user()->user_id;
        $stps_id = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        return Activity::getData($u_id, $stps_id);
    }

    static function saveStep2(Request $request){
        $u_id = Auth::user()->user_id;
        
        $arr1= array();
        foreach($request->act_req_id as $key => $value){
            array_push($arr1, $value);
        }

        $arr2= array();
        foreach($request->act_spec_act as $key => $value){
            array_push($arr2, $value);
        }

        $data = array();

        $model = new Activity;
        $row = $model->getTableColumns('tblact_requests');
        foreach($row as $field){
                $data[$field] = $request->input($field);
        }


        $id['act_usr_id'] = $u_id;
        $id['act_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['act_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['act_req_id'] = implode(', ', $arr1);
        $data['act_spec_act'] = implode(', ', $arr2);
        $data['act_usr_id'] = $u_id;
        $data['act_submit'] = 0;
        $data['act_form_token'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;

        Activity::updateOrCreate($id, $data);

        $tracking['description'] = 'Step 2: Type of Activity (Saved)';
        $tracking['form_token'] = $data['act_form_token'];
        $tracking['usr_id'] = $u_id;
        Tracking::Create($tracking)->save();
    }

    static function submitStep2(Request $request){

        $u_id = Auth::user()->user_id;
        
        $arr1= array();
        foreach($request->act_req_id as $key => $value){
            array_push($arr1, $value);
        }
        $arr2= array();
        foreach($request->act_spec_act as $key => $value){
            array_push($arr2, $value);
        }

        $data = array();

        $model = new Activity;
        $row = $model->getTableColumns('tblact_requests');
        foreach($row as $field){
                $data[$field] = $request->input($field);
        }


        $id['act_usr_id'] = $u_id;
        $id['act_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['act_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['act_req_id'] = implode(', ', $arr1);
        $data['act_spec_act'] = implode(', ', $arr2);
        $data['act_usr_id'] = $u_id;
        $data['act_submit'] = 1;
        $data['act_form_token'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;

        Activity::updateOrCreate($id, $data);

        $tracking['description'] = 'Step 2: Type of Activity (Submitted)';
        $tracking['form_token'] = $data['act_form_token'];
        $tracking['usr_id'] = $u_id;
        Tracking::Create($tracking)->save();
    }

    /**
     * Form 3 (retreive, save, submit)
     *
     * @return void
     */
    static function getStep3Data(){
        $u_id = Auth::user()->user_id;
        $stps_id = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        return Objective::getData($u_id, $stps_id);
    }
    
    static function saveStep3(Request $request){

        $u_id = Auth::user()->user_id;
        $data = array();

        $model = new Objective;
        $row = $model->getTableColumns('tblobjectives');
        foreach($row as $field){
                $data[$field] = $request->input($field);
        }

        foreach($request->obj as $key => $value){
            $key++;
            $data['obj_' . $key] = $value;
        }

        $id['obj_usr_id'] = $u_id;
        $id['obj_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['obj_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['obj_usr_id'] = $u_id;
        $data['obj_submit'] = 0;
        $data['obj_form_token'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;

        Objective::updateOrCreate($id, $data);

        $tracking['description'] = 'Step 3: Objectives (Saved)';
        $tracking['form_token'] = $data['obj_form_token'];
        $tracking['usr_id'] = $u_id;
        Tracking::Create($tracking)->save();
    }
    
    static function submitStep3(Request $request){
    
        $u_id = Auth::user()->user_id;
        $data = array();

        $model = new Objective;
        $row = $model->getTableColumns('tblobjectives');
        foreach($row as $field){
                $data[$field] = $request->input($field);
        }

        foreach($request->obj as $key => $value){
            $key++;
            $data['obj_' . $key] = $value;
        }

        $id['obj_usr_id'] = $u_id;
        $id['obj_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['obj_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['obj_usr_id'] = $u_id;
        $data['obj_submit'] = 1;
        $data['obj_form_token'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;
        
        Objective::updateOrCreate($id, $data);
        
        $tracking['description'] = 'Step 3: Objectives (Submitted)';
        $tracking['form_token'] = $data['obj_form_token'];
        $tracking['usr_id'] = $u_id;
        Tracking::Create($tracking)->save();
    }

    /**
     * Form 4 (retreive, save, submit)
     *
     * @return void
     */
    static function getStep4Data(){
        $u_id = Auth::user()->user_id;
        $stps_id = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        return Venue::getData($u_id, $stps_id);
    }
    
    static function saveStep4(Request $request){

        $u_id = Auth::user()->user_id;
        $data = array();

        $arr1= array();
        foreach($request->ven_spec as $key => $value){
            array_push($arr1, $value);
        }

        $model = new Venue;
        $row = $model->getTableColumns('tblvenue_specs');
        foreach($row as $field){
                $data[$field] = $request->input($field);
        }

        $id['ven_usr_id'] = $u_id;
        $id['ven_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['ven_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['ven_spec'] = implode(', ', $arr1);
        $data['ven_usr_id'] = $u_id;
        $data['ven_submit'] = 0;
        $data['ven_form_token'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;

        Venue::updateOrCreate($id, $data);

        $tracking['description'] = 'Step 4: Venue Specifications (Saved)';
        $tracking['form_token'] = $data['ven_form_token'];
        $tracking['usr_id'] = $u_id;
        Tracking::Create($tracking)->save();
    }
    
    static function submitStep4(Request $request){

        $u_id = Auth::user()->user_id;
        $data = array();

        $arr1= array();
        foreach($request->ven_spec as $key => $value){
            array_push($arr1, $value);
        }

        $model = new Venue;
        $row = $model->getTableColumns('tblvenue_specs');
        foreach($row as $field){
                $data[$field] = $request->input($field);
        }

        $id['ven_usr_id'] = $u_id;
        $id['ven_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['ven_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['ven_spec'] = implode(', ', $arr1);
        $data['ven_usr_id'] = $u_id;
        $data['ven_submit'] = 1;
        $data['ven_form_token'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;

        Venue::updateOrCreate($id, $data);

        $tracking['description'] = 'Step 4: Venue Specifications (Submitted)';
        $tracking['form_token'] = $data['ven_form_token'];
        $tracking['usr_id'] = $u_id;
        Tracking::Create($tracking)->save();
    }

    /**
     * Form 5 (retreive, save, submit)
     *
     * @return void
     */
    static function getStep5Data(){
        $u_id = Auth::user()->user_id;
        $stps_id = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        return Participant::getData($u_id, $stps_id);
    }
    
    static function saveStep5(Request $request){

        $u_id = Auth::user()->user_id;
        $prt_count = 1;
        for($i = 0; $i < count($request->all()); $i++){ 
            
            $data = array();
            foreach($request[$i] as $key => $value){
                $data[$key] = $value;
                $data['prt_id'] = $prt_count;
            }
       
            $id['prt_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
            $id['prt_id'] = $prt_count; 
            $data['prt_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
            $data['prt_usr_id'] = $u_id;
            $data['prt_submit'] = 0;    
            $data['prt_form_token'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;
    
            Participant::updateOrCreate($id, $data);
            $prt_count++;
        }

        $tracking['description'] = 'Step 5: Participants (Saved)';
        $tracking['form_token'] = $data['prt_form_token'];
        $tracking['usr_id'] = $u_id;
        Tracking::Create($tracking)->save();
    }
    
    static function submitStep5(Request $request){

        $u_id = Auth::user()->user_id;
        $prt_count = 1;
        for($i = 0; $i < count($request->all()); $i++){ 
            
            $data = array();
            foreach($request[$i] as $key => $value){
                $data[$key] = $value;
                $data['prt_id'] = $prt_count;
            }
       
            $id['prt_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
            $id['prt_id'] = $prt_count; 
            $data['prt_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
            $data['prt_usr_id'] = $u_id;
            $data['prt_submit'] = 1;
            $data['prt_form_token'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;    
    
            Participant::updateOrCreate($id, $data);
            $prt_count++;
        }

        $tracking['description'] = 'Step 5: Participants (Submitted)';
        $tracking['form_token'] = $data['prt_form_token'];
        $tracking['usr_id'] = $u_id;
        Tracking::Create($tracking)->save();
    }

    static function deleteParticipant($stps_id, $prt_id, $usr_id){

        $data['prt_stps_id'] = $stps_id;
        $data['prt_id'] = $prt_id;
        $data['prt_usr_id'] = $usr_id;

        Participant::where($data)->delete();
    }

    /**
     * Form 6 (retreive, save, submit)
     *
     * @return void
     */
    static function getStep6Data(){
        $u_id = Auth::user()->user_id;
        $stps_id = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        return Attachment::getData($u_id, $stps_id);
    }

    static function getNrcpBudget(){
        $u_id = Auth::user()->user_id;
        $stps_id = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        return NrcpBudget::getData($u_id, $stps_id);
    }

    static function getCounterBudget(){
        $u_id = Auth::user()->user_id;
        $stps_id = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        return Counterpart::getData($u_id, $stps_id);
    }

    static function getOtherBudget(){
        $u_id = Auth::user()->user_id;
        $stps_id = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        return OtherCounterpart::getData($u_id, $stps_id);
    }
    
    static function saveStep6(Request $request){

        $u_id = Auth::user()->user_id;
        $f1 = $request->file('att_lib');
        $f3 = $request->file('att_req_letter');
        $total_nrcp = $request->total_nrcp;
        $total_counter = $request->total_counter;
        $total_other = $request->total_other;

        
        $id['att_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;

        $data = array();

        if($total_nrcp > 350000){
            $f2 = $request->file('att_justification');
            // $att_f2 = $request->att_lib;
            // $data['att_justification'] = ($f2 == '') ? $att_f2 : date('ymhis') . '_' . $f2->getClientOriginalName();
            $data['att_justification'] =  date('ymhis') . '_' . $f2->getClientOriginalName();

            try{
                $old_file2 = Attachment::where('att_stps_id', $id['att_stps_id'])->first(['att_justification'])->att_justification;
                    if($old_file2 != ''){
                        unlink(public_path('storage/attachments/' . $old_file2));
                    }
                    
                    $f2->storePubliclyAs('/public/attachments', $data['att_justification']);
            }catch(\Exception $e){
            }
        }

        // if($f1 != ''){
            $data['att_lib'] = date('ymhis') . '_' . $f1->getClientOriginalName();
            
            try{
                $old_file1 = Attachment::where('att_stps_id', $id['att_stps_id'])->first(['att_lib'])->att_lib;
                if($old_file1 != ''){
                unlink(public_path('storage/attachments/' . $old_file1));
                }
            }catch(\Exception $e){
            }
            
            $f1->storePubliclyAs('/public/attachments', $data['att_lib']);
        // }else{
        //     $data['att_lib'] = $request->att_lib;
        // }

        // if($f3 != ''){
            $data['att_req_letter'] = date('ymhis') . '_' . $f3->getClientOriginalName();
            
            try{
                $old_file3 = Attachment::where('att_stps_id', $id['att_stps_id'])->first(['att_req_letter'])->att_req_letter;
                if($old_file3 != ''){
                unlink(public_path('storage/attachments/' . $old_file3));
                }
            }catch(\Exception $e){
            }

            $f3->storePubliclyAs('/public/attachments', $data['att_req_letter']);
        // }else{
        //     $data['att_lib'] = $request->att_req_letter;
        // }
 

        $data['att_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['att_usr_id'] = $u_id;
        $data['att_submit'] = 0;    
        $data['att_form_token'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;
    
    
        

        Attachment::updateOrCreate($id, $data);

        $nrcp = explode(",",$request->lib_nrcp);

        foreach($nrcp as $key => $value){

            
            $where['lib_stps_id'] =$id['att_stps_id'];
            $where['lib_usr_id'] = $u_id;
            $where['lib_form_token'] = $data['att_form_token'];
            $where['lib_prt_id'] = $key + 1;
        

            $nrcp_arr = ['lib_stps_id' => $id['att_stps_id'],
            'lib_usr_id' => $u_id,
            'lib_form_token' => $data['att_form_token'],
            'lib_prt_id' => $key + 1,
            'lib_amount' => $value,
            ];
            
            NrcpBudget::updateOrCreate($where, $nrcp_arr);
        }

        $counter = explode(",",$request->lib_counter);

        foreach($counter as $key => $value){

            
            $where_cp['cp_stps_id'] =$id['att_stps_id'];
            $where_cp['cp_usr_id'] = $u_id;
            $where_cp['cp_form_token'] = $data['att_form_token'];
            $where_cp['cp_prt_id'] = $key + 1;
        

            $counter_arr = ['cp_stps_id' => $id['att_stps_id'],
            'cp_usr_id' => $u_id,
            'cp_form_token' => $data['att_form_token'],
            'cp_prt_id' => $key + 1,
            'cp_amount' => $value,
            ];
            
            Counterpart::updateOrCreate($where_cp, $counter_arr);
        }

        $other = explode(",",$request->lib_other);

        foreach($other as $key => $value){

            
            $where_oth['liboth_stps_id'] =$id['att_stps_id'];
            $where_oth['liboth_usr_id'] = $u_id;
            $where_oth['liboth_form_token'] = $data['att_form_token'];
            $where_oth['liboth_prt_id'] = $key + 1;
        

            $other_arr = ['liboth_stps_id' => $id['att_stps_id'],
            'liboth_usr_id' => $u_id,
            'liboth_form_token' => $data['att_form_token'],
            'liboth_prt_id' => $key + 1,
            'liboth_amount' => $value,
            ];
            
            OtherCounterpart::updateOrCreate($where_oth, $other_arr);
        }

        $where_bud['bud_stps_id'] =$id['att_stps_id'];
        $where_bud['bud_usr_id'] = $u_id;
        $where_bud['bud_form_token'] = $data['att_form_token'];
    

        $bud_arr = ['bud_stps_id' => $id['att_stps_id'],
        'bud_usr_id' => $u_id,
        'bud_form_token' => $data['att_form_token'],
        'bud_total_nrcp' => $total_nrcp,
        'bud_total_counter' => $total_counter,
        'bud_total_other' => $total_other,
        ];
        
        TotalBudget::updateOrCreate($where_bud, $bud_arr);

        $tracking['description'] = 'Step 6: Budget Required (Saved)';
        $tracking['form_token'] = $data['att_form_token'];
        $tracking['usr_id'] = $u_id;
        Tracking::Create($tracking)->save();
    }
    
    static function submitStep6(Request $request){

        $u_id = Auth::user()->user_id;
        $f1 = $request->file('att_lib');
        $f2 = $request->file('att_justification');
        $f3 = $request->file('att_req_letter');
        $total_nrcp = $request->total_nrcp;
        $total_counter = $request->total_counter;
        $total_other = $request->total_other;

        
        $id['att_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;

        $data = array();

        if($total_nrcp > 350000){
            // $att_f2 = $request->att_lib;
            // $data['att_justification'] = ($f2 == '') ? $att_f2 : date('ymhis') . '_' . $f2->getClientOriginalName();

            try{
                if(isset($f2))
                $data['att_justification'] =  date('ymhis') . '_' . $f2->getClientOriginalName();
                $old_file2 = Attachment::where('att_stps_id', $id['att_stps_id'])->first(['att_justification'])->att_justification;
                    if($old_file2 != ''){
                        unlink(public_path('storage/attachments/' . $old_file2));
                    }
                    
                    $f2->storePubliclyAs('/public/attachments', $data['att_justification']);
            }catch(\Exception $e){
            }
        }

        if(isset($f1)){
            $data['att_lib'] = date('ymhis') . '_' . $f1->getClientOriginalName();
            
            try{
                $old_file1 = Attachment::where('att_stps_id', $id['att_stps_id'])->first(['att_lib'])->att_lib;
                if($old_file1 != ''){
                unlink(public_path('storage/attachments/' . $old_file1));
                }
            }catch(\Exception $e){
            }
            
            $f1->storePubliclyAs('/public/attachments', $data['att_lib']);
        }
        
        if(isset($f3)){
            $data['att_req_letter'] = date('ymhis') . '_' . $f3->getClientOriginalName();
            
            try{
                $old_file3 = Attachment::where('att_stps_id', $id['att_stps_id'])->first(['att_req_letter'])->att_req_letter;
                if($old_file3 != ''){
                unlink(public_path('storage/attachments/' . $old_file3));
                }
            }catch(\Exception $e){
            }

            $f3->storePubliclyAs('/public/attachments', $data['att_req_letter']);
        }

        $data['att_stps_id'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['id'])->id;
        $data['att_usr_id'] = $u_id;
        $data['att_submit'] = 1;    
        $data['att_form_token'] = Contact::where('con_usr_id', $u_id)->orderBy('id', 'desc')->first(['con_form_token'])->con_form_token;
    
    
        

        Attachment::updateOrCreate($id, $data);

        $nrcp = explode(",",$request->lib_nrcp);

        foreach($nrcp as $key => $value){

            
            $where['lib_stps_id'] =$id['att_stps_id'];
            $where['lib_usr_id'] = $u_id;
            $where['lib_form_token'] = $data['att_form_token'];
            $where['lib_prt_id'] = $key + 1;
        

            $nrcp_arr = ['lib_stps_id' => $id['att_stps_id'],
            'lib_usr_id' => $u_id,
            'lib_form_token' => $data['att_form_token'],
            'lib_prt_id' => $key + 1,
            'lib_amount' => $value,
            ];
            
            NrcpBudget::updateOrCreate($where, $nrcp_arr);
        }

        $counter = explode(",",$request->lib_counter);

        foreach($counter as $key => $value){

            
            $where_cp['cp_stps_id'] =$id['att_stps_id'];
            $where_cp['cp_usr_id'] = $u_id;
            $where_cp['cp_form_token'] = $data['att_form_token'];
            $where_cp['cp_prt_id'] = $key + 1;
        

            $counter_arr = ['cp_stps_id' => $id['att_stps_id'],
            'cp_usr_id' => $u_id,
            'cp_form_token' => $data['att_form_token'],
            'cp_prt_id' => $key + 1,
            'cp_amount' => $value,
            ];
            
            Counterpart::updateOrCreate($where_cp, $counter_arr);
        }

        $other = explode(",",$request->lib_other);

        foreach($other as $key => $value){

            
            $where_oth['liboth_stps_id'] =$id['att_stps_id'];
            $where_oth['liboth_usr_id'] = $u_id;
            $where_oth['liboth_form_token'] = $data['att_form_token'];
            $where_oth['liboth_prt_id'] = $key + 1;
        

            $other_arr = ['liboth_stps_id' => $id['att_stps_id'],
            'liboth_usr_id' => $u_id,
            'liboth_form_token' => $data['att_form_token'],
            'liboth_prt_id' => $key + 1,
            'liboth_amount' => $value,
            ];
            
            OtherCounterpart::updateOrCreate($where_oth, $other_arr);
        }

        $where_bud['bud_stps_id'] =$id['att_stps_id'];
        $where_bud['bud_usr_id'] = $u_id;
        $where_bud['bud_form_token'] = $data['att_form_token'];
    

        $bud_arr = ['bud_stps_id' => $id['att_stps_id'],
        'bud_usr_id' => $u_id,
        'bud_form_token' => $data['att_form_token'],
        'bud_total_nrcp' => $total_nrcp,
        'bud_total_counter' => $total_counter,
        'bud_total_other' => $total_other,
        ];
        
        TotalBudget::updateOrCreate($where_bud, $bud_arr);

        $tracking['description'] = 'Step 6: Budget Required (Submitted)';
        $tracking['form_token'] = $data['att_form_token'];
        $tracking['usr_id'] = $u_id;
        $tracking['status'] = 1;
        // $tracking['tracking'] = hexdec(substr(uniqid(), 0, 9));
        Tracking::Create($tracking)->save();

        $user_profile = PersonalProfile::getUserProfile($u_id);

        foreach($user_profile as $row){
            // $email_data['name'] = $row->title_name . ' ' .$row->pp_first_name . ' ' . $row->pp_last_name;
            $name = $row->title_name . ' ' .$row->pp_first_name . ' ' . $row->pp_last_name;
            // $email_data['tracking'] = substr($data['att_form_token'], 0, 12);
            $tracking_num = substr($data['att_form_token'], 0, 12);
            $u_mail = $row->email;
        }

        $email_notif = EmailNotification::where('enc_process_id', 0)->get();

		// add cc/bcc
		foreach($email_notif as $row){
			$email_subject = $row->enc_subject;
			$email_contents = $row->enc_content;

		
            if(isset($row->enc_cc) && $row->enc_cc != ''){
                if( strpos($row->enc_cc, ',') !== false ) {
                    $email_cc = explode(',', preg_replace('/\s+/','',$row->enc_cc));
                }else{
                    $email_cc = array();
                    array_push($email_cc, preg_replace('/\s+/','',$row->enc_cc));
                }
            }

            if(isset($row->enc_bcc) && $row->enc_bcc != ''){
                if( strpos($row->enc_bcc, ',') !== false ) {
                    $email_bcc = explode(',', preg_replace('/\s+/','',$row->enc_bcc));
                }else{
                    $email_bcc = array();
                    array_push($email_bcc, preg_replace('/\s+/','',$row->enc_bcc));
                }
            }

            
            if(isset($row->enc_user_group) && $row->enc_user_group != ''){
                if( strpos($row->enc_user_group, ',') !== false ) {
                    $email_user_group = explode(',', preg_replace('/\s+/','',$row->enc_user_group));
                    // add exisiting email as cc
                    if(count($email_user_group) > 0){
                        $user_group_emails = array();
                        foreach($email_user_group as $grp){
                            // $username = $this->Email_model->get_user_group_emails($grp);
                            $username = User::where('user_grp_id', $grp)->first(['email'])->email;
                            array_push($user_group_emails, $username);
                        }
                    }
                }else{
                    $email_user_group = array();
                    array_push($email_user_group, $row->enc_user_group);
    
                    // add exisiting email as cc
                    if(count($email_user_group) > 0){
                        $user_group_emails = array();
                        foreach($email_user_group as $grp){
                            // $username = $this->Email_model->get_user_group_emails($grp);
                            $username = User::where('user_grp_id', $grp)->first(['email'])->email;
                            array_push($user_group_emails, $username);
                        }
                    }
                }
            }
		}

        $emailBody = str_replace('[NAME]', $name, $email_contents);
		$emailBody = str_replace('[TRACKING_NUM]', $tracking_num, $emailBody);

        $email_data['content'] = $emailBody;
        $email_data['subject'] = $email_subject;

       
        if(isset($user_group_emails)){

            if(isset($email_bcc)){
                $email_bcc = array_merge($email_bcc,$user_group_emails);
            }else{
                $email_bcc = $user_group_emails;
            }
        }

        $mail = Mail::to($u_mail);

        
        if(isset($email_cc)){
            $mail->cc($email_cc);
        }

        if(isset($email_bcc)){
            $mail->bcc($email_bcc);
        }
        
        $mail->send(new ApplicationNotification($email_data));

    
        // update application status

		$stat['app_stps_id'] = $id['att_stps_id'];
		$stat['app_status'] = 0;
		$stat['app_usr_id'] = $u_id;
		$stat['app_form_token'] = $data['att_form_token'];

        $stat_id['app_stps_id'] = $id['att_stps_id'];
		$stat_id['app_usr_id'] = $u_id;
		$stat_id['app_form_token'] = $data['att_form_token'];

        Status::updateOrCreate($stat_id, $stat);
    }

    // TESTS

    public function tester(){
        return EmailNotification::where('enc_process_id', '44')->first(['enc_subject'])->enc_subject;
        exit;
        $next_processor = User::where('user_grp_id', '10')->first(['email'])->email;
        return $next_processor;
        $activity = Activity::where([
            'act_stps_id' => 1,
            'act_form_token' => 'kGf9qMeEdFH1i7tp40nQJ9RR5m5W9O',
            'act_usr_id' => '596074'])
            ->first(['act_req_id'])->act_req_id;

            $actsarr = (new LibraryController)->getActType();

            $arr = explode(', ', $activity);
         
            $acts = array();
            

            foreach($arr as $value){
                foreach($actsarr as $row){
                    if($value == $row->act_id){
                            array_push($acts, $row->act_name);
                    }
                }
            }
            return implode(', ',$acts);

            // foreach($actsarr as $row){
            //     // return $row->act_name;
            //     foreach($arr as $value){
            //         if($value == $row->act_name){
            //             return $value;
            //         }
            //     }
            // }
            // arr.forEach((activity, act_index) =>{
            //     this.activities.forEach((value, index) => {
            //     if(parseInt(activity - 1) == index){
            //         acts.push(value)
            //     }
            //     })
            // })
    
exit;

        $email_notif = EmailNotification::where('enc_process_id', 0)->get();


        $arr1 = [];
        $arr2 = ['3','4'];
        return array_merge($arr1, $arr2);exit;


		foreach($email_notif as $row){
			if( strpos($row->enc_cc, ',') !== false ) {
				$email_cc = explode(',', $row->enc_cc);
		    }else{
				$email_cc = array();
				array_push($email_cc, $row->enc_cc);
			}

			if( strpos($row->enc_bcc, ',') !== false ) {
				$email_bcc = explode(',', $row->enc_bcc);
		    }else{
				$email_bcc = array();
				array_push($email_bcc, $row->enc_bcc);
			}

            return $email_cc;
            // return $email_bcc;
        }
    }

    public function send_email_test(){
        
        $user_profile = PersonalProfile::getUserProfile(257663);

        foreach($user_profile as $row){
            $email_data['name'] =  $row->title_name . ' ' .$row->pp_first_name . ' ' . $row->pp_last_name;
            $u_mail = $row->email;
        }

        Mail::to($u_mail)->send(new ApplicationNotification($email_data));

    }

    /**
     * get all applications by user id
     */
    static function getApplicationsData(){
        return Application::getData(Auth::user()->user_id);
        // return Application::getData();
    }

    /**
     * count participants by application id
     */
    static function countParticipants($value){
        return Participant::where('prt_stps_id', $value)->get()->count();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($token)
    {
        $u_id = Auth::user()->user_id;
        $flag = '';
        $active = '';
        $contact = Contact::where('con_usr_id', $u_id)->where('con_form_token', $token)->get();
        $activity = Activity::where('act_usr_id', $u_id)->where('act_form_token', $token)->get();
        $objective = Objective::where('obj_usr_id', $u_id)->where('obj_form_token', $token)->get();
        $venue = Venue::where('ven_usr_id', $u_id)->where('ven_form_token', $token)->get();
        $participant = count(Participant::where('prt_usr_id', $u_id)->where('prt_form_token', $token)->get());
        $attachment = Attachment::where('att_usr_id', $u_id)->where('att_form_token', $token)->get();

        $regions = (new LibraryController)->getRegions();
        $provinces = Application::getProvinces();
        $cities = Application::getCities();
        $activities =(new LibraryController)->getActType();
        $venues =(new LibraryController)->getVenSpec();
        
        $tracking = Tracking::getTracking($u_id, $token);
        $user_info = User::personalProfile(Auth::user()->user_id);
        
        return view('app_data', compact('active', 
                                        'flag', 
                                        'contact',
                                        'activity',
                                        'objective',
                                        'venue',
                                        'participant',
                                        'attachment',
                                        'regions',
                                        'provinces',
                                        'cities',
                                        'activities',
                                        'venues',
                                        'tracking',
                                        'user_info'
                                        ));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
