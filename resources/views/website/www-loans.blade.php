@include('admin.partials.www.header')
<section class="container_nav page-top-section set-bg" data-setbg="/static_assets/website/img/loans/1.jpg">
    <div class="container">
        <h2>Loans</h2>
        <nav class="site-breadcrumb">
            <a class="sb-item" href="/">Home</a>
            <span class="sb-item active">Loans</span>
        </nav>
    </div>
</section>

<section class="loans-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="/static_assets/website/img/loans.jpg" alt="" />
            </div>
            <div class="col-lg-6">
                <div class="loans-text">
                    <h2>Our Personal Loan is now available online</h2>
                    <p>
                        Our personal loans are designed to help you achieve your financial goals and provide you with
                        the flexibility and support you need to manage your finances. Here are some of the benefits of
                        our personal loans:
                    </p>
                    <ul>
                        <li>Flexible repayment terms: We offer a range of repayment terms, so you can choose the one
                            that best fits your budget and financial situation. This means you can pay off your loan at
                            a pace that's comfortable for you.</li>
                        <li>Competitive interest rates: Our personal loans come with competitive interest rates, which
                            means you can save money on interest charges over the life of your loan.</li>
                        <li>No collateral required: Unlike some other types of loans, our personal loans do not require
                            collateral. This means you don't have to put up any assets as security for your loan.</li>
                    </ul>
                    <a href="#loan-application-form" class="site-btn">apply right now!</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="loans-calculator-section spad">
    <div class="container">
        <div class="text-center text-white mb-5 pb-3" id="loan-application-form">
            <h2>How much do you want to borrow?</h2>
        </div>
        <div class="loans-calculator">
            <div id="lc-dec" class="lc-control-btn">-</div>
            <div id="lc-inc" class="lc-control-btn ici">+</div>
            <div class="slider-input-warp">
                <div id="slider-range-max" class="slider">
                    <div class="ui-slider-handle">
                        <span id="loan-value">$100</span>
                    </div>
                </div>
            </div>
            <div class="calculator-scale">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="lone-values">
                <div class="lone-value">$1000</div>
                <div class="lone-value lv-step">$15.000</div>
            </div>
            <div class="ls-result">
                Weekly payments: <span id="lone-emi">$19</span>
            </div>
            <div class="text-center">
                <a href="{{ route('sweet_alert1') }}" class="site-btn mr-0 mr-sm-2 mt-4">apply right now!</a>
                <!-- <a href="loans.html#" class="site-btn sb-dark mt-4">see other loans</a> -->
            </div>
        </div>
    </div>
</section>

<section class="services-section">
    <div class="container">
        <div class="text-center mb-5 pb-3">
            <h2>What loan may suit you</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="service-item">
                    <img src="/static_assets/website/img/loans/1.jpg" alt="" />
                    <h4>Wedding Loan</h4>
                    <p>
                        At Blue bird, we know that your wedding is a special event that needs to be celebrated in the best way possible. Hence, o  ur wedding loan is designed to provide you with the funds you need to make your special day
                        unforgettable. With flexible repayment terms and competitive interest rates, our wedding loan
                        can help you manage the expenses associated with planning a wedding, from venue rentals to
                        catering to the dress of your dreams.
                    </p>
                    {{-- <a href="loans.html#" class="readmore">Apply for a loan now <img
                            src="/static_assets/website/img/arrow.png" alt="" /></a> --}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item">
                    <img src="/static_assets/website/img/loans/2.jpg" alt="" />
                    <h4>Home Loan</h4>
                    <p>
                        If you're in the market for a new home, our home loan options may be just what you need to make
                        your dream a reality.

                        Our home loans offer competitive interest rates and flexible repayment terms, making it easy to
                        find a loan that fits your budget and financial goals. With our expert guidance and support, you
                        can find the home loan that's right for you and start making memories in your new home.
                    </p>
                    {{-- <a href="loans.html#" class="readmore">Apply for a loan now <img
                            src="/static_assets/website/img/arrow.png" alt="" /></a> --}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item">
                    <img src="/static_assets/website/img/loans/1.jpg" alt="" />
                    <h4>Holliday Loan</h4>
                    <p>
                        If you're dreaming of a much-needed getaway but need help financing it, our holiday loan can
                        make it happen.

                        Our holiday loan is designed to provide you with the funds you need to take the vacation you
                        deserve. With flexible repayment terms and competitive interest rates, our holiday loan can help
                        you manage the expenses associated with planning a holiday, from airfare to hotel accommodations
                        to activities and excursion.
                    </p>
                    {{-- <a href="loans.html#" class="readmore">Apply for a loan now <img
                            src="/static_assets/website/img/arrow.png" alt="" /></a> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- calculate credit score placeholder -->
@include('admin.partials.www.footer')
