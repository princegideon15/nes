# Change Log
All notable changes to this project will be documented in this file.
 
The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [1.63.33] - 2023-9-31

### Added
- added column visibility in logs (admin)
- added titles in every panels (admin/client)
- added show/hide password in sign up page, user account settings (client)
- added show/hide password in user profile (admin)
- added user’s logs (admin)
- added 1 email notification for director for newly submitted application
- added function to send email notification to director for new applications submitted
- added data privacy confirm check button before activating sign up button

### Changed

### Fixed
- fixed breadcrumbs links (admin)
- fixed bug in sign up where email is not validated as nrcp member

## [1.56.31] - 2023-9-15

### Added
- added toggle password in reset password
- added logs in authentication client side
- added logs in reset password
- created delete all participants function
- added show/hide skip button on save
- created functions to display participants in client and admin

### Changed
- modified design of email notification
- modified reset password
- modified save/submit step 1
- modified buttons color, size
- modified save, submit, get data for checked current address STEP1
- disable step 6 on saving step 5 threat detected

### Fixed
- catch admin account in reset password

## [1.50.24] - 2023-8-31

### Added
- added dashboard link in breadcrumbs
- created logo

### Changed
- modified upload files guides
- modified tracking of application
- modified upload files validation
- modified upload files guides
- modified tracking of application
- modified upload files validation
- improved interface admin/client
- improved interface admin/client
- improved interface admin/client
- modified interface: forgot password, registration page, login pages, dashboard, navigation bar, side menu, track app page

### Fixed

## [1.48.14] - 2023-8-15

### Added
- added count for application for processing
- integrated datatables to tables in client account
- added counts of applications susbmitted, on-going process applications, completed applications (client)
- created layout of feedback form
- created logs function (migration, controller, model)
- added logs page
- created star rating function
- added view feedbacks (admin)
- created feedback (migration, controller, model)
- created function to submit feedback (client)
- added overall rating display
- created function to submit feedback (client)
- added overall rating display
- created layout for reports/graphs (admin)

### Changed
- modified list of applications display per user role

### Fixed
- fixed bug in registering SKMS member

## [1.34.12] - 2023-7-31

### Added
- created display for client profile(account, personal profile, registration profile)
- created function to update password
- created function to updated personal profile
- created display for admin profile
- created function to update password
- created function to updated personal profile
- added email notification for submitted application in library
- added venue, date, activity, focal person and tracking number details in email notifications for processors
- added expert’s expertise, activity, date, activity, and venue details in email notifications for experts
- added email notification for experts recommendation in library

### Changed
- modified email notification contents in processing application
- modified email notification sent to experts

### Fixed
- fixed bug found (url redirection)

## [1.24.10] - 2023-7-15

### Added
- added download files on click function (Step 4, Step 7)
- added tracking # in email notification of submitted application
- created email notification for request to recommended expert/s
- added date/days ago in list of added recommended expert/s (STEP 4C)
- created function send email request to recommended expert/s
- added function to save accept/decline request action
- added link expired page
- added track application page
- added track application in login
- added add expert/s (STEP 4C)
- created function to save and send email notification to addition recommended expert/s
- created function to save process STEP 4C
- added track application in client dashboard
- added view profile
- added change password

### Changed
- modified email notification accept/decline buttons
- improved client interface

### Fixed
- fixed tracking status display

## [1.19.8] - 2023-6-31

### Added
- created 4 tables for LIB
- created Particulars model and seeder file
- created 1 migration file
- created 3 model files for LIB
- created 3 functions to compute total of NRCP, counterparts and other funds
- created validation for 350k budget limit
- created validation in save/submit STEP 6
- created function to save NRCP, counterparts and other funds
- added new directory for uploaded attachments in post activity report
- added GB resolution upload attachment in Post activity report process
- added view for submitted attachments and remarks for Post Activity Report
  
### Changed
- modified tblattachments structure
- modified STEP 6 application form
- modified submit STEP 6
- modified function in saving/processing a non-stakeholder application with below 305k budget limit
- modified optional uploads in Process 7 and Post activity report process
- modified function in saving/processing a non-stakeholder application with above 305k budget limit
- modified function in saving/processing a stakeholder application (removed NEEP integration)

### Fixed

## [1.08.1] - 2023-6-15

### Added
- added download files on click function (Step 4, Step 7)
- move file to neep directory function (Step 4b)
- integrated zipper package
- created function to download all files
- added download all button for uploaded files function (Step 4, Step 7)
- created seeder file for initial email notifications
- added model for managing auto send email notifications
- created view file for email content
- created function to send email notification to next processor
- adjusted email notification library ids
- added auto send email function to proces Step 1 – 4a/4b
- added auto send email function to proces Step 1 – 4a/4b
- added venue address in Application Step 4
- added skip button in Step 5 – Participants (optional)

### Changed
- renamed Step 6 Application Form to Budget Required

### Fixed

## [0.95.12] - 2023-5-31

### Added
- created function to submit process, update application status, save tracking status step 4
- created function to submit process, update application status, save tracking status step 5
- created function to submit process, update application status, save tracking status step 6
- created function to submit process, update application status, save tracking status step 6
- save files uploaded step 7A
- adjust form display by application status (stakeholder and non-stakeholder) and user role
- created function to submit process, update application status, save tracking status step 7B
- created function to submit process, update application status, save tracking status step 8
- created form layout for request form (NEEP)
- integrated NEEP request form and database
- created function to submit process, update application status, save tracking status step 4B
- created function to submit process, update application status, save tracking status step 9 (post activity report)
- created function to save step 4B to NEEP database

