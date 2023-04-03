<?php
use Illuminate\Support\Carbon;
?>

{{-- {{
dd(auth()->user()->azas()->first())

}} --}}

@extends('admin.layouts.app')
@section('title', 'Home')
@section('page_css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
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
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/pages/dashboard-bank.min.css">
    <link rel="stylesheet" type="text/css" href="/admin_assets/app-assets/css/plugins/calendars/clndr.min.css">
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
            </div>
            <div class="content-body">
                <!-- Bank Stats -->
                <section id="bank-cards" class="bank-cards">
                    <div class="row match-height">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card bank-card pull-up ">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9 text-left">
                                              <span> Logged In: {{ Carbon::now()->dayName .' , ' . Carbon::now()->toFormattedDateString()?? 'N/A' }} </span><br>
                                                <div class="mb-0  d-flex justify-content-between">
                                                   
                                                   <span class="h4 my-1 mr-2 text-primary">
                                                        <b> Welcome, {{ ucfirst(auth()->user()->name) }}.</b>
                                                    </span>
                                                </div>
                                                <p class="h6">
                                                    Account Number: <b> {{ auth()->user()->azas->first()->num ?? 'N/A' }} </b><br>
                                                    Status: {{ ucfirst(auth()->user()->azas->first()->status) ?? 'N/A' }}
                                                    <br>
                                                    {{-- {{ auth()->user()->cards->first()->cc_num ?? '' }}
                                                </p>
                                            </div>
                                            <div class="col-3">
                                                {{-- necessary evil --}}
                                                {{-- <div class="float-right ">
                                                    <canvas id="euro-chart" class="height-100 d-none"></canvas>
                                                    <img class="rounded-circle"
                                                        src="/admin_assets/app-assets/images/icons/female.png"
                                                        alt="user_icon" width="75">

                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card bank-card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9 text-left">
                                                <h3 class="mb-0"><span class="text-primary">USD $</span><span
                                                        class="text-primary">{{ auth()->user()->azaBalSavings() }}</b>
                                                        </h2>
                                                        {{-- <p class="text-light">Available Balance</p> --}}
                                                        <h4 class="mt-1 text-bold-500">Available Balance</h4>
                                            </div>
                                            <div class="col-3">
                                                <div class="float-right">
                                                    <canvas id="gold-chart" class="height-75 d-none"></canvas>
                                                    <img class="rounded-circle"
                                                        src="/admin_assets/app-assets/images/icons/credit.png"
                                                        alt="user_icon" width="75">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card bank-card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9 text-left">
                                                <h3 class="mb-0"><span class="text-primary">USD $</span><span
                                                        class="text-primary">{{ auth()->user()->totalCredit() }}</b>
                                                        </h2>

                                                        {{-- <p class="text-light">per Ounce</p> --}}
                                                        <h4 class="mt-1 text-bold-500">Total Credit transactions</h4>
                                            </div>
                                            <div class="col-3">
                                                <div class="float-right">
                                                    <canvas id="silver-chart" class="height-75 d-none"></canvas>
                                                    <img class="rounded-circle"
                                                        src="/admin_assets/app-assets/images/icons/credit2.png"
                                                        alt="user_icon" width="75">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="card bank-card pull-up">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8 text-left">
                                                <h3 class="mb-0"><span class="text-primary">USD $</span><span
                                                        class="text-primary">{{ auth()->user()->totalDebit() }}</b>
                                                        </h2>

                                                        {{-- <p class="text-light">per unit</p> --}}
                                                        <h4 class="mt-1 text-bold-500">Total Debit transactions</h4>
                                            </div>
                                            <div class="col-4">
                                                <div class="float-right">
                                                    <canvas id="bitcoin-chart" class="height-75 d-none"></canvas>
                                                    <img class="rounded-circle"
                                                        src="/admin_assets/app-assets/images/icons/debit2.png"
                                                        alt="user_icon" width="75">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @include('admin.partials.graph')
                        <div class="card recent-loan col-xl-6">
                            <div class="card-header">
                                <h4 class="text-center">Recent Transactions</h4>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                {{-- <th class="border-top-0"></th> --}}
                                                <th class="border-top-0">Amount</th>
                                                {{-- <th class="border-top-0">Type</th> --}}
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (auth()->user()->trx()->take(5) as $trx)
                                                <tr>
                                                    <td class="text-truncate">
                                                        @unless ($trx->receiver_id == auth()->user()->id)
                                                            <i class="ft-arrow-down-right danger"></i>
                                                        @else
                                                            <i class="ft-arrow-up-right success"></i>
                                                        @endunless
                                                        <SPAN class="{{ ($trx->receiver_id == auth()->user()->id) ? 'success' : '' }}">
                                                            {{ ($trx->receiver_id == auth()->user()->id)  ? '+' : '-' }}
                                                            ${{ number_format($trx->amount, 2) }}
                                                        </SPAN>
                                                        <div class="font-small-2 text-light">
                                                            <i class="font-small-2 ft-map-pin"></i>
                                                            {{ $trx->medium }}
                                                        </div>
                                                    </td>
                                                    
                                                    <td
                                                        class="text-truncate
                                                       mt-1
                                                       @if ($trx->status == 'successful') success 
                                           @elseif ($trx->status == 'pending') warning
                                           @else danger @endif ">
                                                        {{ $trx->status }}</td>
                                                    <td class="text-truncate">
                                                        {{ Carbon::make($trx->mod_trx_date ?: $trx->created_at) }}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 col-md-12">
                            <div class="chart-stats text-center my-3">
                                <div class="card bg-gradient-directional-primary">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-white text-left">
                                                    <h3 class="text-white">
                                                        ${{ number_format(auth()->user()->totalCredit('today')) }}</h3>
                                                    <span>Credit Transactions Today</span>
                                                </div>
                                                <div class="percentage">
                                                    {{-- <span>63%</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-gradient-directional-warning">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-white text-left">
                                                    <h3 class="text-white">
                                                        ${{ number_format(auth()->user()->totalDebit('today')) }}</h3>
                                                    <span>Debit Transactions Today</span>
                                                </div>
                                                <div class="percentage">
                                                    {{-- <span>54%</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card bg-gradient-directional-cyan">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="media d-flex">
                                                <div class="media-body text-white text-left">
                                                    <h3 class="text-white">
                                                        {{ '$' .number_format(auth()->user()->totalTrx('today')) }}</h3>
                                                    <span>Total Transactions Today</span>
                                                </div>
                                                <div class="percentage">
                                                    {{-- <span>71%</span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row match-height">
                        <div class="col-xl-7 col-lg-6 col-md-12">
                        </div>
                    </div>
                    {{-- @include('admin.partials.cards.create_comp') --}}
                </section>

            </div>
        </div>
    </div>

@endsection

@section('page_js')
    <!-- BEGIN: Vendor JS-->
    <script src="/admin_assets/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/admin_assets/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/charts/chart.min.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/charts/chartist.min.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/forms/extended/card/jquery.card.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/extensions/underscore-min.js"></script>
    <script src="/admin_assets/app-assets/vendors/js/extensions/clndr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/admin_assets/app-assets/js/core/app-menu.min.js"></script>
    <script src="/admin_assets/app-assets/js/core/app.min.js"></script>
    <script src="/admin_assets/app-assets/js/scripts/customizer.min.js"></script>
    <script src="/admin_assets/app-assets/js/scripts/footer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/admin_assets/app-assets/js/scripts/ui/breadcrumbs-with-stats.min.js"></script>
    <script src="/admin_assets/app-assets/js/scripts/pages/dashboard-bank.min.js"></script>
    <!-- END: Page JS-->
@endsection
