<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!--Includes CSS lIB-->
    <!--Bootstrap-->
    <link href={{ asset("libraries/bootstrap/css/bootstrap.css") }} rel="stylesheet" />
    <!--fontawesome-->
    <link rel="stylesheet" href={{ asset("libraries/fontawesome-free/css/all.min.css") }}>
    <!-- iCheck -->
    <link rel="stylesheet" href={{ asset("libraries/icheck-bootstrap/icheck-bootstrap.min.css") }} />
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset("custom/admins_side/css/adminlte.min.css") }} />


    <!--Includes JS lIB-->
    <!--Bootstrap-->
    <script type="text/javascript" src={{ asset("libraries/bootstrap/js/bootstrap.js") }}></script>
    <!-- jQuery -->
    <script src={{ asset("libraries/jquery/jquery.min.js") }} />
    </script>
    <!-- Bootstrap 4 -->
    <script src={{ asset("libraries/bootstrap/js/bootstrap.bundle.min.js") }} />
    </script>
</head>


<body class="hold-transition login-page">
    @yield('content')
</body>

</html>