### Changed

### Fixed

## [0.84.10] - 2023-5-15

### Added
- added process form in view application data page (admin)
- added user role and application status validation for visibility of process form
- created form of all process
- created 2 migration file
- created function to submit process step 1
- created function to update application status
- created function to save tracking status step 1
- created function to submit process step 2
- created function to update application status
- created function to save tracking status step 2
- created validation in uploading files
- created function to submit process step 3
- created function to update application status
- created function to save tracking status step 3
- created function to submit process step 4
- created function to update application status
- created function to save tracking status step 4
  
### Changed

### Fixed

## [0.67.8] - 2023-4-31

### Added
- added Director, Division Chair and Records Section in user group
- added submit feedback button in side navigation
- created delete account function (admin)
- created deactivate account function (admin)
- added Add Administrator button on top right of Administrator User page
- created view account profile/settings function (admin)
- modified dashboard numbers to clickable
- installed plugin for text editor
- created update email notification data function
- created 10 email notifications for processing
- created migration table for application status
- added action button
- integrate auto send email for processing

  
### Changed
- renamed OPIS to NES

### Fixed

## [0.60.7] - 2023-4-15

### Added
- added tracking in admin
- added participants count in admin
- dded focal person in admin
- created enmail notification template
- created add user function
- created add admin user acount model
- added validation
- created controller for users
- created admin model
- send email to new user
- created activate link function
  
### Changed
- renamed OPIS to NES

### Fixed

## [0.55.7] - 2023-3-31

### Added
- created admin login page
- created reset password page
- created verifiy email function
- created resend reset password link
- added user group table
- created user group seeder
- created admin home page
- created admun view applications
- created user model
- created dashboard with counts
- added titles migration
- added titles seeder
- created get use info by email function
- save password reset token
- created reset password function
- resend reset link function
- added message reset password success
- created user role validation admin login
- created migration admin profile table
- created seeder admin profile table
- get user name for navigation function
- added admin users page
- added client users page

### Changed
- renamed OPIS to NES

### Fixed

## [0.45.0] - 2023-3-15

### Added
- added detailed tracking status in view application page
- added tracking status in view application data
- added tracking status in clicking status as popover
- setup mail config
- created email template
- send email notification on submit application (STEP 6)
- added alert on successful submit application (STEP 6)

### Changed
 
### Fixed

## [0.40.0] - 2023-2-28

### Added
- created function to generate form token for every steps
- added 1 new field in all tables for form token value
- created function to validate token key before saving/submitting
- added list of application view
- create new model for managing applications
- created new migration for status tracking
- created new model for tracking
- adjusted config/database (strict = false)
- created function to get user’s list of saved/submitted applications
- created function to edit user’s saved application
- created template for viewing submitted application
- created function to display user’s submitted application

### Changed
 
### Fixed

## [0.35.0] - 2023-2-28

### Added
- created function to generate form token for every steps
- added 1 new field in all tables for form token value
- created function to validate token key before saving/submitting
- added list of application view
- create new model for managing applications
- created new migration for status tracking
- created new model for tracking
- adjusted config/database (strict = false)
- created function to get user’s list of saved/submitted applications
- created function to edit user’s saved application
- created template for viewing submitted application
- created function to display user’s submitted application

### Changed
 
### Fixed

## [0.31.1] - 2023-2-15

### Added
- created function to submit STEP 2 (Type of Activity)
- added validation to save STEP 2
- added validation to submit STEP 2
- created function to get STEP 2 data
- display STEP 2 data in the form
- created function to save STEP 3 (Objectives)
- created function to submit STEP 3
- created function to get STEP 3 data
- created function to display data of STEP 3 in the form
- added validation to save/submit STEP 3 data
- created function to save STEP 4 (Venue Specifications)
- created function to submit STEP 34
- created function to get STEP 4 data
- created function to display data of STEP 4 in the form
- added validation to save/submit STEP 4 data
- created function to save STEP 5 (Participants)
- created function to submit STEP 5
- created function to get STEP 5 data

### Changed
 
### Fixed

## [0.11.4] - 2023-1-31

### Added
- created save function in STEP 2
- created retrieved saved data in STEP 2

### Changed
 
### Fixed

## [0.10.3] - 2023-1-15

### Added
- added 2 fields in contact information table – Step 1 (submit_flag, user_id)
- created updateOrCreate function for save button in Step 1
- added 2 fields in type of activity table - Step 2 (submit_flag, user_id)
- added submit button (Step 1)
- added next button (Step 1)
- added last date saved (Step 1)

### Changed
- modified migration table file (Step 2)
 
### Fixed

## [0.8.7] - 2022-12-31

### Added
- added validation if member is registered already
- added redirection upon success submit
- added login page with validations
- created login function
- added dashboard page
- created logout function
- added validations in application form

### Changed
 
### Fixed


## [0.6.2] - 2022-12-15

### Added
- created function ot save registration
- created function to create user
- created function to create personal profile
- created function to create registration profile
- created form validation in client side
- created function to save nrcp member info
- added validation if nrcp member in registration module

### Changed
 
### Fixed

## [0.1.1] - 2022-11-31

### Added
- creatd 16 migrations tables
- created 9 seeder files
- created login page
- created registraion page
- created dynamic dropdowns
 
### Changed
 
### Fixed


