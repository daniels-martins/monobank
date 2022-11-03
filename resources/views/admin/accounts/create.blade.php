@extends('admin.layouts.app')
@section('title', 'Add Account')
@section('page_css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css"
  href="/admin_assets/app-assets/vendors/css/pickers/daterange/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/forms/icheck/icheck.css">
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
<link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/plugins/forms/wizard.min.css">
<link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/plugins/pickers/daterange/daterange.min.css">
<link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/pages/single-page.min.css">
<!-- END: Page CSS-->

@endsection

@section('custom_css')
{{--
<link rel="stylesheet" type="text/css" href="/admin_assets/assets/css/"> --}}
@endsection


{{-- session data --}}
@if (Session::has('success'))

@endif

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">New Account</h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Accounts</a>
              </li>
              <li class="breadcrumb-item active">Add New Account
              </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="content-header-right col-md-6 col-12">
        <div class="media width-250 float-right">
          <media-left class="media-middle">
            <div id="sp-bar-total-sales"></div>
          </media-left>
          <div class="media-body media-right text-right">

          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <!-- Form wizard with number tabs section start -->
      <section id="validation">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">
                  Add New Account
                </h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <form action="{{ route('accounts.store') }}" method="post"
                    class="steps-validation wizard-notification wizard-info">
                    @csrf
                    <!----   Step 2 ------>
                    <h6>
                      Account Type
                    </h6>
                    <fieldset>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group account-wrapper">
                            <label>Account Type</label>
                            <div class="row skin skin-flat">
                              <div class="col-md-12">
                                @foreach ($aza_types as $accType)
                                <div class="form-check">
                                  <input id="{{ $accType->name }}" name="aza_type" type="radio" value="{{ $accType->id }}">
                                  <label for="{{ $accType->name }}" class="text-capitalize">
                                    {{ $accType->name }}
                                  </label>
                                </div>
                                @endforeach
                                
                                @error('aza_type')
                                <div class="col-12 error"><em class="font-weight-bold">Oops! {{ $message }} </em> </div>
                                @enderror
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <!-- <div class="form-group account-wrapper">
                            <label>
                              Mode of Operation
                            </label>
                            <div class="row skin skin-flat">
                              <div class="col-md-12">
                                <div class="form-check">
                                  <input id="mode1" name="mode" type="radio" value="self" checked>
                                  <label for="mode1">
                                    Self Only
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input id="mode2" name="mode" type="radio" value="self_and_nominee">
                                  <label for="mode2">
                                    Either or Survivor
                                  </label>
                                </div>
                                
                              </div>
                            </div>
                          </div> -->
                        </div>
                      </div>
                    </fieldset>

                  </form>
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

@endsection

@section('page_js')

<!-- BEGIN: Vendor JS-->
<script src="/admin_assets/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="/admin_assets/app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="/admin_assets/app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
<script src="/admin_assets/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
<script src="/admin_assets/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"></script>
<script src="/admin_assets/app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
<script src="/admin_assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="/admin_assets/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/admin_assets/app-assets/js/core/app-menu.min.js"></script>
<script src="/admin_assets/app-assets/js/core/app.min.js"></script>
<script src="/admin_assets/app-assets/js/scripts/customizer.min.js"></script>
<script src="/admin_assets/app-assets/js/scripts/footer.min.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="/admin_assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
<script src="/admin_assets/app-assets/js/scripts/pages/bank-account.min.js"></script>
<!-- END: Page JS-->

@endsection