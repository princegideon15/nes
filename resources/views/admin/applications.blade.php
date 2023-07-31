@extends('admin.layouts.app')

@section('content')
@extends('admin.layouts.nav')

<admin-applications-component 
        :activities-data="{{ json_encode($activities) }}"
        :applications-data="{{ json_encode($applications) }}"
        :role-data="{{ $role }}"
    ></admin-applications-component> 

@endsection

