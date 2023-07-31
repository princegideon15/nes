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

            <p>Hi, <strong>{{ $name }}</strong></p>

            <p>Your NRCP Extension Services (NES) password can be reset by clicking the buttong below.</p>
            <br/>

            @component('mail::button', ['url' => url('/reset/') . '/' .$token ])
                Reset Password
            @endcomponent

            <p>Thank you,
            <br/>
            <strong style="font-size:14px">NRCP Extension Services Team</strong></p>

            @component('mail::subcopy')
                <p>If you have any questions or concerns, please email us at <a>nrcp.outreachprogram@gmail.com</a></p>
                <p>To improve our services please leave your comments and feedback. <a>Feedback site</a></p>
                <p><em>Please do not reply. This is a system generated message.</em></p>
            @endcomponent

        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        @endcomponent
    @endslot

@endcomponent



