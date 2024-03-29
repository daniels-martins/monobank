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
                    <h3 class="content-header-title">Update Profile Information</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Accounts</a>
                                </li>
                                <li class="breadcrumb-item active">Update Profile
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
                        <div class="col-12 col-sm-4 offset-sm-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        Update Profile
                                    </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form action="{{ route('profile.update', auth()->user()->profile->id) }}"
                                            method="post" class="">
                                            @csrf @method('patch')

                                            <!----   Step 1 ------>
                                            <h6>
                                                Personal Information
                                            </h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-12 my-1">
                                                        <div class="form-group">
                                                            <label for="fname">
                                                                First Name
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            {{-- {{ dd($authUser->profile) }} --}}
                                                            <input required class="form-control"
                                                                value="{{ $authUser->profile->fname ?? old('fname') }}"
                                                                id="fname" placeholder="First Name" type="text"
                                                                name="fname">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 my-1">
                                                        <div class="form-group">
                                                            <label for="lname">
                                                                Last Name
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            <input required class="form-control"
                                                                value="{{ $authUser->profile->lname ?? old('lname') }}"
                                                                id="lname" placeholder="lname" type="text"
                                                                name="lname">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-1">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="address">
                                                                Permanent Address
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            <input required class="form-control"
                                                                value="{{ $authUser->profile->address ?? old('address') }}"
                                                                id="address" name="address"
                                                                placeholder="Permanent Address">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 my-1">
                                                        <div class="form-group">
                                                            <label for="dob">
                                                                Date of Birth
                                                            </label>
                                                            <input required class="form-control"
                                                                value="{{ $authUser->profile->dob ?? old('dob') }}"
                                                                id="dob" type="date" value="2011-08-19"
                                                                name="dob">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 my-1">
                                                        <div class="form-group">
                                                            <label for="phone">
                                                                Mobile No.
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            <input required class="form-control"
                                                                value="{{ $authUser->profile->phone ?? old('phone') }}"
                                                                id="phone" placeholder="Mobile No." type="text"
                                                                name="phone">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-12 my-1>
                                                        <div class="form-group">
                                                        <label for="email">
                                                            E-mail ID<span class="danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input required class="form-control" id="email"
                                                            placeholder="E-mail ID" type="email" name="email"
                                                            value="{{ $authUser->email ?? ($authUser->email ?? old('email')) }}">
                                                    </div>

                                                    <div class="col-md-12 m-1">
                                                        <div class="form-group account-wrapper">
                                                            <label>
                                                                Gender
                                                            </label>
                                                            <div class="row skin skin-flat">
                                                                <div class="col-md-12">
                                                                    <div class="form-check">
                                                                        <input required id="male" name="sex"
                                                                            type="radio" value="male" checked>
                                                                        <label for="male">
                                                                            Male
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input required id="female" name="sex"
                                                                            type="radio" value="female">
                                                                        <label for="female">
                                                                            Female
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group account-wrapper">
                                                            <label>
                                                                Marital Status
                                                            </label>
                                                            <div class="row skin skin-flat">
                                                                <div class="col-md-12">
                                                                    <div class="form-check">
                                                                        <input required id="single" name="marital_status"
                                                                            type="radio" value="single"
                                                                            @if ($authUser->profile)  @endif
                                                                            checked>
                                                                        <label for="single">
                                                                            Single
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input required id="married" name="marital_status"
                                                                            type="radio" value="married">
                                                                        <label for="married">
                                                                            Married
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input required id="others" name="marital_status"
                                                                            type="radio" value="others">
                                                                        <label for="others">
                                                                            Others
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <h6 class="my-4">
                                                    Next of Kin Information
                                                </h6>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nok_name">
                                                                Next of Kin Name<span class="danger">*</span>
                                                            </label>
                                                            <input required class="form-control"
                                                                value="{{ $authUser->profile->nok_name ?? old('nok_name') }}"
                                                                id="nok_name" placeholder="Next of Kin Name"
                                                                type="text" name="nok_name">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nom-add">
                                                                Next of Kin Address<span class="danger">*</span>
                                                            </label>
                                                            <input required class="form-control"
                                                                value="{{ $authUser->profile->nok_address ?? old('nok_address') }}"
                                                                id="nok_address" placeholder="Next of Kin Address"
                                                                name="nok_address">
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="relation">
                                                                Next of Kin Relationship<span class="danger">*</span>
                                                            </label>
                                                            <input class="form-control"
                                                                value="{{ $authUser->profile->nok_relationship ?? old('nok_relationship') }}"
                                                                id="relation" placeholder="Relationship with Next of Kin"
                                                                type="text" name="nok_relationship">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                      <div class="form-group">
                                                          <label for="nok_phone">
                                                              Next of Kin Contact Number<span class="danger">*</span>
                                                          </label>
                                                          <input class="form-control"
                                                              value="{{ $authUser->profile->nok_phone ?? old('nok_phone') }}"
                                                              id="nok_phone" placeholder="Next of Kin Contact Number"
                                                              name="nok_phone">
                                                      </div>
                                                  </div>

                                                  <div class=" col-12 col-md-4 col-sm-12 my-2">
                                                   <div class="form-group">
                                                       <input class="form-control  btn btn-primary text-white"  type="submit" value="Save"
                                                           value="{{ $authUser->profile->nok_phone ?? old('nok_phone') }}" />
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
