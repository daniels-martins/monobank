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
        <h3 class="content-header-title">All Accounts</h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">Accounts</a>
              </li>
              <li class="breadcrumb-item active">All Accounts
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
      <!-- Base style table -->
      <section id="base-style">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title float-left">
                  Accounts Summary
                </h4>
                <div class="float-right">
                  <a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right white"
                    href="{{ route('accounts.create') }}">
                    <i class="ft-plus white"></i>Add New Account
                  </a>
                </div>
              </div>
              <div class="card-body mt-1">
                <div class="table-responsive">
                  <table id="active-accounts" class="table alt-pagination table-wrapper">
                    <thead>
                      <tr>
                        <th class="border-top-0"></th>
                        <th class="border-top-0">Type</th>
                        <th class="border-top-0">A/c Number</th>
                        <th class="border-top-0">Holder Name</th>
                        <th class="border-top-0">Status</th>
                        <th class="border-top-0">Balance</th>
                        <th class="border-top-0">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach (auth()->user()->azas as $account)
                      <tr>
                        <td class="align-middle">
                          <div class="ac-symbol 
                            {{ $account->getType() == 'savings' 
                                ? substr($account->getType(),0,-1) 
                                : $account->getType()
                            }} ">
                            @switch($account->getType())
                            @case('savings')
                            <i class="la la-suitcase"></i>
                            @break
                            
                            @case('loan')
                            <i class="la la-money"></i>
                            @break

                            @case('current')
                            @case('checking')
                            <i class="la la-street-view"></i>
                            @break

                            @case('joint')
                            <i class="la la-users"></i>
                            @break
                            @endswitch
                          </div>
                        </td>
                        <td class="align-middle">
                          <div class="ac-type">
                            {{ ucfirst($account->getType()) }}
                          </div>
                        </td>
                        <td class="align-middle">
                          <div class="ac-number">
                            {{ $account->num }}
                          </div>
                        </td>
                        <td class="align-middle">
                          <div class="ac-hol-name">
                            {{ $account->getOwner() }}
                          </div>
                        </td>
                        <td class="align-middle">
                          <div class="ac-status badge 
                            @if ($account->status) badge-success @else badge-danger @endif 
                            badge-pill badge-sm">
                            @if ($account->status) Active @else Inactive @endif
                          </div>
                        </td>
                        <td class="align-middle">
                          <div class="ac-balance">
                            <span>$</span> {{ $account->balance > 0 ? $account->balance : '0.00' }}
                          </div>
                        </td>

                        <td class="d-flex">
                          <div>
                            <a title="Edit" href="{{ route('accounts.edit', $account->id) }}">
                              <i class="la la-pencil-square success"></i>
                            </a>
                          </div>

                          <form class="action" method="post" action="{{ route('accounts.destroy', $account->id ) }}">
                            @csrf @method('delete')
                            <button class="border-0 bg-transparent" title="Delete" type="submit"><i
                                class="la la-trash danger"></i></button>
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