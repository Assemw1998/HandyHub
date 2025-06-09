<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('img/favicon.ico') }}" rel="icon"/>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap" rel="stylesheet"/>

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"/>

    <!-- Library Stylesheets -->
    <link href="{{ asset('libraries/animate/animate.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('libraries/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet"/>

    <!-- Bootstrap & Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('custom/client_side/css/style.css') }}" rel="stylesheet"/>

    <!-- jQuery Confirm CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

    <!-- jQuery & JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Updated to more recent version -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <!-- Template JavaScript -->
    <script src="{{ asset('custom/client_side/js/main.js') }}"></script>
</head>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('client_side.layouts.components.header')

    @yield('content')

    @include('client_side.layouts.components.footer')
</div>
</body>

</html>
