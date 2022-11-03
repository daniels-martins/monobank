@include('admin.partials.head')
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu"
    data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('admin.partials.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('admin.partials.main_menu')

    <!-- END: Main Menu-->

    {{-- Session Data goes before the main content --}}
    @if(Session::has('success')||Session::has('warning') ||Session::has('danger')
    ||Session::has('error')||Session::has('info')||Session::has('primary'))
    <div class="alert-container">
        @php
        $alertType = (String) getSessionKeyForAlert();
        @endphp
        <div class="floating-alert alert toast-alert-{{ $alertType }} alert-dismissible fade show" role="alert">
            <strong>{{ Session("$alertType") }}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    {{-- important for layout --}}
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('admin.partials.footer')
    <!-- END: Footer-->

    @yield('page_js')
</body>
<!-- END: Body-->

</html>