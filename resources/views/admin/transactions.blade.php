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
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('payments.index') }}">Payments</a>
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
                            <h3 class="m-0">${{ auth()->user()->azaBalSavings() }}</h3><span
                                class="text-muted">Balance</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="payments-details">
                    <div class="row">
                        <div class="col-12 col-sm-10 offset-sm-1">

                            {{-- successful trx --}}
                            @if ($allSuccessfulTrx->count() > 0)
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
                                                        {{-- <th class="border-top-0">Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allSuccessfulTrx as $trx)
                                                        <tr class="">
                                                            <td class="p-2 align-middle ac-from">{{ $trx->sender_acc }}</td>
                                                            <td class="align-middle ac-to">{{ $trx->receiver_acc }}</td>
                                                            <td class="align-middle amount">
                                                                {{ '$' . number_format($trx->amount) }}</td>
                                                            <td class="align-middle trans-date">{{ $trx->mod_trx_date ?: $trx->created_at }}
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="tran-type badge {{ $trx->receiver_id == auth()->user()->id ? 'badge-success' : 'badge-danger' }} badge-pill badge-sm">
                                                                    {{ $trx->type }}
                                                                </span>
                                                            </td>
                                                            <td class="align-middle trans-source">{{ $trx->medium }}</td>
                                                            <td
                                                                class="align-middle trans-source success">
                                                                {{ $trx->status }}</td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- pending trx --}}
                            @if ($allPendingTrx->count() > 0)
                                <div class="card col-12">
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
                                                        {{-- <th class="border-top-0">Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allPendingTrx as $trx)
                                                        <tr>
                                                            <td class="align-middle ac-from">{{ $trx->sender_acc }}</td>
                                                            <td class="align-middle ac-to">{{ $trx->receiver_acc }}</td>
                                                            <td class="align-middle amount">
                                                                {{ '$' . number_format($trx->amount) }}</td>
                                                            <td class="align-middle trans-date">{{ $trx->mod_trx_date ?: $trx->created_at }}
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="tran-type badge {{ $trx->type == 'credit' ? 'badge-success' : 'badge-danger' }} badge-pill badge-sm">
                                                                    {{ $trx->type }}
                                                                </span>
                                                            </td>
                                                            <td class="align-middle trans-source">{{ $trx->medium }}</td>
                                                            <td
                                                                class="align-middle trans-source badge badge-pill badge-warning">
                                                                {{ $trx->status }}</td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            {{-- failed trx --}}
                            @if ($allFailedTrx->count() > 0)

                                <div class="card col-12">
                                    <div class="card-header">
                                        <h4 class="card-title float-left">
                                            Failed Transactions
                                        </h4>
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
                                                        {{-- <th class="border-top-0">Action</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($allFailedTrx as $trx)
                                                        <tr>
                                                            <td class="align-middle ac-from">{{ $trx->sender_acc }}</td>
                                                            <td class="align-middle ac-to">{{ $trx->receiver_acc }}</td>
                                                            <td class="align-middle amount">
                                                                {{ '$' . number_format($trx->amount) }}</td>
                                                            <td class="align-middle trans-date">{{ $trx->mod_trx_date ?: $trx->created_at }}
                                                            </td>
                                                            <td>
                                                                <span
                                                                    class="tran-type badge {{ $trx->type == 'credit' ? 'badge-success' : 'badge-danger' }} badge-pill badge-sm">
                                                                    {{ $trx->type }}
                                                                </span>
                                                            </td>
                                                            <td class="align-middle trans-source">{{ $trx->medium }}</td>
                                                            <td
                                                                class="align-middle trans-source badge badge-pill badge-danger">
                                                                {{ $trx->status }}</td>
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
                            @endif
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
