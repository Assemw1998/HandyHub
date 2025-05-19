<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="icon" type="image/png" href="{{ asset('mages/admin_side_images/logo.png') }}">
    <title>{{ config('app.name') }}</title>
    <!--Includes CSS lIB-->
    <!--Bootstrap-->
    <link href={{ asset("libraries/bootstrap/css/bootstrap.css") }} rel="stylesheet" />
    <!--fontawesome-->
    <link href={{ asset("libraries/fontawesome/css/all.css") }} rel="stylesheet" />



    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" ref="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset("libraries/fontawesome-free/css/all.min.css") }}>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href={{ asset("libraries/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }} />
    <!-- iCheck -->
    <link rel="stylesheet" href={{ asset("libraries/icheck-bootstrap/icheck-bootstrap.min.css") }} />
    <!-- JQVMap -->
    <link rel="stylesheet" href={{ asset("libraries/jqvmap/jqvmap.min.css") }} />
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset("custom/admins_side/css/adminlte.min.css") }} />
    <link rel="stylesheet" href={{ asset("custom/admins_side/css/admin-side.css") }} />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href={{ asset("libraries/overlayScrollbars/css/OverlayScrollbars.min.css") }} />
    <!-- Daterange picker -->
    <link rel="stylesheet" href={{ asset("libraries/daterangepicker/daterangepicker.css") }} />
    <!-- summernote -->
    <link rel="stylesheet" href={{ asset("libraries/summernote/summernote-bs4.min.css") }} />
    <!--datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <!--Date Picker-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />
    <!--jquery-confirm-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- jQuery -->
    <script src={{ asset("libraries/jquery/jquery.min.js") }} />
    </script>
    <!-- jQuery UI 1.11.4 -->
    <script src={{ asset("libraries/jquery-ui/jquery-ui.min.js") }} />
    </script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src={{ asset("libraries/bootstrap/js/bootstrap.bundle.min.js") }} />
    </script>
    <!-- ChartJS -->
    <script src={{ asset("libraries/chart.js/Chart.min.js") }} />
    </script>
    <!-- Sparkline -->
    <script src={{ asset("libraries/sparklines/sparkline.js") }} />
    </script>
    <!-- JQVMap -->
    <script src={{ asset("libraries/jqvmap/jquery.vmap.min.js") }} />
    </script>
    <script src={{ asset("libraries/jqvmap/maps/jquery.vmap.usa.js") }} />
    </script>
    <!-- jQuery Knob Chart -->
    <script src={{ asset("libraries/jquery-knob/jquery.knob.min.js") }} />
    </script>
    <!-- daterangepicker -->
    <script src={{ asset("libraries/moment/moment.min.js") }} />
    </script>
    <script src={{ asset("libraries/daterangepicker/daterangepicker.js") }} />
    </script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src={{ asset("libraries/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }} />
    </script>
    <!-- Summernote -->
    <script src={{ asset("libraries/summernote/summernote-bs4.min.js") }} />
    </script>
    <!-- overlayScrollbars -->
    <script src={{ asset("libraries/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }} />
    </script>
    <!-- AdminLTE App -->
    <script src={{ asset("custom/admins_side/js/adminlte.js") }} />
    </script>
    <!-- AdminLTE for demo purposes -->
    <script src={{ asset("custom/admins_side/js/demo.js") }} />
    </script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src={{ asset("custom/admins_side/js/pages/dashboard.js") }} />
    </script>
    <!--datatable-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <!--Date Picker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <!--jquery-confirm-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admins_side.admin.layouts.components.header')

        @include('admins_side.admin.layouts.components.sidebar')

        @yield('content')

        @include('admins_side.admin.layouts.components.footer')
    </div>
</body>

</html>
