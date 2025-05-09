<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="#" name="Vishvin" />
    <meta content="#" name="Vishvin" />
    <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="/assets_admin/images/vishvin/favicon.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <!-- Layout config Js -->
    <script src="/assets_admin/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="/assets_admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets_admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets_admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="/assets_admin/css/custom.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <script src="//unpkg.com/alpinejs" defer></script>




    <title>Vishvin</title>


    <!-- jsvectormap css -->
    <link href="/assets_admin/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="/assets_admin/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />



</head>



<body>
    {{-- @include('sweetalert::alert') --}}
    <style>
        .auth-one-bg {
            background-image: url("/assets_admin/images/");
            background-position: center;
            background-size: cover;
        }

        form i {
            margin-left: -30px;
            cursor: pointer;
        }

        .mandatory_star {
            color: #e14848;
        }


        .auth-page-wrapper .auth-page-content {
            padding-bottom: 60px;
            position: relative;
            color: white;
            background-color: white;
            width: 100%;

        }
    </style>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position" id="auth-particles1">
            <nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="navbar" style="background-color: white;">
                <div class="container">

                    <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                            <li class="nav-item">
                                <a class="nav-link active" href="#hero">.</a>
                            </li>

                        </ul>

                        {{-- <div class="text-center">
                            <a class="navbar-brand" href="#">
                                <img src="/assets_admin/images/vishvin/logo.jpg" class="card-logo card-logo-dark" alt="logo dark" height="100">
                                <img src="/assets_admin/images/vishvin/logo.jpg" class="card-logo card-logo-light" alt="logo light" height="100"  >
                            </a>
                            <!-- <a href="/admin/login" class="btn btn-primary">Sign In</a> -->
                        </div> --}}
                    </div>

                </div>
            </nav>
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="" class="d-inline-block auth-logo">
                                    <!-- <img src="/assets_admin/images/logo_sec.png" alt="" height="100" width="200"> -->
                                    <img src="/assets_admin/images/vishvin/logo.jpg" class="card-logo card-logo-dark" alt="logo dark" height="100">
                                    <img src="/assets_admin/images/vishvin/logo.jpg" class="card-logo card-logo-light" alt="logo light" height="100">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center" style="padding-top:39px;">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4" style="background-color: #007aff;">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="" style="font-size: 20px; color:#fff">Welcome Back! </h5>
                                    <p class="" style="font-size: 15px;">Sign in to continue to Vishvin.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{url('/')}}/authenticate" autocomplete="off" class="needs-validation" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="phone" class="form-label"> Phone Number <span class="mandatory_star">*</span></label>
                                            <input type="number" class="form-control" value="{{old('phone')}}" name="phone" id="phone" placeholder="Enter Phone Number">
                                            {{-- @error('phone') --}}
                                            {{-- <span class="text-danger">{{error}}</span>
                                            @enderror
                                        </div>
                                        @error('name')
                                        <span>
                                            <strong>required</strong>
                                        </span>
                                        @enderror --}}


                                        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                                            class="text-danger">

                                        </div>
                                        <div class="mb-3">
                                            <!-- <div class="float-end">
                                                <a href="auth-pass-reset-basic.php" class="text-muted">Forgot password?</a>
                                            </div> -->
                                            <label class="form-label" for="password-input">Password <span class="mandatory_star">*</span></label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" value="" name="password" placeholder="Enter password" id="password">
                                                {{-- <i class="bi bi-eye-slash" id="togglePassword"></i> --}}
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"> <i class="bi bi-eye-slash" id="togglePassword"></i></button>
                                            </div>
                                        </div>
                                        {{-- id="password-input" --}}
                                        <!-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div> -->

                                        <div class="mt-4">
                                            <button class="btn btn-light w-100" type="submit" style="color: #007aff;">Sign In</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                        <script>
                            const togglePassword = document.querySelector("#togglePassword");
                            const password = document.querySelector("#password");

                            togglePassword.addEventListener("click", function() {
                                // toggle the type attribute
                                const type = password.getAttribute("type") === "password" ? "text" : "password";
                                password.setAttribute("type", type);

                                // toggle the icon
                                this.classList.toggle("bi-eye");
                            });

                            // prevent form submit
                            // const form = document.querySelector("form");
                            // form.addEventListener('submit', function (e) {
                            //     e.preventDefault();
                            // });
                        </script>
                        {{-- <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="#" class="fw-semibold text-primary text-decoration-underline"> Contact Admin. </a> </p>
                        </div> --}}

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy; <script>
                                    document.write(new Date().getFullYear())
                                </script>&nbsp;Vishvin Technologies Private Limited</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->


    <!-- particles js -->
    <script src="/assets_admin/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="/assets_admin/js/pages/particles.app.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
    if (Session::has('success')) {
    ?>
        <script type="text/javascript">
            swal("<?php echo $_SESSION['success']; ?>");
        </script>
    <?php }
    Session::pull('success');


    ?>
    <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML" async>
    </script>

</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (!empty(session()->get('failed'))) { ?>
    <script type="text/javascript">
        Swal.fire({
            icon: 'warning',
            title: '{{ session()->get('
            failed ') }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
<?php }
session()->forget('failed'); ?>