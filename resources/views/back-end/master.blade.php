<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Yield Title For Dynamic Title For Every Page -->
  @yield('title')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/') }}/back-end/asset/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('/') }}/back-end/asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}/back-end/asset/dist/css/adminlte.min.css">
  @yield('css')
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Includes Navbar From Includes Folder -->
    @include('back-end.includes.nav')
  

  <!-- Includes Main Sidebar Includes Folder -->
    @include('back-end.includes.sidebar')
    

  
  <div class="content-wrapper">
    <!-- Yield BreadCrumb For Different Pages Content  -->
    @yield('bread_crumb')


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Yield Content For Different Pages -->
        @yield('content')
        
      </div>
    </section>

  </div>
  
  <aside class="control-sidebar control-sidebar-dark">

  </aside>
  <footer class="main-footer">
    <strong>Copyright &copy;Ami Coding Pari Na</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      
      <b>Created By</b> Faysal
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('/') }}/back-end/asset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('/') }}/back-end/asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/') }}/back-end/asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}/back-end/asset/dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/') }}/back-end/asset/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/') }}/back-end/asset/dist/js/pages/dashboard2.js"></script>
<!-- Yield Script For Single Pages -->
  @yield('scripts')


</body>
</html>
