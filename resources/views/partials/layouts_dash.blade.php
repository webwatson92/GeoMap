<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name')}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::to('back/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::to('back/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ URL::to('back/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::to('back/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::to('back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::to('back/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ URL::to('back/plugins/summernote/summernote-bs4.min.css') }}">
  <style>
      body{
        font-family: "Arial";font-size: 13px;
      }
  </style>
  @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ URL::to('img/logo_lofty.png') }}" alt="logo e-marguerite" height="60" width="60">
  </div>
  

    <!-- Main content -->
       @include('partials/_nav')
    <section class="content">
      <div class="container-fluid">

       @yield('content')

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@yield('script')
<!-- jQuery -->
<script src="{{ URL::to('back/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::to('back/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ URL::to('back/plugins/bootstrap/js/bootstrap.bundle.min.js' ) }}"></script>
<!-- ChartJS -->
<script src="{{ URL::to('back/plugins/chart.js/Chart.min.js' ) }}"></script>
<!-- Sparkline -->
<script src="{{ URL::to('back/plugins/sparklines/sparkline.js' ) }}"></script>
<!-- JQVMap -->
<script src="{{ URL::to('back/plugins/jqvmap/jquery.vmap.min.js' ) }}"></script>
<script src="{{ URL::to('back/plugins/jqvmap/maps/jquery.vmap.usa.js' ) }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::to('back/plugins/jquery-knob/jquery.knob.min.js' ) }}"></script>
<!-- daterangepicker -->
<script src="{{ URL::to('back/plugins/moment/moment.min.js' ) }}"></script>
<script src="{{ URL::to('back/plugins/daterangepicker/daterangepicker.js' ) }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ URL::to('back/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js' ) }}"></script>
<!-- Summernote -->
<script src="{{ URL::to('back/plugins/summernote/summernote-bs4.min.js' ) }}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::to('back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js' ) }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::to('back/dist/js/adminlte.js' ) }}"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>
