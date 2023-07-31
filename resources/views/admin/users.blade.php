@extends('admin.layouts.app')

@section('content')
@extends('admin.layouts.nav')

<users-component 
        :users-data="{{ json_encode($users) }}"
        :roles-data="{{ json_encode($roles) }}"
    ></users-component> 



@endsection

