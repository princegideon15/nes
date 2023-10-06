<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailNotificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblemail_notifications')->truncate();
        DB::table('tblemail_notifications')->insert([
            [
                'enc_process_id' => '0',
                'enc_description' => 'Client submitted STPS application',
                'enc_subject' => 'Application Received',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email is to confirm that you have successfully submitted your application. This will be processed and taken through the next Step.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]</strong>',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '1',
                'enc_description' => 'Endorsed to RIDD-IDS',
                'enc_subject' => 'Step 1: Application Process For Your Action',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that you have a pending application to process. Please review the application and complete the necessary evaluations at your earliest convenience.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '2',
                'enc_description' => 'Submitted to OED for approval',
                'enc_subject' => 'Step 2: Application Process For Your Action',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that you have a pending application to process. Please review the application and complete the necessary evaluations at your earliest convenience.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '3',
                'enc_description' => 'Approved/Disapproved Submitted Evaluation of Request/Proposal',
                'enc_subject' => 'Step 3: Application Process For Your Action',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that you have a pending application to process. Please review the application and complete the necessary evaluations at your earliest convenience.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '4',
                'enc_description' => 'Approved by RIDD-IDS',
                'enc_subject' => 'Step 4C: Application Process For Your Action',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that you have a pending application to process. Please review the application and complete the necessary evaluations at your earliest convenience.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '5',
                'enc_description' => 'Approved/Disapproved by Budget',
                'enc_subject' => 'Step 5: Application Process For Your Action',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that you have a pending application to process. Please review the application and complete the necessary evaluations at your earliest convenience.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '6',
                'enc_description' => 'Approved/Disapproved by STSP Committee',
                'enc_subject' => 'Step 6: Application Process For Your Action',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that you have a pending application to process. Please review the application and complete the necessary evaluations at your earliest convenience.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '7',
                'enc_description' => 'Approved/Disapproved by Finance Committee',
                'enc_subject' => 'Step 7: Application Process For Your Action',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that you have a pending application to process. Please review the application and complete the necessary evaluations at your earliest convenience.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '8',
                'enc_description' => 'Approved/Disapproved by NRCP GB',
                'enc_subject' => 'Step 8: Application Process For Your Action',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that you have a pending application to process. Please review the application and complete the necessary evaluations at your earliest convenience.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '9',
                'enc_description' => 'Submitted to OED for finalization and approval',
                'enc_subject' => 'Step 9: Application Process For Your Action',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that you have a pending application to process. Please review the application and complete the necessary evaluations at your earliest convenience.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '10',
                'enc_description' => 'Approved/Disapproved by OED',
                'enc_subject' => 'Step 10: Application Process For Your Action',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that you have a pending application to process. Please review the application and complete the necessary evaluations at your earliest convenience.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '11',
                'enc_description' => 'Submitted Post Activity Report',
                'enc_subject' => 'Last Process: Submitted Post Activity Report',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that RIDD-IDS submitted a post-activity report
                .<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '44',
                'enc_description' => 'Recommended expert/s by RIDD IDS',
                'enc_subject' => 'Recommended Expert',
                'enc_cc' => '',
                'enc_bcc' => '',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /><br /></strong>Greetings!<br /><br />The NRCP EXTENSION SERVICES (NES) principally aim to explain the benefits of basic research to a larger public and how their results may be used and or contribute in addressing local, national, and international problems on health, energy, environment and natural hazards, food and water sustainability and security, peace, governance, and other issues influencing the lives of people across the regions.<br /><br />In recognition of your expertise particularly in [EXPERTISE], may we request you to be our expert in [ACTIVITY] on [DATE] at [VENUE].',
                'enc_user_group' => '',
            ],
            [
                'enc_process_id' => '99',
                'enc_description' => 'Notify OED for submitted application',
                'enc_subject' => 'Application Submitted For Your Action',
                'enc_cc' => '',
                'enc_bcc' => 'gerard.balde@nrcp.dost.gov.ph',
                'enc_content' => 'Dear&nbsp;<strong>[NAME],<br /><br /></strong>This email informs you that you have a pending application to process. Please review the application and complete the necessary evaluations at your earliest convenience.<br /><br />Tracking #:&nbsp;<strong>[TRACKING_NUM]<br /></strong>Acitivty:&nbsp;<strong>[ACTIVITY]<br /></strong>Date:&nbsp;<strong>[DATE]<br /></strong>Venue:&nbsp;<strong>[VENUE]<br /></strong>Focal Person:&nbsp;<strong>[FOCAL_PER]<br /><br /></strong>Other details can be viewed when you log in to your account.',
                'enc_user_group' => '',
            ]
        ]);  
    }
}
