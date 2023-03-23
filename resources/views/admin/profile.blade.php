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
              <li class="breadcrumb-item"><a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Accounts</a>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">
                  Update Profile
                </h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <form action="{{ route('profile.update', auth()->user()->profile->id) }}" method="post" 
                  class="steps-validation wizard-notification wizard-info" novalidate>
                  @csrf @method('patch')

                    <!----   Step 1 ------>
                    <h6>
                      Personal Information
                    </h6>
                    <fieldset>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="fname">
                              First Name
                              <span class="danger">
                                *
                              </span>
                            </label>
                            {{-- {{ dd($authUser->profile) }} --}}
                            <input class="form-control" value="{{ $authUser->profile->fname ?? old('fname') }}" id="fname" placeholder="First Name" type="text" name="fname">
                          </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="lname">
                              Last Name
                              <span class="danger">
                                *
                              </span>
                            </label>
                            <input class="form-control" value="{{ $authUser->profile->lname ?? old('lname') }}" id="lname" placeholder="lname" type="text" name="lname">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12">
                          <div class="form-group">
                            <label for="address">
                              Permanent Address
                              <span class="danger">
                                *
                              </span>
                            </label>
                            <input class="form-control" value="{{ $authUser->profile->address ?? old('address') }}" id="address" name="address" placeholder="Permanent Address">
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="dob">
                              Date of Birth
                            </label>
                            <input class="form-control" value="{{ $authUser->profile->dob ?? old('dob') }}" id="dob" type="date" value="2011-08-19" name="dob">
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                          <div class="form-group">
                            <label for="phone">
                              Mobile No.
                              <span class="danger">
                                *
                              </span>
                            </label>
                            <input class="form-control" value="{{ $authUser->profile->phone ?? old('phone') }}" id="phone" placeholder="Mobile No." type="text" name="phone">
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-7">
                          <div class="form-group">
                            <label for="user_email">
                              E-mail ID<span class="danger">
                                *
                              </span>
                            </label>
                            <input class="form-control" id="user_email" placeholder="E-mail ID" type="email" name="user_email"
                            value="{{ $authUser->email  ??  $authUser->email ??  old('user_email') }}" >
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group account-wrapper">
                            <label>
                              Gender
                            </label>
                            <div class="row skin skin-flat">
                              <div class="col-md-12">
                                <div class="form-check">
                                  <input id="male" name="sex" type="radio" value="male" checked>
                                  <label for="male">
                                    Male
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input id="female" name="sex" type="radio" value="female">
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
                                  <input id="single" name="marital_status" type="radio" value="single" 
                                  @if ($authUser->profile)
                                    
                                  @endif
                                  checked
                                  >
                                  <label for="single">
                                    Single
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input id="married" name="marital_status" type="radio" value="married">
                                  <label for="married">
                                    Married
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input id="others" name="marital_status" type="radio" value="others">
                                  <label for="others">
                                    Others
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </fieldset>



                    <!----   Step 3 ------>
                    <!-- <h6>
                        Documents
                    </h6>
                    <fieldset>
                      <div class="row skin skin-flat">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="income">
                              Annual Income :
                            </label>
                            <input class="form-control" value="{{ $authUser->profile->value ?? old('value') }}" id="income" placeholder="Income in USD" type="text" name="income">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="incometax">Income Tax Number</label>
                            <input type="number" class="form-control" id="incometax" name="incometax">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6 col-sm-6">
                          <div class="form-group">
                            <label for="passport">
                              Passport No.
                            </label>
                            <input class="form-control" value="{{ $authUser->profile->value ?? old('value') }}" id="passport" placeholder="Passport No." type="text" name="passport">
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <div class="form-group">
                            <label for="pancard">
                              PAN No.<span class="danger">*</span>
                            </label>
                            <input class="form-control" value="{{ $authUser->profile->value ?? old('value') }}" id="pancard" placeholder="e.g. XXXXX0000X" type="text" name="pancard">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label>
                              Proof of Identity :
                            </label>
                            <div class="row skin skin-flat">
                              <div class="col-md-12">
                                <div class="form-check">
                                  <input id="input-15" name="input-radio-3" type="radio" checked>
                                  <label for="input-15">
                                    National ID No.
                                  </label>
                                </div>
                                <div class="form-check">

                                  <input id="input-11" name="input-radio-3" type="radio">
                                  <label for="input-11">
                                    Passport
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input id="input-12" name="input-radio-3" type="radio">
                                  <label for="input-12">
                                    PAN Card
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input id="input-13" name="input-radio-3" type="radio">
                                  <label for="input-13">
                                    Driving License
                                  </label>
                                </div>

                              </div>
                            </div>
                            <input class="form-control  value="{{ $authUser->profile->value ?? old('value') }}"mt-2" id="add-proof" placeholder="Enter Document No." type="text">
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label>
                              Proof of Address :
                            </label>
                            <div class="row skin skin-flat">
                              <div class="col-md-12">
                                <div class="form-check">
                                  <input id="input-17" name="input-radio-4" type="radio" checked>
                                  <label for="input-17">
                                    Electricity Bill
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input id="input-16" name="input-radio-4" type="radio">
                                  <label for="input-16">
                                    IT Return
                                  </label>
                                </div>

                                <div class="form-check">
                                  <input id="input-18" name="input-radio-4" type="radio">
                                  <label for="input-18">
                                    Telephone Bill
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input id="input-19" name="input-radio-4" type="radio">
                                  <label for="input-19">
                                    Bank A/c Statement
                                  </label>
                                </div>
                              </div>
                            </div>
                            <input class="form-control  value="{{ $authUser->profile->value ?? old('value') }}"mt-2" id="add-proof-1" placeholder="Enter Document No." type="text">
                          </div>
                        </div>
                      </div>
                    </fieldset> -->


                    <!----Step 4---->
                    <h6>
                      Nominee Details
                    </h6>
                    <fieldset>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nok_name">
                              Nominee Name<span class="danger">*</span>
                            </label>
                            <input class="form-control" value="{{ $authUser->profile->value ?? old('value') }}" id="nok_name" placeholder="Nominee Name" type="text" name="nok_name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="relation">
                              Nominee Relationship<span class="danger">*</span>
                            </label>
                            <input class="form-control  value="{{ $authUser->profile->value ?? old('value') }}"" id="relation" placeholder="Relationship with Nominee" type="text" name="nok_relationship">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nom-add">
                              Nominee Address<span class="danger">*</span>
                            </label>
                            <input class="form-control" value="{{ $authUser->profile->value ?? old('value') }}" id="nok_address" placeholder="Nominee Address" name="nok_address">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nok_phone">
                              Nominee Contact Number<span class="danger">*</span>
                            </label>
                            <input class="form-control" value="{{ $authUser->profile->value ?? old('value') }}" id="nok_phone" placeholder="Nominee Contact Number" name="nok_phone">
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