@include('landing_pages.partials.header')
<section class="swiper-container swiper-slider swiper-variant-1 bg-black" data-loop="true" data-autoplay="false"
    data-simulate-touch="true">
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
            <div class="h2 floating-alert alert toast-alert-{{ $alertType }} alert-dismissible fade show"
                role="alert">
                <strong>{{ Session("$alertType") }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="swiper-wrapper text-center">
        <div class="swiper-slide" data-slide-bg="http://livedemo00.template-help.com/wt_prod-20296/images/slide-1.jpg">
            <div class="swiper-slide-caption">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10 col-lg-9">
                            <h2 class="slider-header" data-caption-animate="fadeInUpSmall" data-caption-delay="0s">
                                The Best<br class="d-none d-lg-block" />
                                Loans for You
                            </h2>
                            <p class="slider-text" data-caption-animate="fadeInUpSmall" data-caption-delay="300">
                                Providing low-rate mortgage loans since 2000.
                            </p>
                            <div class="button-wrap" data-caption-animate="fadeInUpSmall" data-caption-delay="600">
                                <a class="button button-link button-link-white" data-toggle="modal"
                                    data-target="#exampleModal">Get a Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide" data-slide-bg="http://livedemo00.template-help.com/wt_prod-20296/images/slide-2.jpg">
            <div class="swiper-slide-caption">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10 col-lg-9">
                            <h2 class="slider-header" data-caption-animate="fadeInUpSmall" data-caption-delay="0s">
                                Efficient<br class="d-none d-lg-block" />
                                Mortgage Financing
                            </h2>
                            <p class="slider-text" data-caption-animate="fadeInUpSmall" data-caption-delay="300">
                                Let our experts help you choose the perfect financing
                                option.
                            </p>
                            <div class="button-wrap" data-caption-animate="fadeInUpSmall" data-caption-delay="600">
                                <a class="button button-link button-link-white" data-toggle="modal"
                                    data-target="#exampleModal">Get a Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide" data-slide-bg="http://livedemo00.template-help.com/wt_prod-20296/images/slide-3.jpg">
            <div class="swiper-slide-caption">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10 col-lg-9">
                            <h2 class="slider-header" data-caption-animate="fadeInUpSmall" data-caption-delay="0s">
                                Special<br class="d-none d-lg-block" />
                                Family Rates
                            </h2>
                            <p class="slider-text" data-caption-animate="fadeInUpSmall" data-caption-delay="300">
                                We offer the best crediting options for young families.
                            </p>
                            <div class="button-wrap" data-caption-animate="fadeInUpSmall" data-caption-delay="600">
                                <a class="button button-link button-link-white" data-toggle="modal"
                                    data-target="#exampleModal">Get a Quote</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-nav-wrap">
        <div class="swiper-button swiper-button-prev">
            <div class="wrap">
                <span class="swiper-button__arrow"></span>
                <div class="preview">
                    <div class="preview__img"></div>
                </div>
            </div>
        </div>
        <div class="swiper-button swiper-button-next">
            <div class="wrap">
                <span class="swiper-button__arrow"></span>
                <div class="preview">
                    <div class="preview__img"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-transform bg-transform bg-transform-first" id="about">
    <div class="bg-transform-inner"></div>
    <div class="container section-relative container-top-0 section-60 section-lg-top-80 section-lg-bottom-100">
        <h2 class="text-spacing-50 text-white">About Us</h2>
    </div>
</section>

<section class="section-60 section-lg-100 section-transform bg-transform context-dark">
    <div class="container text-lg-left">
        <div class="row row-30 justify-content-lg-between">
            <div class="col-lg-5">
                <h2>Better Rates</h2>
                <h5 class="offset-top-15">By using better data</h5>
                <p class="text-spacing-50 inset-xl-right-50">
                    There's more to you than your credit score. Your education and
                    job history help us understand more about your future.
                </p>
                <!--Select 2-->
                <form class="rd-mailform-inline" action="index.html#">
                    <div class="select-2-white form-wrap">
                        <select class="form-input select-filter" data-placeholder="I would like to"
                            data-minimum-results-for-search="Infinity">
                            <option value="2">$ 50 000</option>
                            <option value="3">$ 100 000</option>
                            <option value="4">$ 150 000</option>
                            <option value="5">$ 200 000</option>
                            <option value="6">$ 250 000</option>
                            <option value="7">$ 300 000</option>
                        </select>
                    </div>
                    <button class="button button-link button-link-white" style="min-width: 174px">
                        Check Your Rate
                    </button>
                </form>
            </div>
            <div class="col-lg-6 col-lg-divider">
                <table class="table-transparent">
                    <tr>
                        <th></th>
                        <th>
                            <img src="/static_assets/img/blue-bird-logo-1.svg" alt="" width="160"
                                height="52" />
                        </th>
                    </tr>
                    <tr>
                        <td>FICO score</td>
                        <td>
                            <span class="icon icon-primary mdi mdi-check icon-md-smaller"></span>
                        </td>
                        <td>
                            <span class="icon icon-dust mdi mdi-check icon-md-smaller"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Years of credit</td>
                        <td>
                            <span class="icon icon-primary mdi mdi-check icon-md-smaller"></span>
                        </td>
                        <td>
                            <span class="icon icon-dust mdi mdi-check icon-md-smaller"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Education</td>
                        <td>
                            <span class="icon icon-primary mdi mdi-check icon-md-smaller"></span>
                        </td>
                        <td>
                            <span class="icon icon-dust mdi mdi-check icon-md-smaller"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Area of study</td>
                        <td>
                            <span class="icon icon-primary mdi mdi-check icon-md-smaller"></span>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Job history</td>
                        <td>
                            <span class="icon icon-primary mdi mdi-check icon-md-smaller"></span>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="bg-transform-inner bg-image bg-image-1 bg-overlay-90"></div>
</section>
<section class="section-75 section-lg-100 bg-wasip" id="services">
    <div class="container">
        <h2>Services Overview</h2>
        <div class="row row-40">
            <div class="col-md-6 col-xl-3 height-fill">
                <article class="icon-box">
                    <svg class="icon-box-border" width="100%" height="100%">
                        <line class="bottom" x1="260" y1="320" x2="-520" y2="320">
                        </line>
                    </svg>
                    <div class="box-top">
                        <div class="box-icon">
                            <svg x="0px" y="0px" width="52" height="52"
                                viewbox="0 0 43.598 44">
                                <polyline
                                    style="
                          fill: none;
                          stroke-width: 2;
                          stroke-linecap: round;
                          stroke-linejoin: round;
                          stroke-miterlimit: 10;
                        "
                                    points="																														30.598,16 21.598,24 15.598,21 ">
                                </polyline>
                                <g>
                                    <path
                                        style="
                            clip-path: url(index.html);
                            fill: none;
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                        d="																															M42.598,22c0-11.598-9.402-21-21-21S1,10.402,1,22s9.402,21,21.402,21v-4C12.402,39,5,31.389,5,22S12.41,5,21.799,5																															s16.899,7.611,16.899,17c0,6.893-4.152,12.828-10.049,15.496">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="box-header">
                            <h5><a>Quick and Easy</a></h5>
                        </div>
                    </div>
                    <div class="box-body">
                        <p class="text-gray text-spacing-50">
                            We offer lots of ways to quickly pay off your loans.
                        </p>
                    </div>
                </article>
            </div>
            <div class="col-md-6 col-xl-3 height-fill">
                <article class="icon-box">
                    <svg class="icon-box-border" width="100%" height="100%">
                        <line class="bottom" x1="260" y1="320" x2="-520" y2="320">
                        </line>
                    </svg>
                    <div class="box-top">
                        <div class="box-icon">
                            <svg x="0px" y="0px" width="52" height="48" viewbox="0 0 45 42">
                                <g>
                                    <path style="clip-path: url(index.html)"
                                        d="M36.562,42H5.439C2.439,42,0,39.561,0,36.562V5.438C0,2.439,2.439,0,5.439,0h31.123																																							C39.559,0,41.998,2.439,42,5.437c0,0.553-0.447,1.001-1,1.001c-0.551,0-1-0.447-1-1C40,3.542,38.458,2,36.562,2H5.439																																							C3.542,2,2,3.542,2,5.438v31.124C2,38.458,3.542,40,5.439,40h31.123C38.458,40,40,38.458,40,36.562V21c0-0.552,0.448-1,1-1																																							c0.553,0,1,0.448,1,1v15.562C42,39.561,39.56,42,36.562,42">
                                    </path>
                                    <path style="clip-path: url(index.html)"
                                        d="M5,36c-0.553,0-1-0.448-1-1V8.037C4,5.811,5.811,4,8.036,4H35c0.553,0,1,0.448,1,1																																							c0,0.552-0.447,1-1,1H8.036C6.913,6,6,6.914,6,8.037V35C6,35.552,5.553,36,5,36">
                                    </path>
                                    <path style="clip-path: url(index.html)"
                                        d="M21,32c-0.033,0-0.067-0.001-0.101-0.005c-0.283-0.029-0.541-0.177-0.708-0.407l-8-11																																							c-0.325-0.446-0.226-1.072,0.221-1.397c0.447-0.325,1.072-0.226,1.397,0.221l7.342,10.096L43.326,9.262																																							c0.406-0.372,1.039-0.345,1.412,0.064c0.373,0.407,0.344,1.04-0.064,1.412l-23,21C21.489,31.908,21.248,32,21,32">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="box-header">
                            <h5><a>No Penalties</a></h5>
                        </div>
                    </div>
                    <div class="box-body">
                        <p class="text-gray text-spacing-50">
                            Our clients are free of any prepayment penalties.
                        </p>
                    </div>
                </article>
            </div>
            <div class="col-md-6 col-xl-3 height-fill">
                <article class="icon-box">
                    <svg class="icon-box-border" width="100%" height="100%">
                        <line class="bottom" x1="260" y1="320" x2="-520" y2="320">
                        </line>
                    </svg>
                    <div class="box-top">
                        <div class="box-icon">
                            <svg x="0px" y="0px" width="48px" height="48px" viewBox="0 0 48 48"
                                enable-background="new 0 0 48 48">
                                <g>
                                    <defs>
                                        <rect id="SVGID_1_" width="48" height="48"></rect>
                                    </defs>
                                    <clippath id="SVGID_2_">
                                        <use xlink:href="#SVGID_1_" overflow="visible"></use>
                                    </clippath>
                                    <path clip-path="url(#SVGID_2_)" fill="none" stroke="#000000"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-miterlimit="10"
                                        d="								M1,21C1,9.954,9.954,1,21,1h-0.02v19.979H1V21z"></path>
                                    <path clip-path="url(#SVGID_2_)" fill="none" stroke="#000000"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-miterlimit="10"
                                        d="								M5,26c0,11.598,9.402,21,21,21s21-9.402,21-21S37.598,5,26,5">
                                    </path>
                                    <path clip-path="url(#SVGID_2_)" fill="none" stroke="#000000"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-miterlimit="10"
                                        d="								M11.938,26c0,7.767,6.296,14.063,14.063,14.063S40.063,33.767,40.063,26S33.767,11.938,26,11.938">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <div class="box-header">
                            <h5><a>Lower Rates</a></h5>
                        </div>
                    </div>
                    <div class="box-body">
                        <p class="text-gray text-spacing-50">
                            We have lower rates than most of our competitors.
                        </p>
                    </div>
                </article>
            </div>
            <div class="col-md-6 col-xl-3 height-fill">
                <article class="icon-box">
                    <svg class="icon-box-border" width="100%" height="100%">
                        <line class="bottom" x1="260" y1="320" x2="-520" y2="320">
                        </line>
                    </svg>
                    <div class="box-top">
                        <div class="box-icon">
                            <svg x="0px" y="0px" width="37" height="58"
                                viewbox="0 0 30 45.016">
                                <g>
                                    <path
                                        style="
                            clip-path: url(index.html);
                            fill: none;
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                        d="																																							M26.417,11.984C26.417,5.909,21.701,1,15.626,1S4.803,5.94,4.803,12.078v4.937">
                                    </path>
                                    <line
                                        style="
                            clip-path: url(index.html);
                            fill: none;
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                        x1="11.804" y1="29.016" x2="19.804" y2="29.016"></line>
                                    <line
                                        style="
                            clip-path: url(index.html);
                            fill: none;
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                        x1="9.804" y1="25.016" x2="21.804" y2="25.016"></line>
                                    <line
                                        style="
                            clip-path: url(index.html);
                            fill: none;
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                        x1="13.804" y1="33.016" x2="17.804" y2="33.016"></line>
                                    <path
                                        style="
                            clip-path: url(index.html);
                            fill: none;
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                        d="																																							M20,17.016H4.366C2.507,17.016,1,18.523,1,20.382V38.65c0,1.859,1.507,2.366,3.366,2.366h21.267c1.86,0,3.367-0.507,3.367-2.366																																							V20.382c0-1.859-1.507-3.366-3.367-3.366H25H20z">
                                    </path>
                                    <line
                                        style="
                            clip-path: url(index.html);
                            fill: none;
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                        x1="5.804" y1="44.016" x2="25.804" y2="44.016"></line>
                                </g>
                            </svg>
                        </div>
                        <div class="box-header">
                            <h5><a>Secure Process</a></h5>
                        </div>
                    </div>
                    <div class="box-body">
                        <p class="text-gray text-spacing-50">
                            Complete loans on our site quickly and securely.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>


<section class="section-60 section-md-100 bg-river" id="clients">
    <div class="container text-lg-left">
        <div class="row row-30 align-items-sm-center">
            <div class="col-lg-8 col-xl-8">
                <h3>Not Sure Which Plan is Right For You?</h3>
                <p class="p-custom text-gray d-inline-block" style="max-width: 560px">
                    If you are in doubt of which plan to opt for, subscribe to our
                    newsletter and we will try to help you make the right decision.
                </p>
            </div>
            <div class="col-lg-4 col-xl-4 text-lg-right">
                <a class="button button-xl button-black-outline" data-toggle="modal" data-target="#exampleModal">Send
                    us a letter</a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials-->
<!-- Material Parallax-->
<section class="section parallax-container bg-black bg-overlay-70" data-parallax-img="images/bg-about.jpg">
    <div class="parallax-content">
        <div class="section-75 section-lg-100 context-dark">
            <div class="container">
                <h2>Get a Loan In 3 Quick Steps</h2>
                <ul class="row row-30 row-offset-1 list-index">
                    <li class="col-sm-6 col-lg-4">
                        <div class="box-outline">
                            <div class="list-index-counter"></div>
                            <h5>Check your rate in 2 minutes</h5>
                            <p class="text-spacing-50">
                                Just answer a few quick questions about your education and
                                employment.
                            </p>
                            <span class="border-left-bottom"></span><span class="border-right-bottom"></span>
                        </div>
                    </li>
                    <li class="col-sm-6 col-lg-4">
                        <div class="box-outline">
                            <div class="list-index-counter"></div>
                            <h5>Get your money the next day</h5>
                            <p class="text-spacing-50">
                                After your application is approved, you'll have a chance
                                to review your loan.
                            </p>
                            <span class="border-left-bottom"></span><span class="border-right-bottom"></span>
                        </div>
                    </li>
                    <li class="col-sm-6 col-lg-4">
                        <div class="box-outline">
                            <div class="list-index-counter"></div>
                            <h5>Repay: set it and forget it</h5>
                            <p class="text-spacing-50">
                                It's easy to set up automated monthly payments without any
                                penalties.
                            </p>
                            <span class="border-left-bottom"></span><span class="border-right-bottom"></span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>


<!-- CTA-->
<section class="section-60 section-lg-100 bg-river">
    <div class="container text-center text-lg-left">
        <div class="row row-30 align-items-lg-center">
            <div class="col-lg-8 col-xl-9">
                <h3 class="text-spacing-50">
                    A Wide Variety of Mortgage Solutions
                </h3>
            </div>
            <div class="col-lg-4 col-xl-3">
                <a class="button button-xl button-white-outline" data-toggle="modal" data-target="#exampleModal">Get
                    a Quote</a>
            </div>
        </div>
    </div>
</section>

<section class="bg-default">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 section-75 section-lg-100 text-lg-left">
                <h2>Mortgage Advice</h2>
                <h5 class="text-spacing-50">
                    We provide personalized mortgage services.
                </h5>
                <p class="text-spacing-50 text-gray">
                    Arranging a mortgage is one of the largest commitments most of
                    us will ever make, even more reason to seek suitable mortgage
                    advice which is individually tailored to your needs and
                    requirements.
                </p>
                <p class="text-spacing-50 text-gray">
                    Bluebird is not tied to any specific lender, which means we can
                    establish and recommend the best mortgage product. Our aim is to
                    provide you with tailored and honest advice to help guide you
                    through difficult decisions.
                </p>
                {{-- <a class="button button-secondary button-width" >read more</a> --}}
            </div>
            <div class="col-lg-6 d-none d-lg-block align-self-lg-end">
                <img class="img-responsive center-block"
                    src="http://livedemo00.template-help.com/wt_prod-20296/images/image-2-569x600.jpg" alt=""
                    width="569" height="600" />
            </div>
        </div>
    </div>
</section>
<!-- Material Parallax-->
<section class="section parallax-container bg-black bg-overlay-70" data-parallax-img="images/bg-image-3.jpg">
    <div class="parallax-content">
        <div class="section-75 section-lg-100 context-dark">
            <div class="container">
                <h3 class="text-spacing-50">Mortgage News and Updates</h3>
                <p class="heading-subtext text-spacing-0">
                    Sign up to our newsletter and be the first to know about latest
                    news,<br class="d-none d-lg-block" />special offers, events, and
                    discounts from our company.
                </p>
                <!-- RD Mailform-->
                {{-- <form class="rd-mailform rd-mailform-inline form-style-1"
                            data-form-output="form-output-global" data-form-type="forms" method="post"
                            action="http://livedemo00.template-help.com/wt_prod-20296/bat/rd-mailform.php">
                            <div class="form-wrap">
                                <label class="text-white form-label" for="inline-email">Enter your e-mail</label>
                                <input class="form-input form-input-transparent" id="inline-email" type="email"
                                    name="email" />
                            </div>
                            <button class="button button-white button-width" type="submit">
                                subscribe
                            </button>
                        </form> --}}
            </div>
        </div>
    </div>
</section>

<section class="section-75 section-lg-100 bg-porcelain">
    <div class="container">
        <div class="row row-50 align-items-sm-center justify-content-lg-between">
            <div class="col-lg-6 col-xl-5 text-lg-left">
                <h2>
                    Get Your Rate in<br class="d-none d-lg-blcok" />
                    Just 2 Minutes
                </h2>
                <h5 class="offset-top-15 text-spacing-50">
                    It won't affect your credit score!
                </h5>
                <form class="rd-mailform-inline" action="index.html#">
                    <div class="form-wrap">
                        <!--Select 2-->
                        <select class="form-input select-filter" data-placeholder="I would like to"
                            data-minimum-results-for-search="Infinity">
                            <option value="2">$ 50 000</option>
                            <option value="3">$ 100 000</option>
                            <option value="4">$ 150 000</option>
                            <option value="5">$ 200 000</option>
                            <option value="6">$ 250 000</option>
                            <option value="7">$ 300 000</option>
                        </select>
                    </div>
                    <button class="button button-link button-link-primary" style="min-width: 174px">
                        Check Your Rate
                    </button>
                </form>
            </div>
            <div class="col-lg-5">
                <div class="section-dividers-white">
                    <div class="row row-30">
                        <div class="col-sm-6">
                            <div class="thumbnail-grayscale"><img
                                    src="http://livedemo00.template-help.com/wt_prod-20296/images/clients-3.png"
                                    alt="" /></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="thumbnail-grayscale"><img
                                    src="http://livedemo00.template-help.com/wt_prod-20296/images/clients-4.png"
                                    alt="" /></div>
                        </div>
                    </div>
                    <div class="row row-30 row-offset-5">
                        <div class="col-sm-6">
                            <div class="thumbnail-grayscale"><img
                                    src="http://livedemo00.template-help.com/wt_prod-20296/images/clients-7.png"
                                    alt="" /></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="thumbnail-grayscale"><img
                                    src="http://livedemo00.template-help.com/wt_prod-20296/images/clients-8.png"
                                    alt="" /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('landing_pages.partials.footer')
</div>
<div class="modal modal-1" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Get in Touch</h4>
                <!-- RD Mailform-->
                <form class="form-style-2" data-form-output="form-output-global" data-form-type="contact"
                    method="post" action="{{ route('contactmessages.store') }}"> @csrf
                    <div class="form-wrap">
                        <input class="form-input" id="contact-name-2" type="text" name="name" />
                        <label class="form-label" for="contact-name-2">Your name</label>
                    </div>
                    <div class="form-wrap">
                        <input class="form-input" id="contact-email-2" type="email" name="email" />
                        <label class="form-label" for="contact-email-2">Your e-mail</label>
                    </div>
                    <div class="form-wrap">
                        <input class="form-input" id="contact-phone-2" type="tel" name="phone"
                            maxlength="14" />
                        <label class="form-label" for="contact-phone-2">Phone</label>
                    </div>
                    <div class="form-wrap">
                        <textarea class="form-input" id="contact-message-3" name="message" maxlength="100"></textarea>
                        <label class="form-label" for="contact-message-3">Your message</label>
                    </div>
                    <button class="button button-primary" type="submit">Send Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="snackbars" id="form-output-global"></div>
<script src="/static_assets/js/jquery_core.min.js"></script>
<script src="/static_assets/js/script.js"></script>

<!--LIVEDEMO_00 -->

{{-- <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(["_setAccount", "UA-7078796-5"]);
        _gaq.push(["_trackPageview"]);
        (function() {
            var ga = document.createElement("script");
            ga.type = "text/javascript";
            ga.async = true;
            ga.src =
                ("https:" == document.location.protocol ?
                    "https://ssl" :
                    "http://www") + ".google-analytics.com/ga.js";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script> --}}

<!-- coded by Ragnar-->
<!-- Google Tag Manager --><noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-P9FT69"
        height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
{{-- <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "//www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-P9FT69");
    </script> --}}
<!-- End Google Tag Manager -->
</body>

</html>
