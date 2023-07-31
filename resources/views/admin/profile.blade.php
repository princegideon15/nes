@extends('layouts.app')

@section('content')
@extends('admin.layouts.nav')

<div>
    <admin-profile-component 
        :user-data="{{ json_encode($user_data) }}"
        :admin-data="{{ json_encode($admin_name) }}"
        :roles-data="{{ json_encode($roles) }}">
    </admin-profile-component>
</div>

@endsection
