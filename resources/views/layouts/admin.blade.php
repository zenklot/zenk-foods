
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    @include('layouts.templates.admin.header')
    <title>Admin</title>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

@include('layouts.templates.admin.navbar')

@include('layouts.templates.admin.left-side')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  @include('layouts.templates.admin.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

@include('layouts.templates.admin.script')
</body>
</html>
