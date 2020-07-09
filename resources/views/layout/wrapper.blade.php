<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gerai Syar&lsquo;i | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('alt/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('alt/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('alt/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Custom Inputs-->
  <link rel="stylesheet" href="{{asset('alt/plugins/select2/css/select2.css')}}">
  {{-- <link rel="stylesheet" href="{{asset('alt/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('icheck/skins/all.css')}}">
  <link rel="stylesheet" href="{{asset('/alt/plugins/sweetalert2/sweetalert2.css')}}">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{asset('alt/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @include('layout.style')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  @include('layout.nav')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
          {{-- <div class="col-6">
            <button type="button" name="button" id="swaltest">fire</button>
          </div> --}}
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> v.0.01a
    </div>
    <strong>Copyright &copy; 2020 <a href="http://www.instagram.com/kimochiinside">KimochiInside</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
{{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> --}}
<script src="{{asset('alt/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('alt/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('alt/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('alt/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('alt/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('alt/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Custom Inputs -->
<script src="{{asset('alt/plugins/select2/js/select2.full.js')}}"></script>
<script src="{{asset('icheck/icheck.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script> --}}
<script src="{{asset('/alt/plugins/sweetalert2/sweetalert2.all.js')}}" charset="utf-8"></script>
<script src="{{asset('/jquery.form.min.js')}}" charset="utf-8"></script>
<!-- AdminLTE App -->
<script src="{{asset('alt/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('alt/dist/js/demo.js')}}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>
@include('layout.bladeJS')
</body>
</html>
