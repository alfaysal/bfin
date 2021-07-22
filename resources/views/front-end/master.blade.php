<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        @yield('title')
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('/') }}/front-end/css/styles.css" rel="stylesheet" />
        
        @yield('css')
    </head>
    <body>
        <!-- Responsive navbar-->
        @include('front-end.includes.nav')

        @yield('header')
        <!-- Page content-->
        @yield('content')
        <!-- Footer-->
        @include('front-end.includes.footer')
        <!-- Bootstrap core JS-->
        <script src="{{ asset('/') }}/back-end/asset/plugins/jquery/jquery.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('/') }}/front-end/js/scripts.js"></script>
       
        @yield('js')
    </body>
</html>
