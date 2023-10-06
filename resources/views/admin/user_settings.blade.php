@extends('admin.layouts.app')

@section('content')
@extends('admin.layouts.nav')

<user-settings-component 
        :roles-data="{{ json_encode($roles) }}"
        :user-data="{{ json_encode($admin_info) }}"
        :logs-data="{{ json_encode($user_logs) }}"
        :feedbacks-data="{{ json_encode($feedbacks) }}"
    ></user-settings-component> 
    
@endsection

