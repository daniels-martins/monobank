@extends('admin.layouts.app')
@section('title', 'Bank Transactions')
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
                    <h3 class="content-header-title">Payments</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Payments</a>
                                </li>
                                <li class="breadcrumb-item active">Payments Status
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
                            <h3 class="m-0">${{ auth()->user()->azaBalSavings() }}</h3><span class="text-muted">Balance</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="payments-details">
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">
                                        Payment Status
                                    </h4>
                                    <div class="float-right">
                                        <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right white"
                                            data-target="#deposit" data-toggle="modal">
                                            <i class="ft-plus white"></i>Deposit
                                        </a>
                                        <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right white mr-1"
                                            data-target="#withdraw" data-toggle="modal">
                                            <i class="ft-minus white"></i>Withdraw
                                        </a>
                                        <div aria-hidden="true" class="modal fade text-left" id="deposit" role="dialog"
                                            tabindex="-1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <label class="modal-title text-text-bold-600" id="myModalLabel33">
                                                            Deposit Your Amount
                                                        </label>
                                                    </div>
                                                    <form action="#">
                                                        <div class="modal-body">
                                                            <label>
                                                                Enter Amount :
                                                            </label>
                                                            <div class="form-group">
                                                                <input class="form-control" name="dep-amt"
                                                                    placeholder="Enter Amount" type="text">
                                                            </div>
                                                            <label for="source">
                                                                Select Transaction Source
                                                            </label>
                                                            <div class="form-group">
                                                                <select class="c-select form-control" id="source"
                                                                    name="dep-source">
                                                                    <option value="">
                                                                        Select Source
                                                                    </option>
                                                                    <option value="Active">
                                                                        Cash
                                                                    </option>
                                                                    <option value="Deactived">
                                                                        Cheque
                                                                    </option>
                                                                    <option value="Delayed">
                                                                        Online
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success mr-1" type="submit">
                                                                Submit
                                                            </button>
                                                            <button class="btn btn-danger mr-1" type="reset">
                                                                Cancel
                                                            </button>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div aria-hidden="true" class="modal fade text-left" id="withdraw" role="dialog"
                                            tabindex="-1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <label class="modal-title text-text-bold-600" id="withdraw1">
                                                            Withdraw Your Amount
                                                        </label>
                                                    </div>
                                                    <form action="#">
                                                        <div class="modal-body">
                                                            <label>
                                                                Enter Amount :
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            <div class="form-group">
                                                                <input class="form-control" name="with-amt"
                                                                    placeholder="Enter Amount" type="text">
                                                            </div>
                                                            <label for="source">
                                                                Select Transaction Source
                                                                <span class="danger">
                                                                    *
                                                                </span>
                                                            </label>
                                                            <div class="form-group">
                                                                <select class="c-select form-control" id="source1"
                                                                    name="with-source">
                                                                    <option value="">
                                                                        Select Source
                                                                    </option>
                                                                    <option value="Active">
                                                                        Cash
                                                                    </option>
                                                                    <option value="Deactived">
                                                                        Cheque
                                                                    </option>
                                                                    <option value="Delayed">
                                                                        Online
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success mr-1" type="submit">
                                                                Submit
                                                            </button>
                                                            <button class="btn btn-danger mr-1" type="reset">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-12">

                           {{-- successful trx --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">
                                        Completed Transactions
                                    </h4>
                                    {{-- <div class="float-right">
                                        <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right white"
                                            href="bank-add-payment.html">
                                            <i class="ft-plus white"></i>Add New Payment
                                        </a>
                                    </div> --}}
                                </div>
                                <div class="card-body mt-1 table-wrapper">
                                    <div class="table-responsive">
                                        {{-- <table class="table alt-pagination completed-payment"> --}}
                                          <table class="table alt-pagination completed-payment">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">From Account</th>
                                                    <th class="border-top-0">To Account</th>
                                                    <th class="border-top-0">Amount (USD)</th>
                                                    <th class="border-top-0">Date</th>
                                                    <th class="border-top-0">Type</th>
                                                    <th class="border-top-0">Source</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($allSuccessfulTrx as $trx)
                                                   <tr>
                                                      <td class="align-middle ac-from">{{ $trx->sender_acc }}</td>
                                                      <td class="align-middle ac-to">{{ $trx->receiver_acc }}</td>
                                                      <td class="align-middle amount">{{ '$'. number_format($trx->amount) }}</td>
                                                      <td class="align-middle trans-date">{{ $trx->created_at }}</td>
                                                      <td>
                                                          <span class="tran-type badge {{ $trx->type == 'credit' ? 'badge-success' : 'badge-danger' }} badge-pill badge-sm">
                                                              {{$trx->type }}
                                                          </span>
                                                      </td>
                                                      <td class="align-middle trans-source">{{ $trx->medium }}</td>
                                                      <td class="align-middle trans-source badge badge-pill badge-success">{{ $trx->status }}</td>
                                                      <td class="align-middle action">
                                                         <a href="{{ route('payments.edit', $trx->id) }}"><i
                                                            class="la la-pencil-square info"></i></a>
                                                          {{-- <a href="#"><i class="la la-trash danger"></i></a> --}}
                                                      </td>
  
                                                  </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            {{-- pending trx --}}
                            <div class="card">
                              <div class="card-header">
                                  <h4 class="card-title float-left">
                                      Pending Transactions
                                  </h4>
                                  {{-- <div class="float-right">
                                      <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right white"
                                          href="bank-add-payment.html">
                                          <i class="ft-plus white"></i>Add New Payment
                                      </a>
                                  </div> --}}
                              </div>
                              <div class="card-body mt-1 table-wrapper">
                                  <div class="table-responsive">
                                      {{-- <table class="table alt-pagination completed-payment"> --}}
                                        <table class="table alt-pagination completed-payment">
                                          <thead>
                                              <tr>
                                                  <th class="border-top-0">From Account</th>
                                                  <th class="border-top-0">To Account</th>
                                                  <th class="border-top-0">Amount (USD)</th>
                                                  <th class="border-top-0">Date</th>
                                                  <th class="border-top-0">Type</th>
                                                  <th class="border-top-0">Source</th>
                                                  <th class="border-top-0">Status</th>
                                                  <th class="border-top-0">Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              @foreach ($allPendingTrx as $trx)
                                                 <tr>
                                                    <td class="align-middle ac-from">{{ $trx->sender_acc }}</td>
                                                    <td class="align-middle ac-to">{{ $trx->receiver_acc }}</td>
                                                    <td class="align-middle amount">{{ '$'. number_format($trx->amount) }}</td>
                                                    <td class="align-middle trans-date">{{ $trx->created_at }}</td>
                                                    <td>
                                                        <span class="tran-type badge {{ $trx->type == 'credit' ? 'badge-success' : 'badge-danger' }} badge-pill badge-sm">
                                                            {{$trx->type }}
                                                        </span>
                                                    </td>
                                                    <td class="align-middle trans-source">{{ $trx->medium }}</td>
                                                      <td class="align-middle trans-source badge badge-pill badge-warning">{{ $trx->status }}</td>
                                                      <td class="align-middle action">
                                                        <a href="{{ route('payments.edit', $trx->id) }}"><i
                                                                class="la la-pencil-square info"></i></a>
                                                        {{-- <a href="#"><i class="la la-trash danger"></i></a> --}}
                                                    </td>

                                                </tr>
                                              @endforeach
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>


                          {{-- failed trx --}}
                          <div class="card">
                           <div class="card-header">
                               <h4 class="card-title float-left">
                                   Failed Transactions
                               </h4>
                               {{-- <div class="float-right">
                                   <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right white"
                                       href="bank-add-payment.html">
                                       <i class="ft-plus white"></i>Add New Payment
                                   </a>
                               </div> --}}
                           </div>
                           <div class="card-body mt-1 table-wrapper">
                               <div class="table-responsive">
                                   {{-- <table class="table alt-pagination completed-payment"> --}}
                                     <table class="table alt-pagination completed-payment">
                                       <thead>
                                           <tr>
                                               <th class="border-top-0">From Account</th>
                                               <th class="border-top-0">To Account</th>
                                               <th class="border-top-0">Amount (USD)</th>
                                               <th class="border-top-0">Date</th>
                                               <th class="border-top-0">Type</th>
                                               <th class="border-top-0">Source</th>
                                               <th class="border-top-0">Status</th>
                                               <th class="border-top-0">Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           @foreach ($allFailedTrx as $trx)
                                              <tr>
                                                 <td class="align-middle ac-from">{{ $trx->sender_acc }}</td>
                                                 <td class="align-middle ac-to">{{ $trx->receiver_acc }}</td>
                                                 <td class="align-middle amount">{{ '$'. number_format($trx->amount) }}</td>
                                                 <td class="align-middle trans-date">{{ $trx->created_at }}</td>
                                                 <td>
                                                     <span class="tran-type badge {{ $trx->type == 'credit' ? 'badge-success' : 'badge-danger' }} badge-pill badge-sm">
                                                         {{$trx->type }}
                                                     </span>
                                                 </td>
                                                 <td class="align-middle trans-source">{{ $trx->medium }}</td>
                                                   <td class="align-middle trans-source badge badge-pill badge-danger">{{ $trx->status }}</td>
                                                   <td class="align-middle action">
                                                     <a href="{{ route('payments.edit', $trx->id) }}"><i
                                                             class="la la-pencil-square info"></i></a>
                                                     {{-- <a href="#"><i class="la la-trash danger"></i></a> --}}
                                                 </td>

                                             </tr>
                                           @endforeach
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
    <script src="/admin_assets/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/admin_assets/app-assets/js/core/app-menu.min.js"></script>
    <script src="/admin_assets/app-assets/js/core/app.min.js"></script>
    <script src="/admin_assets/app-assets/js/scripts/customizer.min.js"></script>
    <script src="/admin_assets/app-assets/js/scripts/footer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/admin_assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
    <script src="/admin_assets/app-assets/js/scripts/pages/bank-accounts.min.js"></script>
    <!-- END: Page JS-->

@endsection
