@extends('layouts.app')

@section('content')
@extends('layouts.nav')

<div>
    <applications-component 
        :particulars-data="{{ json_encode($particulars) }}">
    </applications-component>
</div>

@endsection
