@component('mail::layout')

    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
         {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    @isset($slot)
        @slot('subcopy')

            <p>{!! $content !!}</p>

            @component('mail::button', ['url' => url('/') ])
                Track Application
            @endcomponent

            <p>Thank you,
            <br/>
            <strong style="font-size:14px">NRCP Extension Services Team</strong></p>

            <!-- @component('mail::subcopy')
                <p>If you have any questions or concerns, please email us at <a>nrcp.outreachprogram@gmail.com</a></p>
                <p>To improve our services please log in, click send feedback button, rate your overall experience by stars and 
                    leave your comments.</p>
                <p>To improve our services please leave your comments and feedback. <a>Feedback site</a></p>
                <p><em>Please do not reply. This is a system generated message.</em></p>
            @endcomponent -->

        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')

            <p>If you have any questions or concerns, please email us at <a>nrcp.outreachprogram@gmail.com</a></p>
            <p>To improve our services please log in, click send feedback button, rate your overall experience by stars and 
            leave your comments.</p>   
            <p>© 2022 {{ config('app.name') }}. All rights reserved.<p>
                
        @endcomponent
    @endslot

@endcomponent

