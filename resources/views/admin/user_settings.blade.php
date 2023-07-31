@extends('admin.layouts.app')

@section('content')
@extends('admin.layouts.nav')

<user-settings-component 
        :roles-data="{{ json_encode($roles) }}"
        :user-data="{{ json_encode($admin_info) }}"
    ></user-settings-component> 
    
@endsection

