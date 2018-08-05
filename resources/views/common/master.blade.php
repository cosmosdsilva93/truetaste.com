<!DOCTYPE html>
<html>
    <head>
        <title>Foodie Miracles : @yield('title')</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="images/favicon.png" rel="icon"/>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/scrolling-nav.css') }}" rel="stylesheet">
        <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
        @if (Request::segment(1) == 'payment-fail')
            <link href="{{ asset('css/payment-fail.css') }}" rel="stylesheet">
        @endif
    </head>
    <body id="home"> 
        @include('common.header')
        @yield('content')
        @include('common.footer')
        <a id="back-to-top" style="display: block;"><i class="fa fa-caret-up fa-lg"></i></a>       
    </body>
    <script src="{{ asset('js/jquery.min.js') }}" type= "text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/scrolling-nav.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/magnific-popup.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/owl.carousel.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js" type="text/javascript"></script>
    @if (Request::segment(1) == 'contact-us')
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTwYSMRGuTsmfl2z_zZDStYqMlKtrybxo"></script>
        <script src="{{ asset('js/map-custom.js') }}"></script>
    @endif
    <script type="text/javascript">
        @php
            $subpath = '';
            if(env('APP_ENV') == 'local'){
                $path = explode('\\', base_path());
                $subpath = '/' . end($path);
            }
        @endphp
        var subpath = "{{ $subpath }}";
    </script>
    <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
</html>