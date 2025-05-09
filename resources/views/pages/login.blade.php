
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
         <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="/assets_admin/images/vishvin/favicon.png">
      <!-- <link rel="icon" type="image/png" href="/assets_page/img/logo.svg"> -->
      <title>Vishvin</title>
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="/assets_page/vendor/slick/slick.min.css"/>
      <link rel="stylesheet" type="text/css" href="/assets_page/vendor/slick/slick-theme.min.css"/>
      <!-- Icofont Icon-->
      <link href="/assets_page/vendor/icons/icofont.min.css" rel="stylesheet" type="text/css">
      <!-- Bootstrap core CSS -->
      <link href="/assets_page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="/assets_page/css/style.css" rel="stylesheet">
      <!-- Sidebar CSS -->
      <link href="/assets_page/vendor/sidebar/demo.css" rel="stylesheet">
      <!-- Bootstrap Icons -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   </head>

   <body class="fixed-bottom-padding">
      {{-- <div class="theme-switch-wrapper">
         <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            <i class="icofont-moon"></i>
         </label>
         <em>Enable Dark Mode!</em>
      </div> --}}
      <!-- sign in -->
      <div class="osahan-signin">
         <div class="border-bottom p-3 d-flex align-items-center">
            {{-- <a class="fw-bold text-success text-decoration-none" href="account-setup.html"><i class="icofont-rounded-left back-page"></i></a>
            <a class="toggle ms-auto" href="#"><i class="icofont-navigation-menu "></i></a> --}}
            <img class="osahan-logo me-2" src="/assets_admin/images/vishvin/logo.jpg" style="position:absolute;left:40vw;">
         </div>
         <div class="p-3">
            <h2 class="my-0">Welcome Back</h2>
            <p class="small">Sign in to Continue.</p>
            <form action="pages/authenticate" method="POST">
                @csrf
               <div class="form-group mb-3">
                  <label for="exampleInputEmail1">Phone <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                  <input placeholder="Enter Phone" type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               </div>
               <div class="form-group mb-3">
                  <label for="exampleInputPassword1">Password <span class="mandatory_star">*<sup><i>required</i></sup></span></label>
                  <input placeholder="Enter Password" type="password" name="password" class="form-control" id="exampleInputPassword1" required>
               </div>
               <button type="submit" class="btn btn-success btn-lg rounded w-100">Sign in</button>
            </form>
            {{-- <p class="text-muted text-center small m-0 py-3">or</p>
            <div class="d-grid gap-2">
            <a href="get_started.html" class="btn btn-dark rounded btn-lg btn-apple">
            <i class="icofont-brand-apple me-2"></i> Sign up with Apple
            </a>
            <a href="get_started.html" class="btn btn-light rounded btn-lg btn-google">
            <i class="icofont-google-plus text-danger me-2"></i> Sign up with Google
            </a>
         </div> --}}
         </div>
      </div>
      <!-- footer fixed -->
      <div class="osahan-fotter fixed-bottom">
         <a href="" class="btn btn-block btn-lg bg-white">Don't have an account? Contact Contractor</a>
      </div>

      <!-- Bootstrap core JavaScript -->
      <script src="/assets_page/vendor/jquery/jquery.min.js"></script>
      <script src="/assets_page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="/assets_page/vendor/slick/slick.min.js"></script>
      <!-- Sidebar JS-->
      <script type="text/javascript" src="/assets_page/vendor/sidebar/hc-offcanvas-nav.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="/assets_page/js/osahan.js"></script>
   </body>
</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(!empty(session()->get('failed'))) { ?>
  <script type="text/javascript">
  Swal.fire({
   icon: 'warning',
   title: '{{ session()->get('failed') }}',
   showConfirmButton: false,
   timer: 2000
 })
  </script>
 <?php } session()->forget('failed'); ?>


 <?php if(!empty(session()->get('success'))) { ?>
	<script type="text/javascript">
	Swal.fire({
	 icon: 'success',
	 title: '{{ session()->get('success') }}',
	 showConfirmButton: false,
	 timer: 2000,

   })
	</script>
   <?php } session()->forget('success'); ?>
