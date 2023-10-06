<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Auth;
use App\Mail\ProcessNotification;
use App\Mail\ExpertsNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LibraryController;

use App\Contact;
use App\Activity;
use App\Objective;
use App\Venue;
use App\Participant;
use App\Attachment;
use App\Application;
use App\Tracking;
use App\PersonalProfile;
use App\RegistrationProfile;
use App\Status;
use App\User;
use App\EvaluationA;
use App\EvaluationB;
use App\FinalizationA;
use App\Neep;
use App\EmailNotification;
use App\AdminProfile;
use App\TotalBudget;
use App\PostActReport;
use App\Experts;


use File;
use ZipArchive;
use Response;

class ApplicationsController extends Controller
{
    
    /**
     * Create a new controller instance.getMembers
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function processStep1(Request $request){

     
        // update application status
        $data = [
            'app_remarks' => $request->app_remarks,
            'app_status' => 1
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => 'Endorsed to RIDD-IDS',
            'form_token' => $request->app_form_token,
            'status' => 1,
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->app_remarks
        ];

        Tracking::Create($tracking)->save();

        // send email to next processor/applicant
        $this->sendEmailNotification(1, 10, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
        
    }

    public function processStep2A(Request $request){
        // save attachments
        $f1 = $request->file('eva_evaluation_results');
        $f2 = $request->file('eva_activity_design');
        $f3 = $request->file('eva_program');
        $f4 = $request->file('eva_mechanics');
        $f5 = $request->file('eva_lib');
        $f6 = $request->file('eva_endo_letter');
        
        $file1 = date('ymhis') . '_' . $f1->getClientOriginalName();
        $file2 = date('ymhis') . '_' . $f2->getClientOriginalName();
        $file3 = date('ymhis') . '_' . $f3->getClientOriginalName();
        $file4 = date('ymhis') . '_' . $f4->getClientOriginalName();
        $file5 = date('ymhis') . '_' . $f5->getClientOriginalName();
        $file6 = date('ymhis') . '_' . $f6->getClientOriginalName();

        $upload = [
            'eva_evaluation_results' => $file1,
            'eva_activity_design' => $file2,
            'eva_program' => $file3,
            'eva_mechanics' => $file4,
            'eva_lib' => $file5,
            'eva_endo_letter' => $file6,
            'eva_stps_id' => $request->app_stps_id,
            'eva_form_token' => $request->app_form_token,
            'eva_usr_id' => $request->app_usr_id,
            'eva_remarks' => $request->eva_remarks
        ];

        
        EvaluationA::Create($upload)->save();

        $f1->storePubliclyAs('/public/evaluation_a', $file1);
        $f2->storePubliclyAs('/public/evaluation_a', $file2);
        $f3->storePubliclyAs('/public/evaluation_a', $file3);
        $f4->storePubliclyAs('/public/evaluation_a', $file4);
        $f5->storePubliclyAs('/public/evaluation_a', $file5);
        $f6->storePubliclyAs('/public/evaluation_a', $file6);


        // update application status
        $data = [
            'app_status' => 2,
            'app_remarks' => $request->eva_remarks
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => 'Submitted to OED for approval',
            'form_token' => $request->app_form_token,
            'status' => 2,
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->eva_remarks
        ];

        Tracking::Create($tracking)->save();

        // send email to next processor/applicant
        $this->sendEmailNotification(2, 4, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);

    }
    
    public function processStep2B(Request $request){
        // save attachments
        $f1 = $request->file('eva_draft');
        $f2 = $request->file('eva_evaluation_results');
        $f3 = $request->file('eva_activity_design');
        $f4 = $request->file('eva_program');
        $f5 = $request->file('eva_mechanics');
        $f6 = $request->file('eva_lib');
        $f7 = $request->file('eva_endo_letter');
        
        $file1 = date('ymhis') . '_' . $f1->getClientOriginalName();
        $file2 = date('ymhis') . '_' . $f2->getClientOriginalName();
        $file3 = date('ymhis') . '_' . $f3->getClientOriginalName();
        $file4 = date('ymhis') . '_' . $f4->getClientOriginalName();
        $file5 = date('ymhis') . '_' . $f5->getClientOriginalName();
        $file6 = date('ymhis') . '_' . $f6->getClientOriginalName();
        $file7 = date('ymhis') . '_' . $f7->getClientOriginalName();

        $upload = [
            'eva_draft' => $file1,
            'eva_evaluation_results' => $file2,
            'eva_activity_design' => $file3,
            'eva_program' => $file4,
            'eva_mechanics' => $file5,
            'eva_lib' => $file6,
            'eva_endo_letter' => $file7,
            'eva_stps_id' => $request->app_stps_id,
            'eva_form_token' => $request->app_form_token,
            'eva_usr_id' => $request->app_usr_id,
            'eva_remarks' => $request->eva_remarks
        ];

        
        EvaluationB::Create($upload)->save();

        $f1->storePubliclyAs('/public/evaluation_b', $file1);
        $f2->storePubliclyAs('/public/evaluation_b', $file2);
        $f3->storePubliclyAs('/public/evaluation_b', $file3);
        $f4->storePubliclyAs('/public/evaluation_b', $file4);
        $f5->storePubliclyAs('/public/evaluation_b', $file5);
        $f6->storePubliclyAs('/public/evaluation_b', $file6);
        $f7->storePubliclyAs('/public/evaluation_b', $file7);


        // update application status
        $data = [
            'app_status' => 2
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => 'Submitted to OED for approval',
            'form_token' => $request->app_form_token,
            'status' => 2,
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->eva_remarks
        ];

        Tracking::Create($tracking)->save();

        // send email to next processor/applicant
        $this->sendEmailNotification(2, 4, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
    }

    public function processStep3(Request $request){

        $description = ($request->app_status == 1) ? 'Approved Submitted Evaluation of Request/Proposal' : 'Disapproved Submitted Evaluation of Request/Proposal';
      
        if($request->app_cat == 2){
            $status = '3B';
        }else{
            $status = 3;
        }
        
        // update application status
        $data = [
            'app_remarks' => $request->app_remarks,
            'app_status' => $status
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => $description,
            'form_token' => $request->app_form_token,
            'status' => $status,
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->app_remarks
        ];

        Tracking::Create($tracking)->save();

        if($request->app_cat == 2){
            // send email to next processor/applicant
            $this->sendEmailNotification(3, 10, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
        }else{
            $this->sendEmailNotification(5, 11, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
        }
    }

    public function processStep4B(Request $request){
    
        foreach(json_decode($request->app_experts) as $row){

            $stps = $request->app_stps_id;
            $eid = $row->id;
            $uid = $request->app_usr_id;
            $token = $request->app_form_token;
            $expert_mail = $row->email;
          
           // save tracking status
            $experts = [
                'exp_stps_id' => $stps,
                'exp_form_token' => $token,
                'exp_title' => $row->title,
                'exp_name' => $row->name,
                'exp_expertise' => $row->expertise,
                'exp_email' => $expert_mail,
                'exp_usr_id' => $eid
            ];

            Experts::Create($experts)->save();

            // send email to selected experts
            $expert_name = $row->title . ' ' . $row->name;
            $expertise = $row->expertise;


            $email_data['stps'] = $stps;
            $email_data['eid'] = $eid;
            $email_data['token'] = $token;

            $email_subject = EmailNotification::where('enc_process_id', '44')->first(['enc_subject'])->enc_subject;
            $email_contents = EmailNotification::where('enc_process_id', '44')->first(['enc_content'])->enc_content;
            
    
            $requested_activity = Activity::where([
                                        'act_stps_id' => $stps,
                                        'act_form_token' => $token,
                                        'act_usr_id' => $uid])
                                        ->first(['act_req_id'])->act_req_id;
            
            if($requested_activity == 5){
                $activity = Activity::where([
                    'act_stps_id' => $stps,
                    'act_form_token' => $token,
                    'act_usr_id' => $uid])
                    ->first(['act_req_oth'])->act_req_oth;
            }else{

                $activities = (new LibraryController)->getActType();
                $req_act_arr = explode(', ', $requested_activity);
                $acts_arr = array();
                foreach($req_act_arr as $value){
                    foreach($activities as $row){
                        if($value == $row->act_id){
                                array_push($acts_arr, $row->act_name);
                        }
                    }
                }

                $activity = implode(', ',$acts_arr);
            }

            $date_start = Activity::where([
                'act_stps_id' => $stps,
                'act_form_token' => $token,
                'act_usr_id' => $uid])
                ->first(['act_start'])->act_start;

            $date_end = Activity::where([
                'act_stps_id' => $stps,
                'act_form_token' => $token,
                'act_usr_id' => $uid])
                ->first(['act_end'])->act_end;

            // $date = date_format($date_start,"DD M Y") . ' - ' . date_format($date_end,"DD M Y");
            $new_start = \Carbon\Carbon::createFromFormat('Y-m-d', $date_start)
                        ->format('d M Y');
            $new_end = \Carbon\Carbon::createFromFormat('Y-m-d', $date_end)
                        ->format('d M Y');
            $date = $new_start . ' - ' . $new_end;
                
            $venue = Venue::where([
                'ven_stps_id' => $stps,
                'ven_form_token' => $token,
                'ven_usr_id' => $uid])
                ->first(['ven_address'])->ven_address;

        
            $emailBody = str_replace('[NAME]', $expert_name, $email_contents);
            $emailBody = str_replace('[EXPERTISE]', $expertise, $emailBody);
            $emailBody = str_replace('[ACTIVITY]', $activity, $emailBody);
            $emailBody = str_replace('[DATE]', $date, $emailBody);
            $emailBody = str_replace('[VENUE]', $venue, $emailBody);

            $email_data['content'] = $emailBody;
            $email_data['subject'] = $email_subject;

            Mail::to($expert_mail)->send(new ExpertsNotification($email_data));

        }


        $description = 'Submitted Recommended Expert/s';

        // update application status
        $data = [
            'app_remarks' => $request->app_remarks,
            'app_status' => '4B'
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => $description,
            'form_token' => $request->app_form_token,
            'status' => '4B',
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->app_remarks
        ];

        Tracking::Create($tracking)->save();
    }

    public function processStep4C(Request $request){

        $description = 'Endorsed by RIDD-IDS';

       
        // update application status
        $data = [
            'app_remarks' => $request->app_remarks,
            'app_status' => '3'
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => $description,
            'form_token' => $request->app_form_token,
            'status' => '3',
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->app_remarks
        ];

        Tracking::Create($tracking)->save();

        
        $this->sendEmailNotification(5, 11, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
       
    }

    public function processStep4C_add_experts(Request $request){
    
        foreach(json_decode($request->app_experts) as $row){

            $stps = $request->app_stps_id;
            $eid = $row->id;
            $uid = $request->app_usr_id;
            $token = $request->app_form_token;
            $expert_mail = $row->email;
           
           // save tracking status
            $experts = [
                'exp_stps_id' => $stps,
                'exp_form_token' => $token,
                'exp_title' => $row->title,
                'exp_name' => $row->name,
                'exp_expertise' => $row->expertise,
                'exp_email' => $expert_mail,
                'exp_usr_id' => $eid
            ];

            Experts::Create($experts)->save();


            // send email to selected experts
            $expert_name = $row->title . ' ' . $row->name;
            $expertise = $row->expertise;


            $email_data['stps'] = $stps;
            $email_data['eid'] = $eid;
            $email_data['token'] = $token;

            $email_subject = EmailNotification::where('enc_process_id', '44')->first(['enc_subject'])->enc_subject;
            $email_contents = EmailNotification::where('enc_process_id', '44')->first(['enc_content'])->enc_content;
            
	
            $requested_activity = Activity::where([
                                        'act_stps_id' => $stps,
                                        'act_form_token' => $token,
                                        'act_usr_id' => $uid])
                                        ->first(['act_req_id'])->act_req_id;

            
            if($requested_activity == 5){
                $activity = Activity::where([
                    'act_stps_id' => $stps,
                    'act_form_token' => $token,
                    'act_usr_id' => $uid])
                    ->first(['act_req_oth'])->act_req_oth;
            }else{

                $activities = (new LibraryController)->getActType();
                $req_act_arr = explode(', ', $requested_activity);
                $acts_arr = array();
                foreach($req_act_arr as $value){
                    foreach($activities as $row){
                        if($value == $row->act_id){
                                array_push($acts_arr, $row->act_name);
                        }
                    }
                }

                $activity = implode(', ',$acts_arr);
            }

            $date_start = Activity::where([
                'act_stps_id' => $stps,
                'act_form_token' => $token,
                'act_usr_id' => $uid])
                ->first(['act_start'])->act_start;

            $date_end = Activity::where([
                'act_stps_id' => $stps,
                'act_form_token' => $token,
                'act_usr_id' => $uid])
                ->first(['act_end'])->act_end;

            // $date = date_format($date_start,"DD M Y") . ' - ' . date_format($date_end,"DD M Y");
            $new_start = \Carbon\Carbon::createFromFormat('Y-m-d', $date_start)
                        ->format('d M Y');
            $new_end = \Carbon\Carbon::createFromFormat('Y-m-d', $date_end)
                        ->format('d M Y');
            $date = $new_start . ' - ' . $new_end;
                
            $venue = Venue::where([
                'ven_stps_id' => $stps,
                'ven_form_token' => $token,
                'ven_usr_id' => $uid])
                ->first(['ven_address'])->ven_address;

        
            $emailBody = str_replace('[NAME]', $expert_name, $email_contents);
            $emailBody = str_replace('[EXPERTISE]', $expertise, $emailBody);
            $emailBody = str_replace('[ACTIVITY]', $activity, $emailBody);
            $emailBody = str_replace('[DATE]', $date, $emailBody);
            $emailBody = str_replace('[VENUE]', $venue, $emailBody);

            $email_data['content'] = $emailBody;
            $email_data['subject'] = $email_subject;


            Mail::to($expert_mail)->send(new ExpertsNotification($email_data));
        }

        $description = 'Added Recommended Expert/s';

        // save tracking status
        $tracking = [
            'description' => $description,
            'form_token' => $request->app_form_token,
            'status' => '4B',
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->app_remarks
        ];

        Tracking::Create($tracking)->save();
    }

    public function processStep5(Request $request){

        $description = $request->app_status;

        $budget = TotalBudget::where(['bud_usr_id' => $request->app_usr_id, 'bud_stps_id' => $request->app_stps_id, 'bud_form_token' => $request->app_form_token,])->first(['bud_total_nrcp'])->bud_total_nrcp;
        $status = ($budget > 350000) ? 4 : 7; //4 above limit //7 below limit

        // update application status
        $data = [
            'app_remarks' => $request->app_remarks,
            'app_status' => $status
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => $description,
            'form_token' => $request->app_form_token,
            'status' => $status,
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->app_remarks
        ];

        Tracking::Create($tracking)->save();

        if($status == 4){
            // send email to next processor/applicant
            $this->sendEmailNotification(5, 7, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
        }else{
            // send email to next processor/applicant
            $this->sendEmailNotification(5, 10, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
        }
    }

    public function processStep6(Request $request){

        $description = ($request->app_status == 1) ? 'Approved by STSP Committee' : 'Disapproved by STSP Committee';

        // update application status
        $data = [
            'app_remarks' => $request->app_remarks,
            'app_status' => 5
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => $description,
            'form_token' => $request->app_form_token,
            'status' => 5,
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->app_remarks
        ];

        Tracking::Create($tracking)->save();

        // send email to next processor/applicant
        $this->sendEmailNotification(6, 8, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
    }

    public function processStep7(Request $request){

        $description = ($request->app_status == 1) ? 'Approved by Finance Committee' : 'Disapproved by Finance Committee';

        // update application status
        $data = [
            'app_remarks' => $request->app_remarks,
            'app_status' => 6
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => $description,
            'form_token' => $request->app_form_token,
            'status' => 6,
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->app_remarks
        ];

        Tracking::Create($tracking)->save();

        // send email to next processor/applicant
        $this->sendEmailNotification(7, 9, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
    }

    public function processStep8(Request $request){

        $description = ($request->app_status == 1) ? 'Approved by NRCP GB' : 'Disapproved by NRCP GB';

        // update application status
        $data = [
            'app_remarks' => $request->app_remarks,
            'app_status' => 7
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => $description,
            'form_token' => $request->app_form_token,
            'status' => 7,
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->app_remarks
        ];

        Tracking::Create($tracking)->save();

        // send email to next processor/applicant
        $this->sendEmailNotification(8, 10, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
    }

    public function processStep9A(Request $request){

        // save attachments
        $f1 = $request->file('fin_draft');
        $f2 = $request->file('fin_activity_design');
        $f3 = $request->file('fin_program');
        $f4 = $request->file('fin_mechanics');
        $f5 = $request->file('fin_promo_materials');
        $f6 = $request->file('fin_invi_letter');
        // $f7 = $request->file('fin_travel_doc');
        // $f8 = $request->file('fin_csf');
        $f7 = $request->file('fin_collaterals');
        
        $file1 = date('ymhis') . '_' . $f1->getClientOriginalName();
        $file2 = date('ymhis') . '_' . $f2->getClientOriginalName();
        $file3 = date('ymhis') . '_' . $f3->getClientOriginalName();
        $file4 = date('ymhis') . '_' . $f4->getClientOriginalName();
        $file5 = ($f5 != '') ? date('ymhis') . '_' . $f5->getClientOriginalName() : '';
        $file6 = date('ymhis') . '_' . $f6->getClientOriginalName();
        $file7 = ($f7 != '') ? date('ymhis') . '_' . $f7->getClientOriginalName() : '';
        // $file8 = date('ymhis') . '_' . $f8->getClientOriginalName();
        // $file9 = date('ymhis') . '_' . $f9->getClientOriginalName();

        $upload = [
            'fin_draft' => $file1,
            'fin_activity_design' => $file2,
            'fin_program' => $file3,
            'fin_mechanics' => $file4,
            'fin_promo_materials' => $file5,
            'fin_invi_letter' => $file6,
            // 'fin_travel_doc' => $file7,
            // 'fin_csf' => $file8,
            'fin_collaterals' => $file7,
            'fin_stps_id' => $request->app_stps_id,
            'fin_form_token' => $request->app_form_token,
            'fin_usr_id' => $request->app_usr_id,
            'fin_remarks' => $request->fin_remarks
        ];

        
        FinalizationA::Create($upload)->save();

        $f1->storePubliclyAs('/public/finalization_a', $file1);
        $f2->storePubliclyAs('/public/finalization_a', $file2);
        $f3->storePubliclyAs('/public/finalization_a', $file3);
        $f4->storePubliclyAs('/public/finalization_a', $file4);
        if($f5 != ''){
            $f5->storePubliclyAs('/public/finalization_a', $file5);
        }
        $f6->storePubliclyAs('/public/finalization_a', $file6);
        if($f7 != ''){
        $f7->storePubliclyAs('/public/finalization_a', $file7);
        }
        // $f8->storePubliclyAs('/public/finalization_a', $file8);
        // $f9->storePubliclyAs('/public/finalization_a', $file9);


        // update application status
        $data = [
            'app_status' => 8,
            'app_remarks' => $request->fin_remarks
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => 'Submitted to OED for finalization and approval',
            'form_token' => $request->app_form_token,
            'status' => 8,
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->fin_remarks
        ];

        Tracking::Create($tracking)->save();

        // send email to next processor/applicant
        $this->sendEmailNotification(9, 4, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
    }

    public function processStep10(Request $request){

        $description = ($request->app_status == 1) ? 'Approved by OED' : 'Disapproved by OED';

        // update application status
        $data = [
            'app_remarks' => $request->app_remarks,
            'app_status' => 9
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => $description,
            'form_token' => $request->app_form_token,
            'status' => 9,
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->app_remarks
        ];

        Tracking::Create($tracking)->save();

        // send email to next processor/applicant
        $this->sendEmailNotification(10, 10, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
    }

    public function processStep11(Request $request){

        // save attachments
        $f1 = $request->file('post_travel_docs');
        $f2 = $request->file('post_csf');
        $f3 = $request->file('post_gb_res');
        
        $file1 = ($f1 != '') ? date('ymhis') . '_' . $f1->getClientOriginalName() : '';
        $file2 = ($f2 != '') ? date('ymhis') . '_' . $f2->getClientOriginalName() : '';
        $file3 = ($f3 != '') ? date('ymhis') . '_' . $f3->getClientOriginalName() : '';

        $upload = [
            'post_travel_docs' => $file1,
            'post_csf' => $file2,
            'post_gb_res' => $file3,
            'post_stps_id' => $request->app_stps_id,
            'post_form_token' => $request->app_form_token,
            'post_usr_id' => $request->app_usr_id,
            'post_remarks' => $request->post_remarks
        ];

        
        PostActReport::Create($upload)->save();

        if($f1 != ''){
            $f1->storePubliclyAs('/public/post_activity_report', $file1);
        }
        
        if($f2 != ''){
            $f2->storePubliclyAs('/public/post_activity_report', $file2);
        }
        
        if($f3 != ''){
        $f3->storePubliclyAs('/public/post_activity_report', $file3);
        }


        // update application status
        $data = [
            'app_remarks' => $request->post_remarks,
            'app_status' => 10
        ];

        Status::where([
            'app_stps_id' => $request->app_stps_id,
            'app_form_token' => $request->app_form_token,
            'app_usr_id' => $request->app_usr_id,
        ])->update(array_filter($data));

        // save tracking status
        $tracking = [
            'description' => 'Submitted Post Activity Report',
            'form_token' => $request->app_form_token,
            'status' => 10,
            'usr_id' => Auth::user()->user_id,
            'remarks' => $request->post_remarks
        ];

        Tracking::Create($tracking)->save();

        // send email to director for post activty report
        $this->sendEmailNotification(11, 4, $request->app_stps_id, $request->app_form_token, $request->app_usr_id);
    }   

    public function sendEmailNotification($proc_id, $next_proc, $stps, $token, $uid){

        $email_notif = EmailNotification::where('enc_process_id', $proc_id)->get();

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

        $processor = AdminProfile::select('user_name')->where('user_id', $next_proc)->first(['user_name'])->user_name;
        $tracking_num =  substr($token, 0, 12);
        
        $requested_activity = Activity::where([
                                    'act_stps_id' => $stps,
                                    'act_form_token' => $token,
                                    'act_usr_id' => $uid])
                                    ->first(['act_req_id'])->act_req_id;

        $activities = (new LibraryController)->getActType();

        $req_act_arr = explode(', ', $requested_activity);
         
        $acts_arr = array();
            
        foreach($req_act_arr as $value){
            foreach($activities as $row){
                if($value == $row->act_id){
                        array_push($acts_arr, $row->act_name);
                }
            }
        }

        $activity = implode(', ',$acts_arr);

        $date_start = Activity::where([
            'act_stps_id' => $stps,
            'act_form_token' => $token,
            'act_usr_id' => $uid])
            ->first(['act_start'])->act_start;

        $date_end = Activity::where([
            'act_stps_id' => $stps,
            'act_form_token' => $token,
            'act_usr_id' => $uid])
            ->first(['act_end'])->act_end;

        // $date = date_format($date_start,"DD M Y") . ' - ' . date_format($date_end,"DD M Y");
        $new_start = \Carbon\Carbon::createFromFormat('Y-m-d', $date_start)
                    ->format('d M Y');
        $new_end = \Carbon\Carbon::createFromFormat('Y-m-d', $date_end)
                    ->format('d M Y');
        $date = $new_start . ' - ' . $new_end;
             
        $venue = Venue::where([
            'ven_stps_id' => $stps,
            'ven_form_token' => $token,
            'ven_usr_id' => $uid])
            ->first(['ven_address'])->ven_address;

            
        $focal = Contact::where([
            'id' => $stps,
            'con_form_token' => $token,
            'con_usr_id' => $uid])
            ->first(['con_focal_p'])->con_focal_p;
       
        $emailBody = str_replace('[NAME]', $processor, $email_contents);
		$emailBody = str_replace('[TRACKING_NUM]', $tracking_num, $emailBody);
		$emailBody = str_replace('[ACTIVITY]', $activity, $emailBody);
		$emailBody = str_replace('[DATE]', $date, $emailBody);
		$emailBody = str_replace('[VENUE]', $venue, $emailBody);
		$emailBody = str_replace('[FOCAL_PER]', $focal, $emailBody);

        $email_data['content'] = $emailBody;
        $email_data['subject'] = $email_subject;

        if(isset($user_group_emails)){

            if(isset($email_bcc)){
                $email_bcc = array_merge($email_bcc,$user_group_emails);
            }else{
                $email_bcc = $user_group_emails;
            }
        }
        
        $next_processor = User::where('user_grp_id', $next_proc)->first(['email'])->email;

        $mail = Mail::to($next_processor);

        if(isset($email_cc)){
            $mail->cc($email_cc);
        }

        if(isset($email_bcc)){
            $mail->bcc($email_bcc);
        }
        
        $mail->send(new ProcessNotification($email_data));
    }

    public function downloadZip($att, $token, $uid){
        $zip = new ZipArchive;
        $filename = time() . '_newFileZip.zip';
        $dir = 'storage/zip/' . $filename;

        if($att == 'A'){
            $files = EvaluationA::where(['eva_form_token' => $token, 'eva_usr_id' => $uid])->get();
        
            if ($zip->open(public_path($dir), ZipArchive::CREATE) === TRUE)
            {
    
                foreach ($files as $row) {
                    $zip->addFile(public_path('storage/evaluation_a/'.$row->eva_evaluation_results), $row->eva_evaluation_results);
                    $zip->addFile(public_path('storage/evaluation_a/'.$row->eva_activity_design), $row->eva_activity_design);
                    $zip->addFile(public_path('storage/evaluation_a/'.$row->eva_program), $row->eva_program);
                    $zip->addFile(public_path('storage/evaluation_a/'.$row->eva_mechanics), $row->eva_mechanics);
                    $zip->addFile(public_path('storage/evaluation_a/'.$row->eva_lib), $row->eva_lib);
                    $zip->addFile(public_path('storage/evaluation_a/'.$row->eva_endo_letter), $row->eva_endo_letter);
                }
                
                $zip->close();
            }
            
            $zip_new_name = "Evaluation_A_Attachments_".date("y-m-d-h-i-s").".zip";   
            
        }elseif($att == 'B'){
            $files = EvaluationB::where(['eva_form_token' => $token, 'eva_usr_id' => $uid])->get();

            
        
            if ($zip->open(public_path($dir), ZipArchive::CREATE) === TRUE)
            {
    
                foreach ($files as $row) {
                    $zip->addFile(public_path('storage/evaluation_b/'.$row->eva_draft), $row->eva_draft);
                    $zip->addFile(public_path('storage/evaluation_b/'.$row->eva_evaluation_results), $row->eva_evaluation_results);
                    $zip->addFile(public_path('storage/evaluation_b/'.$row->eva_activity_design), $row->eva_activity_design);
                    $zip->addFile(public_path('storage/evaluation_b/'.$row->eva_program), $row->eva_program);
                    $zip->addFile(public_path('storage/evaluation_b/'.$row->eva_mechanics), $row->eva_mechanics);
                    $zip->addFile(public_path('storage/evaluation_b/'.$row->eva_lib), $row->eva_lib);
                    $zip->addFile(public_path('storage/evaluation_b/'.$row->eva_endo_letter), $row->eva_endo_letter);
                }
                
                $zip->close();
            }
            
            $zip_new_name = "Evaluation_B_Attachments_".date("y-m-d-h-i-s").".zip";   
            
        }else{
            $files = FinalizationA::where(['fin_form_token' => $token, 'fin_usr_id' => $uid])->get();
        
            if ($zip->open(public_path($dir), ZipArchive::CREATE) === TRUE)
            {
      
                foreach ($files as $row) {
                    $zip->addFile(public_path('storage/finalization_a/'.$row->fin_draft), $row->fin_draft);
                    $zip->addFile(public_path('storage/finalization_a/'.$row->fin_activity_design), $row->fin_activity_design);
                    $zip->addFile(public_path('storage/finalization_a/'.$row->fin_program), $row->fin_program);
                    $zip->addFile(public_path('storage/finalization_a/'.$row->fin_mechanics), $row->fin_mechanics);
                    if($row->fin_promo_materials != ''){
                        $zip->addFile(public_path('storage/finalization_a/'.$row->fin_promo_materials), $row->fin_promo_materials);
                    }
                    $zip->addFile(public_path('storage/finalization_a/'.$row->fin_invi_letter), $row->fin_invi_letter);
                    // $zip->addFile(public_path('storage/finalization_a/'.$row->fin_travel_doc), $row->fin_travel_doc);
                    // $zip->addFile(public_path('storage/finalization_a/'.$row->fin_csf), $row->fin_csf);
                    if($row->fin_promo_materials != ''){
                        $zip->addFile(public_path('storage/finalization_a/'.$row->fin_collaterals), $row->fin_collaterals);
                    }
                }
                   
                $zip->close();
            }
            
            $zip_new_name = "Finalization_Attachments_".date("y-m-d-h-i-s").".zip";   
        }
      
        $headers = array('Content-Type'=>'application/octet-stream',);

        return response()->download($dir, $zip_new_name, $headers)->deleteFileAfterSend(true);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($stps, $token, $uid)
    {


        $u_id = Auth::user()->user_id;
        $flag = '';
        $active = '';
        $contact = Contact::where(['id' => $stps, 'con_form_token' => $token, 'con_usr_id' => $uid])->get();
        $activity = Activity::where(['act_stps_id' => $stps, 'act_form_token' => $token, 'act_usr_id' => $uid])->get();
        $objective = Objective::where(['obj_stps_id' => $stps, 'obj_form_token' => $token, 'obj_usr_id' => $uid])->get();
        $venue = Venue::where(['ven_stps_id' => $stps, 'ven_form_token' => $token, 'ven_usr_id' => $uid])->get();
        $participant = count(Participant::where(['prt_stps_id' => $stps, 'prt_form_token' => $token, 'prt_usr_id' => $uid])->get());
        $attachment = Attachment::where(['att_stps_id' => $stps, 'att_form_token' => $token, 'att_usr_id' => $uid])->get();
        $participants = Participant::where(['prt_stps_id' => $stps, 'prt_form_token' => $token, 'prt_usr_id' => $uid])->get();

        $regions = (new LibraryController)->getRegions();
        $provinces = Application::getProvinces();
        $cities = Application::getCities();
        $activities =(new LibraryController)->getActType();
        $venues =(new LibraryController)->getVenSpec();
        
        $tracking = Tracking::getTracking($uid, $token);
        $evaluation_a_att = EvaluationA::where(['eva_stps_id' => $stps, 'eva_form_token' => $token, 'eva_usr_id' => $uid])->get();
        $evaluation_b_att = EvaluationB::where(['eva_stps_id' => $stps, 'eva_form_token' => $token, 'eva_usr_id' => $uid])->get();
        $finalization_a_att = FinalizationA::where(['fin_stps_id' => $stps, 'fin_form_token' => $token, 'fin_usr_id' => $uid])->get();
        // $finalization_b_att = FinalizationB::where(['fin_stps_id' => $stps, 'fin_form_token' => $token, 'fin_usr_id' => $uid])->get();
        $post_act_rep_att = PostActReport::where(['post_stps_id' => $stps, 'post_form_token' => $token, 'post_usr_id' => $uid])->get();
        $admin_info = User::adminProfile(Auth::user()->user_id);
        $role = Auth::user()->user_grp_id;
        $app_status = Status::where(['app_stps_id' => $stps, 'app_form_token' => $token, 'app_usr_id' => $uid])->first(['app_status'])->app_status;
        $user_cat = RegistrationProfile::where('reg_user_id', $uid)->first(['reg_category'])->reg_category;
       
        $members = (new LibraryController)->getNrcpMembers();
        $experts = Experts::where(['exp_stps_id' => $stps, 'exp_form_token' => $token])->get();
        $budget = TotalBudget::where(['bud_stps_id' => $stps, 'bud_form_token' => $token])->first(['bud_total_nrcp'])->bud_total_nrcp;

        return view('admin.app_data', compact('active', 
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
                                        'admin_info',
                                        'role',
                                        'app_status',
                                        'user_cat',
                                        'evaluation_a_att',
                                        'evaluation_b_att',
                                        'finalization_a_att',
                                        'post_act_rep_att',
                                        'members',
                                        'experts',
                                        'budget',
                                        'participants'
                                        ));

    }

       // public function processStep4Bx(Request $request){

    //     $description = 'Submitted Recommended Expert/s';

    //     // update application status
    //     $data = [
    //         'app_remarks' => $request->app_remarks,
    //         'app_status' => '4B'
    //     ];

    //     Status::where([
    //         'app_stps_id' => $request->app_stps_id,
    //         'app_form_token' => $request->app_form_token,
    //         'app_usr_id' => $request->app_usr_id,
    //     ])->update(array_filter($data));

    //     // save tracking status
    //     $tracking = [
    //         'description' => $description,
    //         'form_token' => $request->app_form_token,
    //         'status' => '4B',
    //         'usr_id' => Auth::user()->user_id,
    //         'remarks' => $request->app_remarks
    //     ];

    //     Tracking::Create($tracking)->save();

    //     // save request to neep database
    //     // todo get info institution name and address
    //     $file = $request->file('neep_req_letter');
    //     $req_letter = date('ymhis') . '_' . $file->getClientOriginalName();
    //     Storage::disk('neep')->put($req_letter, $req_letter);

    //     $contact = Contact::where(['con_form_token' => $request->app_form_token, 'con_usr_id' => $request->app_usr_id])->get();
    //     $neep = array();

    //     foreach($contact as $row){
    //         $neep['neep_req_inst_name'] = $row->con_ins;
    //         $neep['neep_req_inst_region'] = $row->con_reg;
    //         $neep['neep_req_inst_province'] = $row->con_prov;
    //         $neep['neep_req_inst_city'] = $row->con_city;
    //         $neep['neep_req_inst_brgy'] = $row->con_brgy;
    //         $neep['neep_req_inst_street'] = $row->con_address;
    //     }

    //     $neep['neep_date_of_engagement'] = Activity::where(['act_form_token' => $request->app_form_token, 'act_usr_id' => $request->app_usr_id])->first(['act_start'])->act_start;

    //     $neep['neep_req_needed'] = $request->neep_req_needed;
    //     $neep['neep_req_expert_needed'] = $request->neep_req_expert_needed;
    //     $neep['neep_req_purpose'] = $request->neep_req_purpose;
    //     $neep['neep_req_msg'] = $request->neep_req_msg;
    //     $neep['neep_req_letter'] = $req_letter;
    //     $neep['neep_req_usr_id'] = $request->app_usr_id;
    //     $neep['neep_nes_token'] = $request->app_form_token;
    //     $neep['date_created'] = date('Y-m-d H:i:s');

    //     $current_year = date('y');

    //     $check_tracking = Neep::checkTrackingByYear($current_year);

    //     $neep['neep_req_tracking_no'] = (count($check_tracking) > 0 ) ? count($check_tracking) + 1 : 1; 

    //     Neep::SubmitRequest($neep);

    //     // send email to next processor/applicant
    //     $next_processor = User::where('user_grp_id', '8')->get(['email']);
    //     $email_data['name'] = AdminProfile::select('user_name')->where('user_id', '8')->first(['user_name'])->user_name;
    //     $email_data['content'] = EmailNotification::where('enc_process_id', '5')->first(['enc_content'])->enc_content;
    //     $email_data['subject'] = EmailNotification::where('enc_process_id', '5')->first(['enc_subject'])->enc_subject;

    //     Mail::to($next_processor)->send(new ProcessNotification($email_data));
    // }
}
