@extends('admin.layouts.app')
@section('title', 'Add Account')
@section('page_css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/vendors.min.css">
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
<link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/pages/single-page.min.css">
<!-- END: Page CSS-->

@endsection

@section('custom_css')
{{-- <link rel="stylesheet" type="text/css" href="/admin_assets/assets/css/"> --}}
@endsection


@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ubuntu-font">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Add Payment</h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="#">Payments</a>
              </li>
              <li class="breadcrumb-item active">Add Payment
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <!-- Form wizard with number tabs section start -->
      <section id="add-payment">
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-4 center_div" >
            <div class="card center">
              <div class="card-header">
                <h4 class="card-title">
                  Make a New Payment
                </h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <form action="{{ route('payments.store') }}" id="commentForm" class="" novalidate method="post">
                    @csrf 
                    <div class="row">
                      
                    <div class="col-sm-12 col-md-11 col-lg-10">
                        <div class="form-group">
                          <label for="source_aza">
                            Account From
                            <span class="danger">*</span> <span class="primary">(Source Account)</span>
                          </label>
                          <div class="form-group">
                            <select class="form-control" id="source_aza" name="source_aza">
                            <option value="Deposit">
                                ---
                              </option>
                              @foreach ($accounts as $account)
                              <option value="{{ $account->num }}">
                                {{ $account->getType() . " ($account->num)" }}
                              </option>
                              @endforeach
                            </select>

                            {{-- if there is a need to deal with transaction type --}}
                            {{-- <select class="form-control" id="trans-type" name="trans-type">
                              <option value="Deposit">
                                Savings (0162815192)
                              </option>
                              <option value="Withdraw">
                              Checking (2014360545)
                              </option>
                            </select> --}}
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-12 col-md-11 col-lg-10">
                        <div class="form-group">
                          <label for="amount">
                            Amount ($)
                            <span class="danger">
                              *
                            </span>
                          </label>
                          <input class="form-control" id="amount" name="amount" placeholder="Enter Amount" min="100" type="number" >
                        </div>
                      </div>
                    </div>
                    <div class="row">

                      <div class="col-sm-12 col-md-11 col-lg-10">
                        <div class="form-group">
                          <label for="destination_aza">
                            Transfer to A/c
                          </label>
                          <span class="danger"> * </span>
                          <span class="primary"> (Destination Account) </span>
                          <input maxlength=10 minlength="10" class="form-control" id="destination_aza"
                             name="destination_aza" placeholder="Transfer to Account" type="number">
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-11 col-lg-10">
                        <div class="form-group">
                          
                          <label for="destination_bank">Bank Name</label>
                          <span class="primary"> (Destination Bank Name) </span>
                          <input class="form-control" id="destination_bank" name="destination_bank" placeholder="Bank Name" type="text">
                        </div>
                      </div>

                      <div class="col-sm-12 col-md-11 col-lg-10">
                        <div class="form-group">
                          <label for="beneficiary">
                            Beneficiary Name
                          </label>
                          <input class="form-control" id="beneficiary" name="beneficiary" placeholder="Bank Name" type="text">
                        </div>
                      </div>


                      <div class="col-sm-12 col-md-11 col-lg-10">
                        <div class="form-group">
                          <label for="remarks">
                            Remarks
                          </label>
                          <input class="form-control" id="remarks" name="remarks" placeholder="Remarks" type="text">
                        </div>
                      </div>
                    </div>

                    <div class="card-footer text-right">
                      <input type="submit" value="Submit" class="btn btn-success mr-1">
                      <input type="reset" value="Cancel" class="btn btn-danger">
                    </div>

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
<script src="/admin_assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/admin_assets/app-assets/js/core/app-menu.min.js"></script>
<script src="/admin_assets/app-assets/js/core/app.min.js"></script>
<script src="/admin_assets/app-assets/js/scripts/customizer.min.js"></script>
<script src="/admin_assets/app-assets/js/scripts/footer.min.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="/admin_assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
<script src="/admin_assets/app-assets/js/scripts/pages/payment.min.js"></script>
<!-- END: Page JS-->

@endsection