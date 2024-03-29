@include('admin.partials.head')
<!-- END: Head-->

<!-- BEGIN: Body-->
<style>
    .text-sm {
        font-size: 1.1em !important;
    }

    .ml-_1 {
        margin-left: -1.2em;
    }

    .ml-_3 {
        margin-left: -3.3em;
    }
</style>

<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu"
    data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('admin.partials.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('admin.partials.main_menu')

    <!-- END: Main Menu-->

    {{-- Session Data goes before the main content --}}
    @if (Session::has('success') ||
            Session::has('warning') ||
            Session::has('danger') ||
            Session::has('error') ||
            Session::has('info') ||
            Session::has('primary'))
        <div class="alert-container">
            @php
                $alertType = (string) getSessionKeyForAlert();
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

    <script>
        (function() {
            // avoid multiple form submissions
            // deposit form 
            $('#deposit_form').on('submit', function() {
                $('#deposit_form_submit').attr('disabled', 'true')
            });

            document.forms.createpayment.addEventListener('submit', e => {
                e.target.action = '#';
            });


            // $('#payment_create_form').on('submit', function(elem) {
            //     alert(elem.getAttribute('id'))
            //     console.log(elem)
            //     $('#deposit_form_submit').attr('disabled', 'true')
            // });



        })();
    </script>
</body>
<!-- END: Body-->

</html>
