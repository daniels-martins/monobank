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
                            <div class="card bank-card pull-up profile_summary">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9 text-left">
                                                <div class="mb-0 text-white d-flex justify-content-between">
                                                    <i class="la la-hand-paper-o text-success" style="font-size:4rem;"></i>
                                                    <span
                                                        class="h3 mt-2 mr-2 text-white">{{ ucfirst(auth()->user()->name) }}!
                                                        </h1>

                                                </div>
                                                <p class="text-white">
                                                    Account Number: {{ auth()->user()->azas->first()->num ?? 'none' }}
                                                    {{-- {{ auth()->user()->cards->first()->cc_num ?? '' }} --}}
                                                </p>
                                            </div>
                                            <div class="col-3">
                                                {{-- necessary evil --}}
                                                <div class="float-right ">
                                                    <canvas id="euro-chart" class="height-100 d-none"></canvas>
                                                    <img class="rounded-circle"
                                                        src="/admin_assets/app-assets/images/icons/female.png"
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
                                                <h3 class="mb-0">${{ auth()->user()->azaBalSavings() }}</h3>
                                                {{-- <p class="text-light">Available Balance</p> --}}
                                                <h4 class="warning mt-1 text-bold-500">Available Balance</h4>
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
                                                <h3 class="mb-0">${{ auth()->user()->totalCredit() }}</h3>
                                                {{-- <p class="text-light">per Ounce</p> --}}
                                                <h4 class="success mt-1 text-bold-500">Total Credit transactions</h4>
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
                                                <h3 class="mb-0">${{ auth()->user()->totalDebit() }}</h3>
                                                {{-- <p class="text-light">per unit</p> --}}
                                                <h4 class="success mt-1 text-bold-500">Total Debit transactions</h4>
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
                        <div class="col-xl-9 col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card card-shadow">
                                        <div class="card-header card-header-transparent">
                                            <h4 class="card-title">Transaction Reports</h4>
                                            <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group"
                                                role="group">
                                                <li class="nav-item">
                                                    <a class="active nav-link" data-toggle="tab"
                                                        href="#scoreLineToDay">Day</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab"
                                                        href="#scoreLineToWeek">Week</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab"
                                                        href="#scoreLineToMonth">Month</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="widget-content tab-content bg-white p-20">
                                            <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay">
                                            </div>
                                            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek"></div>
                                            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-12">
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
                        <div class="col-xl-5 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Calendar</h4>
                                </div>
                                <div class="card-content">
                                    <div id="bank-calendar" class="overflow-hidden bg-grey bg-lighten-3"></div>
                                </div>
                            </div>
                            <div id="clndr" class="clearfix">
                                <script type="text/template" id="bank-calendar-template">
                                <div class="clndr-controls">
                 <div class="clndr-previous-button">&lt;</div>
                 <div class="clndr-next-button">&gt;</div>
                 <div class="current-month">
                     <%= month %>
                     <%= year %>
                 </div>

             </div>
             <div class="clndr-grid">
                 <div class="days-of-the-week clearfix">
                     <% _.each(daysOfTheWeek, function(day) { %>
                         <div class="header-day">
                             <%= day %>
                         </div>
                     <% }); %>
                 </div>
                 <div class="days">
                     <% _.each(days, function(day) { %>
                         <div class="<%= day.classes %>" id="<%= day.id %>"><span class="day-number"><%= day.day %></span></div>
                     <% }); %>
                 </div>
             </div>
             <div class="event-listing">
                 <div class="event-listing-title">Event this month</div>
                 <% _.each(eventsThisMonth, function(event) { %>
                     <div class="event-item font-small-3">
                         <div class="event-item-day font-small-2">
                             <%= event.date %>
                         </div>
                         <div class="event-item-name text-bold-600">
                             <%= event.title %>
                         </div>
                         <div class="event-item-location">
                             <%= event.location %>
                         </div>
                     </div>
                 <% }); %>
             </div>
          </script>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-12">
                            <div class="card recent-loan">
                                <div class="card-header">
                                    <h4 class="text-center">Recent Transactions</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0"></th>
                                                    <th class="border-top-0">Amount</th>
                                                    <th class="border-top-0">Type</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (auth()->user()->trx()->take(5) as $trx)
                                                    <tr>
                                                        <td>
                                                            <div class="avatar avatar-sm">
                                                                <img class="rounded-circle"
                                                                    src="/admin_assets/app-assets/images/portrait/small/avatar-s-1.png"
                                                                    alt="Avatar" />
                                                            </div>
                                                        </td>
                                                        <td class="text-truncate">
                                                            @if ($trx->type == 'debit')
                                                                <i class="ft-arrow-down-right danger"></i>
                                                            @else
                                                                <i class="ft-arrow-up-right success"></i>
                                                            @endif

                                                            ${{ number_format($trx->amount, 2) }}
                                                            <div class="font-small-2 text-light">
                                                                <i class="font-small-2 ft-map-pin"></i>
                                                                {{ $trx->medium }}
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="text-truncate
                                                        {{ $trx->type == 'credit' ? 'text-success' : 'text-danger' }}">
                                                            {{ ucfirst($trx->type) }}
                                                        </td>
                                                        <td
                                                            class="text-truncate
                                                            mt-1
                                                            @if ($trx->status == 'successful') badge badge-pill badge-success 
                                                @elseif ($trx->status == 'pending') badge badge-pill  badge-warning
                                                @else badge badge-pill badge-danger @endif ">
                                                            {{ $trx->status }}</td>
                                                        <td class="text-truncate">{{ Carbon::make($trx->created_at) }}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            {{-- when I'm ready to deal with loan applications --}}

                            {{-- <div class="card recent-loan">
                           <div class="card-header">
                               <h4 class="text-center">Loan Applications</h4>
                           </div>
                           <div class="card-content">
                               <div class="table-responsive">
                                   <table class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th class="border-top-0"></th>
                                               <th class="border-top-0">Loan Amount</th>
                                               <th class="border-top-0">Date</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                               <td>
                                                   <div class="avatar avatar-sm">
                                                       <img class="rounded-circle"
                                                           src="/admin_assets/app-assets/images/portrait/small/avatar-s-4.png"
                                                           alt="Avatar" />
                                                   </div>
                                               </td>
                                               <td class="text-truncate">
                                                   <i class="ft-arrow-down-left success"></i> $20000
                                                   <div class="font-small-2 text-light"><i
                                                           class="font-small-2 ft-map-pin"></i> S.G.road,UK</div>
                                               </td>
                                               <td class="text-truncate">4:59p.m</td>
                                           </tr>
                                           <tr>
                                               <td>
                                                   <div class="avatar avatar-sm">
                                                       <img class="rounded-circle"
                                                           src="/admin_assets/app-assets/images/portrait/small/avatar-s-1.png"
                                                           alt="Avatar" />
                                                   </div>
                                               </td>
                                               <td class="text-truncate">
                                                   <i class="ft-arrow-up-right danger"></i> $500
                                                   <div class="font-small-2 text-light"><i
                                                           class="font-small-2 ft-map-pin"></i> P.stone,UK</div>
                                               </td>
                                               <td class="text-truncate">2:01p.m</td>
                                           </tr>
                                           <tr>
                                               <td>
                                                   <div class="avatar avatar-sm">
                                                       <img class="rounded-circle"
                                                           src="/admin_assets/app-assets/images/portrait/small/avatar-s-10.png"
                                                           alt="Avatar" />
                                                   </div>
                                               </td>
                                               <td class="text-truncate">
                                                   <i class="ft-arrow-down-left success"></i> $10000
                                                   <div class="font-small-2 text-light">
                                                       <i class="font-small-2 ft-map-pin"></i> Grod Street,UK
                                                   </div>
                                               </td>
                                               <td class="text-truncate">12:50p.m</td>
                                           </tr>
                                           <tr>
                                               <td>
                                                   <div class="avatar avatar-sm">
                                                       <img class="rounded-circle"
                                                           src="/admin_assets/app-assets/images/portrait/small/avatar-s-9.png"
                                                           alt="Avatar" />
                                                   </div>
                                               </td>
                                               <td class="text-truncate">
                                                   <i class="ft-arrow-up-right danger"></i> $2000
                                                   <div class="font-small-2 text-light"><i
                                                           class="font-small-2 ft-map-pin"></i> Malbourn,UK</div>
                                               </td>
                                               <td class="text-truncate">9:45a.m</td>
                                           </tr>
                                           <tr>
                                               <td>
                                                   <div class="avatar avatar-sm">
                                                       <img class="rounded-circle"
                                                           src="/admin_assets/app-assets/images/portrait/small/avatar-s-12.png"
                                                           alt="Avatar" />
                                                   </div>
                                               </td>
                                               <td class="text-truncate">
                                                   <i class="ft-arrow-up-right danger"></i> $1000
                                                   <div class="font-small-2 text-light">
                                                       <i class="font-small-2 ft-map-pin"></i> Scott Lane,UK
                                                   </div>
                                               </td>
                                               <td class="text-truncate">8:22a.m</td>
                                           </tr>
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div> --}}
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
