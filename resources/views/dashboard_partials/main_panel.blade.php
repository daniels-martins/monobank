<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="overview"
                                    role="tab" aria-controls="overview" aria-selected="true">Account Overview</a>
                            </li>
                        </ul>
                        <div></div>
                    </div>
                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview">
                            <div class="row">
                                <div class="col-sm-4">
                                    @include('dashboard_partials.summary')
                                </div>

                                <div class="col-lg-8 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-11 grid-margin ">
                                            @include('dashboard_partials.recent_trx_all')
                                            @include('dashboard_partials.i_want_to_do_sth')

                                        </div>
                                    </div>
                                </div>

                                <!-- go here -->
                                {{-- <div class="row flex-grow">
                                    <div class="col-lg-8 d-flex flex-column">
                                        @include('dashboard_partials.recent_trx_savings')
                                    </div>
                                    <div class="col-12 col-sm-4  grid-margin stretch-card">
                                        @include('dashboard_partials.trx_overview_savings')
                                    </div>
                                    <!-- place holder for recent events -->
                                </div> --}}

                                {{-- <div class="row flex-grow">
                                    <div class="col-lg-8 d-flex flex-column">
                                        @include('dashboard_partials.recent_trx_checking')
                                    </div>
                                    <div class="col-12 col-sm-4  grid-margin stretch-card">
                                        @include('dashboard_partials.trx_overview_checking')
                                    </div>
                                    <!-- place holder for recent events -->
                                </div> --}}


                                {{-- <div class="row flex-grow">
                                    <div class="col-lg-8 d-flex flex-column">
                                        @include('dashboard_partials.recent_trx_loan')
                                    </div>
                                    <div class="col-12 col-sm-4  grid-margin stretch-card">
                                        @include('dashboard_partials.trx_overview_loan')
                                    </div>
                                    <!-- place holder for recent events -->
                                </div> --}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                Bluebird Global Expres &trade;</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All
                rights reserved Bluebird.</span>
        </div>
    </footer>
    <!-- partial -->
</div>
