<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  @yield('title')

  @include('layouts.style.main')
</head>

<body id="page-top">
  <!-- Page Wrapper -->
    @include('layouts.components.user.navbar')
  <div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="bg-white">
      <!-- Main Content -->
      <div class="container px-0" id="content">
        <div class="row col-12 pt-3">
            <sidebar class="col-xs-0 col-3 p-0 d-xs-none d-sm-none d-md-none d-lg-block">
                @include('layouts.components.user.sidebar')
            </sidebar>
            <div class="col-xs-10 col-8 p-0">
                <!-- Begin Page Content -->
                @yield('content')
            </div>
            <div class="col-xs-2 col-1 pr-0">
                <!-- End of Main Content -->
                @include('layouts.components.user.rightbar')
            </div>
        </div>
      </div>
      <!-- Footer -->
      <!-- @include('layouts.components.footer') -->
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @include('layouts.components.modal')

  @include('layouts.scripts.main')

  <!-- script tambahan sweet alert, bukan dari bawaan sb-admin-2 -->
  @stack('additional_scripts')



</body>

</html>
