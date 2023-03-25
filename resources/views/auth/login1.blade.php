<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Login</title>
    <link rel="apple-touch-icon" href="/admin_assets/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/admin_assets/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/core/menu/menu-types/horizontal-menu.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/pages/login-register.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/admin_assets/assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="horizontal-layout horizontal-menu 1-column  bg-full-screen-image blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="row flexbox-container">
  <div class="col-12 d-flex align-items-center justify-content-center">
    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
      <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
        <div class="card-header border-0">
          <div class="card-title text-center">
            {{-- <img src="/admin_assets/app-assets/images/logo/logo-dark.png" alt="branding logo"> --}}
            <img src="/static_assets/img/blue-bird-logo-1.svg"   alt="" width="100"  />
         </div>
        </div>
        <div class="card-content">
          {{-- <div class="text-center">
            <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span
                class="la la-facebook"></span></a>
            <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span
                class="la la-twitter"></span></a>
            <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-linkedin"><span
                class="la la-linkedin font-medium-4"></span></a>
            <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-outline-github"><span
                class="la la-github font-medium-4"></span></a>
          </div> --}}
          <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Using Account
              Details</span></p>
          <div class="card-body">
            <form class="form-horizontal" method="post" action="{{ route('login.store') }}" validate>@csrf
              @error('email')
              <div class="error"><b>Oops! {{ $message }}</b></div>
              @enderror
              <fieldset class="form-group position-relative has-icon-left">
                <input type="text" name="email" class="form-control" id="user-name" placeholder="Your Username" required>
                <div class="form-control-position">
                  <i class="la la-user"></i>
                </div>
              </fieldset>
              <fieldset class="form-group position-relative has-icon-left">
                <input type="password" name="password" class="form-control" id="user-password" placeholder="Enter Password" required>
                <div class="form-control-position">
                  <i class="la la-key"></i>
                </div>
              </fieldset>
              <div class="form-group row">
                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                  <fieldset>
                    <input type="checkbox" id="remember-me" class="chk-remember" name="remember">
                    <label for="remember-me"> Remember Me</label>
                  </fieldset>
                </div>
                <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="{{ route('password.request') }}"
                    class="card-link">Forgot Password?</a></div>
              </div>
              <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> Login</button>
            </form>
          </div>
          <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span> New to Bluebird ?</span></p>
          <div class="card-body">
            <a href="{{ route('register') }}" class="btn btn-outline-danger btn-block"><i class="la la-user"></i>
              Register</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="/admin_assets/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/admin_assets/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/admin_assets/app-assets/js/core/app-menu.min.js"></script>
    <script src="/admin_assets/app-assets/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/admin_assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
    <script src="/admin_assets/app-assets/js/scripts/forms/form-login-register.min.js"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>