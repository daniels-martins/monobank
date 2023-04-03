<?php use Illuminate\Support\Carbon; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Blue Bird | Account Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/dashboard_assets/vendors/feather/feather.css" />
    <link rel="stylesheet" href="/dashboard_assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="/dashboard_assets/vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="/dashboard_assets/vendors/typicons/typicons.css" />
    <link rel="stylesheet" href="/dashboard_assets/vendors/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="/dashboard_assets/vendors/css/vendor.bundle.base.css" />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/dashboard_assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css" />
    <link rel="stylesheet" href="js/select.dataTables.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/dashboard_assets/css/vertical-layout-light/style.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>
<style>
    a.link {
        text-decoration: none;
        text-decoration-style: none;
    }
</style>

<body>
    <div class="container-scroller">
        <div class="row" id=""></div>
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="/">
                        {{-- <img src="images/logo.svg" alt="logo" /> --}}
                        <x-application-logo :height=400 />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="/">
                        {{-- <img src="images/logo-mini.svg" alt="logo" /> --}}
                        <x-application-logo :height=400 />

                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">
                            Good Morning, <span class="text-primary fw-bold">{{ ucfirst(auth()->user()->profile->fname) }}</span>
                        </h1>
                        <h3 class="welcome-sub-text">
                            <small> Last sign on :
                                {{ Carbon::now()->dayName . ' , ' . Carbon::now()->toFormattedDateString() ?? 'N/A' }}</small>
                        </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    {{-- <li class="nav-item d-none d-lg-block">
                        <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                            <span class="input-group-addon input-group-prepend border-right">
                            </span>
                            <input type="text" class="form-control" />
                        </div>
                    </li> --}}
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{-- <img class="img-xs rounded-circle"
                                src="/storage/avatarz/UMBBEyT6Xv6ZtGV61xZV1xiSdQ37yrOiBZh2vAvB.jpg"
                                alt="Profile image" /> --}}
                                <span class="avatar avatar-sm avatar-online">
                                 @if (Storage::exists(auth()->user()->dp ?? '00'))
                                     <img class="img-sm rounded-circle" src='{{ auth()->user()->presentPhoto() }}' alt="profile image"/>
                                 @else
                                     <img class="img-sm rounded-circle" src="/admin_assets/app-assets/images/icons/user_icon.png" alt="avatar">
                                 @endif
                             </span>
                            {{-- <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image" /> --}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                {{-- <img class="img-md rounded-circle" src="images/faces/face8.jpg" alt="Profile image" /> --}}
                                <span class="avatar avatar-sm avatar-online">
                                 @if (Storage::exists(auth()->user()->dp ?? '00'))
                                     <img class="img-sm rounded-circle" src='{{ auth()->user()->presentPhoto() }}' alt="profile image"/>
                                 @else
                                     <img class="img-sm rounded-circle" src="/admin_assets/app-assets/images/icons/user_icon.png" alt="avatar">
                                 @endif
                             </span>

                                <p class="mb-1 mt-3 font-weight-semibold">
                                    {{ auth()->user()->profile->getFullName() ?? '' }}</p>
                                <p class="fw-light text-muted mb-0">{{ auth()->user()->email }}</p>
                            </div>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i>
                                My Profile
                                {{-- <span class="badge badge-pill badge-danger">1</span></a> --}}
                                <a class="dropdown-item">
                                    <form action="{{ route('logout') }}" method="post" id="logoutForm"
                                        name="logoutForm">@csrf
                                        <button class="btn" onclick="this.closest('logoutForm').submit();">
                                            <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
                                        </button>
                                    </form>
                                </a>

                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('dashboard_partials.sidebar')
            <!-- partial -->
            @include('dashboard_partials.main_panel')
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="/dashboard_assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/dashboard_assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/dashboard_assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/dashboard_assets/vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/dashboard_assets/js/off-canvas.js"></script>
    <script src="/dashboard_assets/js/hoverable-collapse.js"></script>
    <script src="/dashboard_assets/js/template.js"></script>
    <script src="/dashboard_assets/js/settings.js"></script>
    <script src="/dashboard_assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/dashboard_assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="/dashboard_assets/js/dashboard.js"></script>
    <script src="/dashboard_assets/js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->
</body>

</html>
