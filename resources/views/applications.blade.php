@extends('layouts.app')

@section('content')
@extends('layouts.nav')

<div>
    <applications-component 
        :particulars-data="{{ json_encode($particulars) }}"
        :applications-data="{{ json_encode($applications) }}"
    ></applications-component> 
</div>

@endsection
