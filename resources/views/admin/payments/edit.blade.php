@extends('admin.layouts.app')
@section('title', 'Modify Account')
@section('page_css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/pickers/daterange/daterangepicker.css">
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
                    <h3 class="content-header-title">Modify Any Payment or Transactions [Admin]</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('payments.index') }}">Payments</a>
                                </li>
                                <li class="breadcrumb-item active">Modify Account
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
               <x-view-savings-aza-balance />
            </div>
            <div class="content-body">
                <!-- Form wizard with number tabs section start -->
                <section id="validation">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                       Click here to <a href="{{ route('transactions.index', ['caller' => 'xxx-admin']) }}">View All Transactions</a> <br><br>
                                       Click here to <a href="{{ route('transactions.index', ['caller' => 'xxx-admin']) }}">View Changes Made</a>
                                    </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{ route('payments.update', $payment->id) }}" method="post"
                                            class="steps-validation wizard-notification wizard-info">@csrf @method('patch')
                                            @csrf
                                            <!----   Step 2 ------>
                                            <h6>
                                                Account Status
                                            </h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group account-wrapper">
                                                         <label class="h3">
                                                             Switch transaction status
                                                             <br>
                                                         </label>
                                                         <div class="">
                                                             <p>Seamlessly Switch a transaction between pending,
                                                                 successful and failed </p>
                                                             <div class="col-md-9">
                                                               Current status: {{ $payment->status }}
                                                                 <select name="status" id="status"
                                                                     class="form-control">
                                                                     <option value="">--Switch Transaction--
                                                                     </option>
                                                                     @foreach (['pending', 'successful', 'failed'] as $status)
                                                                         <option value="{{ $status }}"
                                                                             @if ($status == $payment->status) selected @endif>
                                                                             {{ ucfirst($status) }}</option>
                                                                     @endforeach
                                                                 </select>
                                                                 <x-auth-validation-errors />
                                                             </div>
                                                         </div>
                                                     </div>

                                                     <div class="form-group account-wrapper">
                                                      <label class="h4">
                                                          Switch transaction Date
                                                          <br>
                                                      </label>
                                                      <div class="">
                                                          <p>Set a new date for this transaction</p>
                                                          <div class="col-md-9">
                                                              <input type="date" name="mod_trx_date" />
                                                              <x-auth-validation-errors />
                                                          </div>
                                                      </div>
                                                  </div>
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
