@extends('admin.layouts.app')

@section('content')
@extends('admin.layouts.nav')

<clients-component 
        :clients-data="{{ json_encode($clients) }}"
    ></clients-component> 
    
@endsection

