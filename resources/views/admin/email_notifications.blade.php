@extends('admin.layouts.app')

@section('content')
@extends('admin.layouts.nav')

<email-notifications-component 
        :notifications-data="{{ json_encode($notifications) }}"
    ></email-notifications-component> 

@endsection

