<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset(config('app.logo')) }}">
        

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.6/dist/vue-multiselect.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
        
        <!-- Highcharts -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>


        
        <!-- Styles -->

        <script type="text/javascript">var APP_URL = {!! json_encode(url('/')) !!};</script>

    <style>

    .link-dashboard:hover svg { fill : #3F83F8 } 
    .link-applications:hover svg { fill : #31C48D }  
    .link-users:hover svg { fill : #5850EC }
    .link-emails:hover svg { fill : #E02424 }
    .link-reports:hover svg { fill : #D61F69 }
    .link-logs:hover svg { fill : #9F580A }
    .link-feedbacks:hover svg { fill : #E3A008}
    .link-s_feedback:hover svg { fill : #E3A008}

    .active-link { color: #ffffff }

    .active-link.link-dashboard svg { fill : #3F83F8 } 
    .active-link.link-applications svg { fill : #31C48D }  
    .active-link.link-users svg { fill : #5850EC }
    .active-link.link-emails svg { fill : #E02424 }
    .active-link.link-reports svg { fill : #D61F69 }
    .active-link.link-logs svg { fill : #9F580A }
    .active-link.link-feedbacks svg { fill : #E3A008}
    .active-link.link-s_feedback svg { fill : #E3A008 }

    /* star rating */
    .rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: left;
    margin-top: -20px;
    padding-top: 0;
    margin-left: -5px;
    }

    .rating > input{ display:none;}

    .rating > label {
    position: relative;
    width: 1em;
    font-size: 3vw;
    color: #D1D5DB;
    cursor: pointer;
    font-size:60px;
    }
    .rating > label::before{ 
    content: "\2605";
    position: absolute;
    opacity: 0;
    color: #FACA15;
    }

    .rating > label::before{ 
    content: "\2605";
    position: absolute;
    opacity: 0;
    color: #FACA15;
    }
    .rating > label:hover:before,
    .rating > label:hover ~ label:before {
    opacity: 1 !important;
    }

    .rating > input:checked ~ label:before{
    opacity:1;
    }

    .rating:hover > input:checked ~ label:before{ opacity: 0; }
    

    </style>
     
    </head>

    <body>
            <div id="app">
                @yield('content')
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
            <script src="{{ URL::asset('js/nes.js') }}"></script>
           
    </body>
</html>
