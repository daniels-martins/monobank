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
                    <h3 class="content-header-title">Transfer Money Domestically</h3>
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
                <div class="content-header-right col-md-6 col-12">
                    <div class="media width-250 float-right">
                        <media-left class="media-middle">
                            <div id="sp-bar-total-sales"></div>
                        </media-left>
                        <div class="media-body media-right text-right">
                            <h3 class="m-0">${{ auth()->user()->azaBalSavings() }}</h3><span
                                class="text-muted">Balance</span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Form wizard with number tabs section start -->
                <section id="validation">
                    <div class="row">
                        <div class="col-12 col-sm-4 offset-sm-4 ">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{-- Update Profile --}}
                                    </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{ route('payments.store') }}" id='payment_create_form'
                                            method="post" class="steps-validation wizard-notification wizard-info" name="createpayment"
                                            > @csrf
                                            <input required type="hidden" name="jurisdiction" value="domestic">
                                            <input required type="hidden" name="is_foreign" value=0 >

                                            <!----   Step 1 ------>
                                            <h6>
                                                Payment Information
                                            </h6>
                                            <fieldset>
                                                @foreach ($errors->all() as $error)
                                                    <li class="my-5">{{ $error }}</li>
                                                @endforeach
                                                {{-- <x-auth-validation-errors :errors="$errors" /> --}}
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="fname">
                                                                Select Debit Account
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            {{-- {{ dd($authUser->profile) }} --}}
                                                            <select required name="source_aza" id="source_aza" class="form-control">
                                                                <option value="">Select...</option>
                                                                @foreach ($accounts as $aza)
                                                                    <option value="{{ $aza->num }}"
                                                                        class="{{ $aza->is_blocked ? 'danger' : '' }}">
                                                                        {{ $aza->num }}
                                                                        ({{ $aza->getType() }})
                                                                        --- $ {{ $aza->balance }}
                                                                        [{{ $aza->is_blocked ? 'Blocked' : 'Active' }}]
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="receiver_bank_name">
                                                                Receiver Bank Name
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            {{-- {{ dd($authUser->profile) }} --}}
                                                            <input required value="{{ old('destination_bank') }}"
                                                                class="form-control" id="receiver_bank_name"
                                                                placeholder="eg. Chase, Bank of America etc." type="text"
                                                                name="destination_bank">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="receiver_routing_num">
                                                                Bank Routing Number
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            <input required value="{{ old('receiver_routing_num') }}"
                                                                class="form-control" id="receiver_routing_num"
                                                                type="text" placeholder="eg. John Doe" minlength="9"
                                                                maxlength="9" name="receiver_routing_num">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 col-sm-12">
                                                      <div class="form-group">
                                                          <label for="recipient_bank_account_type">
                                                             Recipient's Bank Account Type
                                                              <span class="danger">
                                                                  *
                                                              </span>
                                                          </label>
                                                          {{-- {{ dd($authUser->profile) }} --}}
                                                          <select required name="recipient_bank_account_type" id="recipient_bank_account_type"
                                                              class="form-control">
                                                              <option value="">Select...</option>
                                                              @foreach ($azaTypes as $aza)
                                                                  <option value='{{ $aza->name }}'>{{ ucfirst($aza->name) }} </option>
                                                                  {{-- <option value='checking'>Checking </option> --}}
                                                              @endforeach
                                                          </select>
                                                      </div>
                                                  </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="receiver_account_name">
                                                                Beneficiary Name
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            <input required value="{{ old('beneficiary') }}" class="form-control"
                                                                id="receiver_account_name" type="text"
                                                                placeholder="eg. John Doe" name="beneficiary">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="receiver_account_num">
                                                                Beneficiary Account Number
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            <input required value="{{ old('destination_aza') }}"
                                                                class="form-control" type="number" maxlength="10"
                                                                minlength="10" id="receiver_account_num"
                                                                name="destination_aza" placeholder="0123456789">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="amount">
                                                                Amount ($)
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            <input required value="{{ old('amount') }}" class="form-control"
                                                                type="number" maxlength="10" id="amount"
                                                                name="amount" placeholder="Permanent amount">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>


                                            <!----Step 4---->
                                            <h6>
                                                Confirmation
                                            </h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="card offset-md-4">
                                                                <div class="card-body">
                                                                    <div id="text-lg h2">
                                                                        <span class="h2"> You are about to send </span>
                                                                        <span class="h2"
                                                                            id="present-amount">$amount</span>
                                                                        <div class="h2 ml-5"> To </div>
                                                                        <span class="h2"
                                                                            id="present-receiver-name">#doe</span>
                                                                        <span class="h2"
                                                                            id="present-receiver-acc">01123456765</span>.
                                                                        <br>
                                                                        <span class="h2"> Receiving Bank : </span>
                                                                        <span class="h2"
                                                                            id="present-receiver-bank">$recBank</span>
                                                                    </div>
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
