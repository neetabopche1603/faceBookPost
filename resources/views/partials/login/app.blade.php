<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>|@yield('auth-title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('users/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('users/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('users/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('users/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('users/images/favicon.png')}}" />
</head>

<body>
  
@yield('authcontent')

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('users/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('users/js/off-canvas.js')}}"></script>
  <script src="{{asset('users/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('users/js/template.js')}}"></script>
  <script src="{{asset('users/js/settings.js')}}"></script>
  <script src="{{asset('users/js/todolist.js')}}"></script>
  <!-- endinject -->
</body>

</html>
