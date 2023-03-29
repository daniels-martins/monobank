@extends('admin.layouts.app')
@section('title', 'Bank Cards')
@section('page_css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/tables/datatable/datatables.min.css">
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
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
    
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title">Cards List</h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="{{ route('cards.index') }}">Accounts</a>
              </li>
              <li class="breadcrumb-item active">Cards List
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content-body">
      <!-- Base style table -->
      <section id="base-style">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title float-left">My Cards</h4>
                <div class="float-right">
                  <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right white" data-toggle="modal" data-target="#inlineForm">
                    <i class="ft-plus white"></i>
                    Add New Card</a>
                  <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <label class="modal-title text-text-bold-600" id="myModalLabel33">Credit Card Details</label>
                        </div>
                        <form action="{{ route('cards.store') }}" method="post">@csrf
                          <div class="modal-body">
                            <label>Holder Name
                              <span class="danger">*</span>
                            </label>
                            <div class="form-group">
                              <input type="text" placeholder="Holder Name" name="holder-name" class="form-control">
                            </div>

                            <label>Card Number
                              <span class="danger">*</span>
                            </label>
                            <div class="form-group">
                              <input type="text" placeholder="Card Number" name="card-no" class="form-control">
                            </div>

                            {{-- <label>Credit Limit </label>
                            <div class="form-group">
                              <input type="text" placeholder="Credit Limit" name="limit" class="form-control">
                            </div> --}}

                            <label>Card Balance </label>
                            <div class="form-group">
                              <input type="text" placeholder="Credit Limit" name="limit" class="form-control" />
                            </div>

                            <label for="status">Card Status
                              <span class="danger">*</span>
                            </label>
                            <div class="form-group">
                              <select class="c-select form-control" id="status" name="card-status">
                                <option value="Active">Active</option>
                                <option value="Deactived">Deactived</option>
                                <option value="Delayed">Delayed</option>
                                <option value="Surrendered">Surrendered</option>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <input type="submit" class="btn btn-success" value="Submit">
                            <input type="reset" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body mt-1">
                <div class="table-responsive">
                  <table id="active-accounts" class="table alt-pagination card-wrapper">
                    <thead>
                      <tr>
                        <th class="border-top-0">PAN</th>
                        <th class="border-top-0">Card No.</th>
                        <th class="border-top-0">CVV</th>
                        <th class="border-top-0">Holder Name</th>
                        <th class="border-top-0">Expiry Date</th>
                        {{-- <th class="border-top-0">Credit Limit</th> --}}
                        <th class="border-top-0">Credit Balance</th>
                        <th class="border-top-0">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($cards as $card)
                          <tr>
                            <td class="align-middle">
                              <div class="card-icon">{{ $card->pan ?? 'Debit' }}</div>
                            </td>
                            <td class="align-middle">
                              <div class="card-no"><i class="la la-credit-card text-light"></i>
                                {{ $card->card_num }}
                              </div>
                            </td>

                            <td class="align-middle">
                              <div class="card-no">{{ $card->cvv }}</div>
                            </td>


                            <td class="align-middle">
                              <div class="holder-name">{{ auth()->user()->profile->getFullName() }}</div>
                            </td>
                            <td class="align-middle">
                              <div class="exp-date">{{ $card->expiry }}</div>
                            </td>
                            {{-- <td class="align-middle limit">{{ $card->balance ?? 1000 }}</td> --}}
                            <td class="align-middle">
                              <div class="ac-balance">
                                <span>$</span> {{ $card->balance > 0 ? $card->balance : '0.00' }}
                              </div>
                            </td>

                            <td class="align-middle">
                              <div class="ac-status badge 
                                @if ($card->status) badge-success @else badge-danger @endif 
                                badge-pill badge-sm">
                                @if ($card->status) Active @else Deactivated @endif
                              </div>
                            </td>
                          </tr>
                      @endforeach
                     
                      
                      {{-- <tr>
                        <td class="align-middle">
                          <div class="card-icon"><i class="la la-credit-card text-light"></i></div>
                        </td>
                        <td class="align-middle">
                          <div class="card-no">xxxx-xxxx-xxxx-2463</div>
                        </td>
                        <td class="align-middle">
                          <div class="holder-name">Joneslass smith</div>
                        </td>
                        <td class="align-middle">
                          <div class="exp-date">10/20</div>
                        </td>
                        <td class="align-middle limit">4,000</td>
                        <td class="align-middle">
                          <div class="status badge badge-primary badge-pill badge-sm">Surrendered</div>
                        </td>
                        <td class="align-middle">
                          <div class="action">
                            <a href="bank-add-card.html"><i class="la la-pencil-square success"></i></a>
                            <a href="#"><i class="la la-trash danger"></i></a>
                          </div>
                        </td>
                      </tr> --}}
                    </tbody>
                  </table>
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

{{-- this is the source of the data tables both html and js --}}
{{-- <script src="/admin_assets/app-assets/vendors/js/tables/datatable/datatables.min.js"></script> --}}
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/admin_assets/app-assets/js/core/app-menu.min.js"></script>
<script src="/admin_assets/app-assets/js/core/app.min.js"></script>
<script src="/admin_assets/app-assets/js/scripts/customizer.min.js"></script>
<script src="/admin_assets/app-assets/js/scripts/footer.min.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="/admin_assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
<script src="/admin_assets/app-assets/js/scripts/pages/bank-cards.min.js"></script>
<!-- END: Page JS-->

@endsection