<!doctype html>
<html lang="en">
    <head>
    	<meta charset="utf-8" />
    	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon.png">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    	<title>Foodie Miracles : @yield('title')</title>

    	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap core CSS     -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet"/>

        <!--  Paper Dashboard core CSS    -->
        <link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet"/>

        <!--  Fonts and icons     -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet"/>
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

        <!-- Custom CSS -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css">
        @if (Request::segment(2) == '')
        <style type="text/css">
            body {
                background: #c1bbbb; /* fallback for old browsers */
                background: -webkit-linear-gradient(right, #c1bbbb, #c1bbbb);
                background: -moz-linear-gradient(right, #c1bbbb, #c1bbbb);
                background: -o-linear-gradient(right, #c1bbbb, #c1bbbb);
                background: linear-gradient(to left, #c1bbbb, #c1bbbb);
                font-family: "Roboto", sans-serif;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;      
            }
        </style>
        @endif
    </head>
    <body>
        @if (Request::segment(2) != '')
            <div class="wrapper">
        	    @include('admin.sidebar')
                <div class="main-panel">
                    @include('admin.header')
                    <div class="content">
                        <div class="container-fluid">
                            @yield('content')
                        </div>
                    </div>     
                    @include('admin.footer')
                </div>
            </div>
        @else
            @yield('content')
        @endif    
    </body>
    <script type="text/javascript">
        @php
            $subpath = '';
            if(env('APP_ENV') == 'local'){
                $path = explode('\\', base_path());
                $subpath = '/' . end($path) . '/admin';
            } else {
                $subpath = '/admin';
            }
        @endphp
        var subpath = "{{ $subpath }}";
    </script>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{ asset('js/bootstrap-checkbox-radio.js') }}"></script>

    <!--  Charts Plugin -->
    <!-- <script src="{{ asset('js/chartist.min.js') }}"></script> -->

    <!--  Notifications Plugin    -->
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="{{ asset('js/paper-dashboard.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <!-- <script src="{{ asset('js/demo.js') }}"></script> -->
    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
</html>