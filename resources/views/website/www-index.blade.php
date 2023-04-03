@include('admin.partials.www.header')
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hs-text">
                    <h2>Looking for a same day loan?</h2>
                    <p>
                        If you're looking for a same day loan, you've come to the right place. At our bank, we
                        understand that unexpected expenses can arise at any time, and sometimes you need quick access
                        to cash to cover them.
                    </p>
                    {{-- <a href="index.html#" class="site-btn sb-dark">Find out more</a> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <form class="hero-form" method="post" action="{{ route('contactmessages.store') }}">@csrf
                    <input type="text" placeholder="Your Full Name" name="fullname" required />
                    <input type="email" placeholder="Your E-mail"name="email" required />
                    <input type="text" placeholder="Your Phone" name="phone" required />
                    <input type="text" placeholder="Subject" name="subject" required />
                    <textarea type="text" placeholder="Why do you want this loan" rows="5" cols="50" name="message" required></textarea>
                    <p>

                    </p>
                    <button class="site-btn">Apply for a loan now!</button>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    @endif

                </form>
            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="/static_assets/website/img/loans/1.jpg"></div>
        <div class="hs-item set-bg" data-setbg="/static_assets/website/img/loans/2.jpg"></div>
        <div class="hs-item set-bg" data-setbg="/static_assets/website/img/news/2.jpg"></div>
    </div>
</section>

<section class="why-section spad">
    <div class="container">
        <div class="text-center mb-5 pb-4">
            <h2>Why Choose us?</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="icon-box-item">
                    <div class="ib-icon">
                        <i class="flaticon-012-24-hours"></i>
                    </div>
                    <div class="ib-text">
                        <h5> Access to funding!</h5>
                        <p>

                            Our loan institution can provide individuals and businesses with the necessary funds to
                            finance various projects or endeavors. This can be especially beneficial for those who don't
                            have access to traditional bank loans or other sources of funding.

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="icon-box-item">
                    <div class="ib-icon">
                        <i class="flaticon-036-customer-service"></i>
                    </div>
                    <div class="ib-text">
                        <h5> Competitive interest rates</h5>
                        <p>
                            Bluebird typically offer competitive interest rates compared to other types of lenders, such
                            as credit cards or payday lenders. This can make it easier and more affordable for borrowers
                            to repay their loans over time.

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="icon-box-item">
                    <div class="ib-icon">
                        <i class="flaticon-039-info"></i>
                    </div>
                    <div class="ib-text">
                        <h5>Flexible repayment terms</h5>
                        <p>
                            We offer a variety of repayment terms to suit the needs of different borrowers. This can
                            include longer or shorter repayment periods, fixed or variable interest rates, and various
                            payment schedules. This flexibility can help borrowers choose a loan that fits their unique
                            financial situation and goals.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-3">
            <a href="{{ route('bank-loan') }}" class="site-btn sb-big">Apply Now!</a>
        </div>
    </div>
</section>

<section class="cta-section set-bg" data-setbg="img/cta-bg.jpg">
    <div class="container">
        <h2>Already have a <strong>Bluebird</strong> Bank Loan?</h2>
        <h5>If you're thinking about borrowing more, we're here to help.</h5>
        <a href="{{ route('bank-loan') }}" class="site-btn sb-dark sb-big">Find out More</a>
    </div>
</section>

<section class="feature-section spad">
    <div class="container">
        <div class="feature-item">
            <div class="row">
                <div class="col-lg-6">
                    <img src="/static_assets/website/img/feature-1.jpg" alt="" />
                </div>
                <div class="col-lg-6">
                    <div class="feature-text">
                        <h2>Get a personal loan from just 8.5% APR</h2>
                        <p>
                            Looking for a low-interest personal loan? You're in luck! With our latest offer, you can get
                            a personal loan starting from just 8.5% APR. Whether you need to consolidate debt, cover
                            unexpected expenses, or fund a major purchase, our affordable loan options can help make it
                            happen. Don't wait – apply now and get the funds you need with a payment plan that fits your
                            budget.
                        </p>
                        {{-- <a href="{{ route('bank-loan') }}" class="readmore">Apply for a loan now <img
                                src="/static_assets/website/img/arrow.png" alt="" /></a> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-item">
            <div class="row">
                <div class="col-lg-6 order-lg-2">
                    <img src="/static_assets/website/img/feature-2.jpg" alt="" />
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="feature-text">
                        <h2>Get aproved in minutes after you apply online</h2>
                        <p>
                            Say goodbye to the long wait times and paperwork hassles of traditional loan applications!
                            With our online loan application process, you can get approved for a loan in just minutes.
                            Our quick and easy online process makes it convenient for you to get the funds you need when
                            you need them. Apply today and get approved in minutes!
                        </p>
                        {{-- <a href="{{ route('bank-loan') }}" class="readmore">Apply for a loan now <img
                                src="/static_assets/website/img/arrow.png" alt="" /></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="help-section spad">
    <div class="container">
        <div class="text-center text-white mb-5 pb-4">
            <h2>How a personal loan can help</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tem por incididunt ut labore et dolore mag na aliqua.
                    Class aptent taciti sociosqu ad litora torquent per conubia
                    nostra, per inceptos himenaeos. Suspendisse potenti. Ut gravida
                    mattis magna, non varius lorem sodales nec.
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    Sit amet, consectetur adipiscing elit, sed do eiusmod tem por
                    incididunt ut labore et dolore mag na aliqua. Class aptent taciti
                    sociosqu ad litora torquent per conubia nostra, per inceptos
                    himenaeos. Suspendisse potenti. Ut gravida mattis magna, non
                    varius lorem sodales nec. In libero orci, ornare non nisl.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <ul class="help-list">
                    <li>Buying a car</li>
                    <li>Take control of your finances</li>
                    <li>Pay school tuitions</li>
                    <li>Adding value to your home</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="help-list">
                    <li>Increase your budget</li>
                    <li>Have a day to remember</li>
                    <li>Get a new card</li>
                    <li>Go on a holliday</li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="help-list">
                    <li>Get an Insurance</li>
                    <li>Take a trip</li>
                    <li>Help your kids</li>
                    <li>Renovate your home</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="info-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <img src="/static_assets/website/img/info-img.jpg" alt="" />
            </div>
            <div class="col-lg-7">
                <div class="info-text">
                    <h2>We’re here to help</h2>
                    <h5>Monday to Thursday (8am to 8pm), and Friday (8am to 5pm).</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tem por incididunt ut labore et dolore mag na aliqua.
                        Class aptent taciti sociosqu ad litora torquent per conubia
                        nostra, per inceptos himenaeos. Suspendisse potenti. Ut gravida
                        mattis magna, non varius lorem sodales nec. In libero orci,
                        ornare non nisl.
                    </p>
                    <ul>
                        <li>+34 56873 2246</li>
                        {{-- <li>
                            <a href="../../cdn-cgi/l/email-protection.html" class="__cf_email__"
                                data-cfemail="5e3d31302a3f3d2a1e32313f302d6c3931703d3133">[email&#160;protected]</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="score-section text-white set-bg" data-setbg="img/score-bg.jpg">
<div class="container">
<div class="row">
<div class="col-xl-6 col-lg-8">
<h2>Calculate my Score</h2>
<h4>Check your credit reports as often as you want, it won't affect your scores.</h4>
<a href="index.html#" class="site-btn sb-big">show my score</a>
</div>
</div>
<img src="/static_assets/website/img/hand.png" alt="" class="hand-img">
</div>
</section> -->

@include('admin.partials.www.footer')
