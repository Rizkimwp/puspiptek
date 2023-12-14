<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset ('assets/img/apple-icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset ('assets/img/favicon.ico')}}">

    <link rel="stylesheet" href="{{ asset ('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/css/templatemo.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/css/custom.css')}}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset ('assets/css/fontawesome.min.css')}}">

    
</head>

<body>

<!-- Navbar -->
@include('web.navbar')
<!-- End Navbar -->

<!-- Main Content -->
    @yield('content')
    <!-- End Main Content -->

<!-- Footer -->
    @include('web.footer')
<!-- End Footer -->



    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>