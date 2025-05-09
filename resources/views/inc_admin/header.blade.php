<!doctype html>

<?php
//  if(($_SESSION['rexkod_admin_id'])) header("Location: ".URLROOT."/admins/login");
 ?>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" >
<head>
<meta charset="utf-8" />
<link rel="icon" type="image/x-icon" href="/assets_admin/images/vishvin/favicon.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="#" name="description" />
<meta content="#" name="author" />
<!-- App favicon -->


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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<script src="//unpkg.com/alpinejs" defer></script>

<style>
    .mandatory_star{
        color :#e14848;

    }
    

</style>
        <title>Vishvin</title>


        <!-- jsvectormap css -->
        <link href="/assets_admin/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

        <!--Swiper slider css-->
        <link href="/assets_admin/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />



    </head>

    <header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header" style="height:62px;">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index.php" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="/assets_admin/images/logo-sm.png" alt="" height="40">
                        </span>
                        <span class="logo-lg">
                            <img src="/assets_admin/images/logo-dark.png" alt="" height="40">
                        </span>
                    </a>

                    <a href="index.php" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="/assets_admin/images/logo-sm.png" alt="" height="40">
                        </span>
                        <span class="logo-lg">
                            <img src="/assets_admin/images/logo-light.png" alt="" height="40">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-md-block">
                    {{-- <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                            id="search-options" value="" >
                        <span class="mdi mdi-magnify search-widget-icon"></span>
                        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                            id="search-close-options"></span>
                    </div> --}}
                    <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                        <div data-simplebar style="max-height: 180px;">
                            <!-- item-->
                            <div class="dropdown-header">
                                <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                            </div>

                            <div class="dropdown-item bg-transparent text-wrap">
                                <a href="index.php" class="btn btn-soft-secondary btn-sm btn-rounded">Device 1<i
                                        class="mdi mdi-magnify ms-1"></i></a>
                                <a href="index.php" class="btn btn-soft-secondary btn-sm btn-rounded">Device 2 <i
                                        class="mdi mdi-magnify ms-1"></i></a>
                            </div>
                            <!-- item-->
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                <span>Analytics Dashboard</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                <span>Help Center</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                <span>My account settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header mt-2">
                                <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="/assets_admin/images/users/avatar-2.jpg"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">Angela Bernier</h6>
                                            <span class="fs-11 mb-0 text-muted">Manager</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="/assets_admin/images/users/avatar-3.jpg"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">David Grasso</h6>
                                            <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- item -->
                                <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                    <div class="d-flex">
                                        <img src="/assets_admin/images/users/avatar-5.jpg"
                                            class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="flex-1">
                                            <h6 class="m-0">Mike Bunch</h6>
                                            <span class="fs-11 mb-0 text-muted">React Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="text-center pt-3 pb-1">
                            <a href="" class="btn btn-primary btn-sm">View All Results <i
                                    class="ri-arrow-right-line ms-1"></i></a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="d-flex align-items-center">

                {{-- <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                        aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}

                <div class="dropdown ms-sm-3 header-item topbar-user" >
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="/assets_admin/images/user.png"
                                alt="Header Avatar" style="height:40px;width:40px;">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Vishvin</span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">      @if(session('rexkod_vishvin_auth_user_type') == 'admin')
                                    <p>Admin</p>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'project_head')
                                       <p>Project Head</p>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'inventory_manager')
                                       <p>Inventory Manager</p>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'inventory_executive')
                                       <p>Inventory Executive</p>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'inventory_reporter')
                                       <p>Inventory Reporter</p>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'contractor_manager')
                                       <p>Contractor Manager</p>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'qc_manager')
                                       <p>QC Manager</p>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'qc_executive')
                                       <p>QC Executive</p>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'hescom_manager')
                                       <p>Hescom Manager</p>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'aee')
                                       <p>AEE</p>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'ae')
                                       <p>AE</p>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'aao')
                                       <p>AAO</p></span>
                                       @elseif(session('rexkod_vishvin_auth_user_type') == 'bmr')
                                       <p>BMR</p></span>
                                       @endif
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" >
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome

                            @if(session('rexkod_vishvin_auth_user_type') == 'admin')
                            <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'project_head')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'inventory_manager')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'inventory_executive')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'inventory_reporter')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'contractor_manager')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'qc_manager')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'qc_executive')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'hescom_manager')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'aee')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'ae')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'aao')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @elseif(session('rexkod_vishvin_auth_user_type') == 'bmr')
                               <p>{{ucwords(session('rexkod_vishvin_auth_user_name'))}}</p>
                               @endif
                            </h6>
                        <a class="dropdown-item" href="pages-profile.php"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle" >Profile</span></a>

                        <a class="dropdown-item" href="pages-faqs.php"><i
                                class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Help</span></a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="/admins/logout"><i
                                class="mdi mdi-logout text-muted fs-16 align-middle me-1" ></i>

                                <span >Logout</span>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    @include("inc_admin.navbar")
