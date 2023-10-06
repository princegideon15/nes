@extends('layouts.app')

@section('content')
@extends('layouts.nav')


    <profile-component 
        :user-data="{{ json_encode($user_info) }}"
        :personal-data="{{ json_encode($personal) }}"
        :registration-data="{{ json_encode($registration) }}"
        :feedbacks-data="{{ json_encode($feedbacks) }}"
    ></profile-component>


@endsection
