@extends('layouts.app')

@section('content')
@extends('layouts.nav')

<div class="bg-gray-100">
    <appdata-component 
        :contact-data="{{ json_encode($contact) }}"
        :activity-data="{{ json_encode($activity) }}"
        :objective-data="{{ json_encode($objective) }}"
        :venue-data="{{ json_encode($venue) }}"
        :participant-data="{{ json_encode($participant) }}"
        :attachment-data="{{ json_encode($attachment) }}"
        :regions-data="{{ json_encode($regions) }}"
        :provinces-data="{{ json_encode($provinces) }}"
        :cities-data="{{ json_encode($cities) }}"
        :activities-data="{{ json_encode($activities) }}"
        :venues-data="{{ json_encode($venues) }}"
        :tracking-data="{{ json_encode($tracking) }}"
        :participants-data="{{ json_encode($participants) }}"
    ></appdata-component> 
</div>

@endsection
