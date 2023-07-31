@extends('admin.layouts.app')

@section('content')
@extends('admin.layouts.nav')

<div>
    <view-data-component 
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
        :role-data="{{ json_encode($role) }}"
        :status-data="{{ json_encode($app_status) }}"
        :category-data="{{ json_encode($user_cat) }}"
        :evaa-data="{{ json_encode($evaluation_a_att) }}"
        :evab-data="{{ json_encode($evaluation_b_att) }}"
        :fina-data="{{ json_encode($finalization_a_att) }}"
        :postactrep-data="{{ json_encode($post_act_rep_att) }}"
        :members-data="{{ json_encode($members) }}"
        :experts-data="{{ json_encode($experts) }}"
    ></view-data-component> 
</div>

@endsection
