<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token"  content="{{ csrf_token() }}">
  <title>Topcini Admin - @yield('title','Home')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="/back-end/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="/back-end/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/back-end/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/back-end/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/back-end/images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="/back-end/css/jquery-confirm.css"/>
  {{-- <link rel="stylesheet" href="/back-end/css/dropify.min.css"> --}}
  <!-- text editor -->
  <link rel="stylesheet" href="/back-end/vendors/summernote/dist/summernote-bs4.css">
  <!-- text editor -->
  <!-- data table -->
    {{-- <link rel="stylesheet" href="/back-end/css/jquery.dataTables.css"> --}}
 
  <!-- data table -->
  <!-- tree -->
  <link rel="stylesheet" href="/back-end/css/tree.css">
  <!-- tree -->
  @stack('css')
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
        @include('back-end.shared.header')
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      
     
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
            @include('back-end.shared.sidebar')
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            @include('back-end.shared.footer')
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="/back-end/vendors/js/vendor.bundle.base.js"></script>
  <script src="/back-end/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/back-end/js/off-canvas.js"></script>
  <script src="/back-end/js/hoverable-collapse.js"></script>
  <script src="/back-end/js/misc.js"></script>
  <script src="/back-end/js/settings.js"></script>
  <script src="/back-end/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
  <script src="/js/common.js"></script>
  <script type="text/javascript" src="/back-end/js/jquery-confirm.js"></script>
  <script src="/back-end/js/dropify.js"></script>

   <!-- text editor -->
   <script src="/back-end/vendors/summernote/dist/summernote-bs4.min.js"></script>
   <script src="/back-end/js/editorDemo.js"></script>
   <!-- text editor -->

   <!-- data table -->
   {{-- <script type="text/javascript" charset="utf8" src="/back-end/js/jquery.dataTables.js"></script> --}}
   <!-- data table -->

  <script>
      $.ajaxSetup({
          headers:{
                  'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
          }
      
      });

  </script>
  @stack('script')
  @include('back-end.shared.model')
</body>


</html>
