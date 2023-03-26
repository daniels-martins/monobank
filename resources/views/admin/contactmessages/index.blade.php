@extends('admin.layouts.app')
@section('title', 'Accounts')
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
    {{--
<link rel="stylesheet" type="text/css" href="/admin_assets/assets/css/"> --}}
@endsection


@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">All Contact Messages</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Accounts</a>
                                </li>
                                <li class="breadcrumb-item active">All Messages
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
                <!-- Base style table -->
                <section id="base-style">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title float-left">
                                        All Contact Messages
                                    </h4>
                                    <div class="float-right">
                                        {{-- <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right white"
                    href="{{ route('accounts.create') }}">
                    <i class="ft-plus white"></i>Add New Account
                  </a> --}}
                                    </div>
                                </div>
                                <div class="card-body mt-1">
                                    <div class="table-responsive">
                                        <table id="active-accounts" class="table alt-pagination table-wrapper">
                                            <thead>
                                                <tr>
                                                    {{-- <th class="border-top-0"></th> --}}
                                                    <th class="border-top-0">Sender Name</th>
                                                    <th class="border-top-0">Sender Email</th>
                                                    <th class="border-top-0">Sender Phone</th>
                                                    <th class="border-top-0" colspan="2">Sender Message</th>
                                                    {{-- <th class="border-top-0"></th> --}}
                                                    <th class="border-top-0 text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($contactMessages as $message)
                                                    <tr>
                                                        {{-- sender name --}}
                                                        <td class="align-middle">
                                                            <div class="ac-number">
                                                                {{ $message->name }}
                                                            </div>
                                                        </td>
                                                        {{-- sender email --}}
                                                        <td class="align-middle">
                                                            <div class="ac-number">
                                                                {{ $message->email }}
                                                            </div>
                                                        </td>

                                                        {{-- sender phone --}}
                                                        <td class="align-middle">
                                                            <div class="ac-number">
                                                                {{ $message->phone }}
                                                            </div>
                                                        </td>
                                                        {{-- sender message --}}
                                                        <td class="align-middle">
                                                            <div class="ac-number">
                                                                {{ $message->message }}
                                                            </div>
                                                        </td>
                                                        {{-- for the span2 cols  --}}
                                                        <td></td>
                                                       <td class="text-right">
                                                         <form class="" method="post"
                                                         action="{{ route('contactmessages.destroy', $message->id) }}">@csrf
                                                         @method('delete')
                                                         <button class="border-0 bg-transparent" title="Delete"
                                                             type="submit"><i class="la la-trash danger"></i></button>
                                                     </form>
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
    <script src="/admin_assets/app-assets/js/scripts/pages/bank-accounts.min.js"></script>
    <!-- END: Page JS-->

@endsection
