<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sticky App Layout</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap" rel="stylesheet">
    @import url("https://fonts.googleapis.com/css2?family=Lalezar&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Tajawal:wght@300;700&display=swap");
    
    <!-- CSS Files -->
    <link type="text/css" href="{{ asset('public/vendor/spinkit.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('public/vendor/perfect-scrollbar.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('public/css/material-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('public/css/fontawesome.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('public/css/preloader.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    <style>
        nav:lang(ar) , body:lang(ar) , div:lang(ar) , a:lang(ar) , button:lang(ar) , p:lang(ar) , label:lang(ar) , input:lang(ar){
            font-family: "Tajawal", sans-serif;
        }
    </style>
</head>

<body class="layout-sticky layout-sticky-subnav" lang="ar">
    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <!-- Include Header -->
        @include('layouts.partials.header')

        <!-- Content Layout -->
        <div class="mdk-header-layout__content">
            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page-content">
                    @yield('content')
                </div>

                <!-- Include Sidebar -->
                @include('layouts.partials.sidebar')
            </div>
        </div>
    </div>

    <!-- JS Files -->
    <script src="{{ asset('public/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('public/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('public/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('public/vendor/dom-factory.js') }}"></script>
    <script src="{{ asset('public/vendor/material-design-kit.js') }}"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/js/preloader.js') }}"></script>
</body>

</html>
