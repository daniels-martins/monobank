@extends('admin.layouts.app')
@section('title', 'Profile')
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

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/admin_assets/assets/css/style.css">
    <!-- END: Custom CSS-->
@endsection

@section('custom_css')
    {{-- <link rel="stylesheet" type="text/css" href="/admin_assets/assets/css/"> --}}
@endsection


@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Transfer Money to Other Banks</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Accounts</a>
                                </li>
                                <li class="breadcrumb-item active">Transfer Money
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
                        <div class="my-5  col-12 col-sm-6 offset-sm-3" style="display:flex; gap: 15em;">
                           <a href="{{ route('payments.create', ['transfer_type' => 'local']) }}" class="">
                              <div class="card bg-primary">
                                  <div class="card-body text-center  p-3">
                                      <span class="text-white h1"> Domestic Transfer</span>
                                  </div>
                              </div>
                          </a>

                          
                            <a href="{{ route('payments.create', ['transfer_type' => 'foreign']) }}" class="">
                                <div class="card bg-success">
                                    <div class="card-body text-center  p-3">
                                        <span class="text-white  h1"> International Transfer</span>
                                    </div>
                                </div>
                            </a>

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

    {{-- udo custom JS for this page --}}

    <script>
        // variable declarations

        const source_aza = document.querySelector('#source_aza');

        const recAccNum = document.querySelector('#receiver_account_num');
        const presentRecAccNum = document.querySelector('#present-receiver-acc');

        const recName = document.querySelector('#receiver_account_name');
        const presentRecName = document.querySelector('#present-receiver-name');

        const recBank = document.querySelector('#receiver_bank_name');
        const presentRecBank = document.querySelector('#present-receiver-bank');

        const amount = document.querySelector('#amount');
        const presentAmount = document.querySelector('#present-amount');

        //   console.log('seer', recBank, 'relier', 'again', presentRecBank)
        source_aza.addEventListener('change', function() {
            setValues();
        })
        // for aza num  
        recAccNum.addEventListener('change', function() {
            // console.log(this.value, this, 'hi' + `(${this.value})`);
            // presentRecAccNum.innerHTML = `(${this.value})`;
            setValues();
        })

        // for receiver name
        recName.addEventListener('change', function() {
            // presentRecName.innerHTML = this.value;
            setValues();
        })

        // for receiver Bank
        recBank.addEventListener('change', function() {
            // presentRecBank.innerHTML = this.value;
            setValues(recBank);
        })

        // for amount
        amount.addEventListener('change', function() {
            // presentAmount.innerHTML = '$' + this.value;
            setValues();
        })


        function setValues(elem) {
            presentRecAccNum.innerHTML = recAccNum.value;
            presentRecName.innerHTML = recName.value;
            presentRecBank.innerHTML = recBank.value;
            presentAmount.innerHTML = '$' + amount.value;
        }
    </script>
@endsection
