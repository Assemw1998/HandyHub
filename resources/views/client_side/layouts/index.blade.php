<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{ config('app.name') }}</title>
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />

     <!-- Icon Font Stylesheet -->
     <link
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
     rel="stylesheet"
   />
   <link
     href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
     rel="stylesheet"
   />

   <!-- Libraries Stylesheet -->
   <link href={{ asset("libraries/animate/animate.min.css") }} rel="stylesheet" />
   <link href={{ asset("libraries/owlcarousel/assets/owl.carousel.min.css") }} rel="stylesheet" />

   <!-- Customized Bootstrap Stylesheet -->
   <link href={{ asset("custom/client_side/css/bootstrap.min.css") }} rel="stylesheet" />


   <!-- Template Stylesheet -->
   <link href={{ asset("custom/client_side/css/style.css") }} rel="stylesheet" />


   <!-- JavaScript Libraries -->
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="libraries/wow/wow.min.js"></script>
   <script src="libraries/easing/easing.min.js"></script>
   <script src="libraries/waypoints/waypoints.min.js"></script>
   <script src="libraries/owlcarousel/owl.carousel.min.js"></script>
   <script src="libraries/counterup/counterup.min.js"></script>

   <!-- Template Javascript -->
   <script src="custom/client_side/js/main.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('client_side.layouts.components.header')

        @yield('content')

        @include('client_side.layouts.components.footer')
    </div>
</body>

</html>
