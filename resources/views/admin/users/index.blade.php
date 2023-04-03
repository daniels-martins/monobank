@extends('admin.layouts.app')
@section('title', 'users')
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
                    <h3 class="content-header-title">View All Users</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('payments.index') }}">View All Users</a>
                                </li>
                                <li class="breadcrumb-item active">View All Users
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="payments-details">
                    <div class="row">
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
                                                                    <option value="Deactivated">
                                                                        Cheque
                                                                    </option>
                                                                    <option value="Delayed">
                                                                        Local transfer
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
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">
                                        Pending Transactions
                                    </h4>
                                    <div class="float-right">
                                        <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right white"
                                            href="bank-add-payment.html">
                                            <i class="ft-plus white"></i>Add New Payment
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body mt-1 table-wrapper">
                                    <div class="table-responsive">
                                        <table class="table alt-pagination pending-payment">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Account No.</th>
                                                    <th class="border-top-0">Amount (USD)</th>
                                                    <th class="border-top-0">Date</th>
                                                    <th class="border-top-0">Type</th>
                                                    <th class="border-top-0">Transaction</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle ac-no">2043********951</td>
                                                    <td class="align-middle amount">$200.00</td>
                                                    <td class="align-middle trans-date">03/12/2018</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-success badge-pill badge-sm">Deposit</span>
                                                    </td>
                                                    <td class="align-middle trans-source">local_transfer</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-no">1257********589</td>
                                                    <td class="align-middle amount">$680.00</td>
                                                    <td class="align-middle trans-date">13/04/2019</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-success badge-pill badge-sm">Deposit</span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cash</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-no">4390********233</td>
                                                    <td class="align-middle amount">$4,5670.00</td>
                                                    <td class="align-middle trans-date">12/02/2019</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-danger badge-pill badge-sm">Withdraw</span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cheque</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-no">9874********124</td>
                                                    <td class="align-middle amount">$700.00</td>
                                                    <td class="align-middle trans-date">30/01/2020</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-danger badge-pill badge-sm">Withdraw</span>
                                                    </td>
                                                    <td class="align-middle trans-source">local_transfer</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-no">2313********235</td>
                                                    <td class="align-middle amount">$400.00</td>
                                                    <td class="align-middle trans-date">18/08/2019</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-success badge-pill badge-sm">Deposit</span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cash</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-no">1245********563</td>
                                                    <td class="align-middle amount">$2,560.00</td>
                                                    <td class="align-middle trans-date">10/11/2022</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-danger badge-pill badge-sm">Withdraw</span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cash</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-no">2312********235</td>
                                                    <td class="align-middle amount">$690.00</td>
                                                    <td class="align-middle trans-date">26/06/2018</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-success badge-pill badge-sm">Deposit</span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cheque</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-no">1235********457</td>
                                                    <td class="align-middle amount">$200.00</td>
                                                    <td class="align-middle trans-date">04/04/2024</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-success badge-pill badge-sm">Deposit</span>
                                                    </td>
                                                    <td class="align-middle trans-source">local_transfer</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-no">1235********423</td>
                                                    <td class="align-middle amount">$350.00</td>
                                                    <td class="align-middle trans-date">15/02/2019</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-danger badge-pill badge-sm">Withdraw</span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cash</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-no">1247********231</td>
                                                    <td class="align-middle amount">$100.00</td>
                                                    <td class="align-middle trans-date">07/04/2020</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-success badge-pill badge-sm">Deposit</span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cheque</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-no">2312********346</td>
                                                    <td class="align-middle amount">$230.00</td>
                                                    <td class="align-middle trans-date">03/12/2018</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-success badge-pill badge-sm">Deposit</span>
                                                    </td>
                                                    <td class="align-middle trans-source">local_transfer</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">
                                        Completed Transactions
                                    </h4>
                                    <div class="float-right">
                                        <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right white"
                                            href="bank-add-payment.html">
                                            <i class="ft-plus white"></i>Add New Payment
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body mt-1 table-wrapper">
                                    <div class="table-responsive">
                                        <table class="table alt-pagination completed-payment">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">From Account</th>
                                                    <th class="border-top-0">To Account</th>
                                                    <th class="border-top-0">Amount (USD)</th>
                                                    <th class="border-top-0">Date</th>
                                                    <th class="border-top-0">Transaction Type</th>
                                                    <th class="border-top-0">Transaction Source</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle ac-from">3023********124</td>
                                                    <td class="align-middle ac-to">2043********951</td>
                                                    <td class="align-middle amount">$200.00</td>
                                                    <td class="align-middle trans-date">12/03/2018</td>
                                                    <td>
                                                        <span
                                                            class="tran-type badge badge-success badge-pill badge-sm">Deposit</span>
                                                    </td>
                                                    <td class="align-middle trans-source">local_transfer</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-from">5421********234</td>
                                                    <td class="align-middle ac-to">1257********589</td>
                                                    <td class="align-middle amount">$680.00</td>
                                                    <td class="align-middle trans-date">04/13/2019</td>
                                                    <td>
                                                        <span class="tran-type badge badge-success badge-pill badge-sm">
                                                            Deposit
                                                        </span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cash</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-from">5312********987</td>
                                                    <td class="align-middle ac-to">4390********233</td>
                                                    <td class="align-middle amount">4,5670.00</td>
                                                    <td class="align-middle trans-date">02/12/2019</td>
                                                    <td>
                                                        <span class="tran-type badge badge-danger badge-pill badge-sm">
                                                            Withdraw
                                                        </span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cheque</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-from">3413********956</td>
                                                    <td class="align-middle ac-to">3212********421</td>
                                                    <td class="align-middle amount">$700.00</td>
                                                    <td class="align-middle trans-date">01/30/2020</td>
                                                    <td>
                                                        <span class="tran-type badge badge-danger badge-pill badge-sm">
                                                            Withdraw
                                                        </span>
                                                    </td>
                                                    <td class="align-middle trans-source">local_transfer</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-from">1234********922</td>
                                                    <td class="align-middle ac-to">2313********235</td>
                                                    <td class="align-middle amount">$400.00</td>
                                                    <td class="align-middle trans-date">08/08/2019</td>
                                                    <td>
                                                        <span class="tran-type badge badge-success badge-pill badge-sm">
                                                            Deposit
                                                        </span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cash</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-from">5417********951</td>
                                                    <td class="align-middle ac-to">1631********563</td>
                                                    <td class="align-middle amount">2,560.00</td>
                                                    <td class="align-middle trans-date">10/11/2022</td>
                                                    <td>
                                                        <span class="tran-type badge badge-danger badge-pill badge-sm">
                                                            Withdraw
                                                        </span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cash</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-from">2155********236</td>
                                                    <td class="align-middle ac-to">1264********547</td>
                                                    <td class="align-middle amount">$690.00</td>
                                                    <td class="align-middle trans-date">08/16/2018</td>
                                                    <td>
                                                        <span class="tran-type badge badge-success badge-pill badge-sm">
                                                            Deposit
                                                        </span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cheque</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-from">6403********125</td>
                                                    <td class="align-middle ac-to">1235********457</td>
                                                    <td class="align-middle amount">$200.00</td>
                                                    <td class="align-middle trans-date">04/04/2024</td>
                                                    <td>
                                                        <span class="tran-type badge badge-success badge-pill badge-sm">
                                                            Deposit
                                                        </span>
                                                    </td>
                                                    <td class="align-middle trans-source">local_transfer</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle ac-from">1253********124</td>
                                                    <td class="align-middle ac-to">1235********423</td>
                                                    <td class="align-middle amount">$350.00</td>
                                                    <td class="align-middle trans-date">02/15/2019</td>
                                                    <td>
                                                        <span class="tran-type badge badge-danger badge-pill badge-sm">
                                                            Withdraw
                                                        </span>
                                                    </td>
                                                    <td class="align-middle trans-source">Cash</td>
                                                    <td class="align-middle action">
                                                        <a href="bank-add-payment.html"><i
                                                                class="la la-pencil-square success"></i></a>
                                                        <a href="#"><i class="la la-trash danger"></i></a>
                                                    </td>
                                                </tr>
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
