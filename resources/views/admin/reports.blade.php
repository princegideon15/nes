@extends('admin.layouts.app')

@section('content')
@extends('admin.layouts.nav')

<div>
    <reports-component 
        :clients-data="{{ json_encode($clients) }}"
        :submitted-data="{{ json_encode($submitted) }}"
        :completed-data="{{ json_encode($completed) }}"
        :institutions-data="{{ json_encode($institutions) }}"
        :feedbacks-data="{{ json_encode($feedbacks) }}"
        :activities-data="{{ json_encode($activities) }}"
        ></reports-component>
</div>

@endsection
