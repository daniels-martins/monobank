<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>Home</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8" />
    <script src="http://livedemo00.template-help.com/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>
    <link rel="icon" href="http://livedemo00.template-help.com/wt_prod-20296/images/favicon.ico"
        type="image/x-icon" />
    <link rel="stylesheet" type="text/css"
        href="http://fonts.googleapis.com/css?family=Lato:400,700%7CRaleway:300,300i,400,400i,700,900%7CPlayfair+Display:700italic,900" />
    <link rel="stylesheet" href="http://livedemo00.template-help.com/wt_prod-20296/css/bootstrap.css" />
    <link rel="stylesheet" href="http://livedemo00.template-help.com/wt_prod-20296/css/style.css" />
    <!--[if lt IE 10]>
      <div
        style="
          background: #212121;
          padding: 10px 0;
          box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, 0.3);
          clear: both;
          text-align: center;
          position: relative;
          z-index: 1;
        "
      >
        <a href="http://windows.microsoft.com/en-US/internet-explorer/"
          ><img
            src="images/ie8-panel/warning_bar_0000_us.jpg"
            border="0"
            height="42"
            width="820"
            alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."
        /></a>
      </div>
      <script src="js/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="page-loader">
        <div>
            <a class="brand brand-md" href="/">
                <img src="http://livedemo00.template-help.com/wt_prod-20296/images/logo-inverse-160x52.png"
                    alt="" width="160" height="52" /></a>
            <div class="page-loader-body">
                <div class="cssload-container">
                    <div class="cssload-whirlpool"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="page">
        <header class="page-head" id="home">
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                    data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed"
                    data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed"
                    data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static"
                    data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static"
                    data-lg-stick-up-offset="60px" data-xl-stick-up-offset="60px" data-xxl-stick-up-offset="60px"
                    data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-inner">
                        <div class="rd-navbar-panel">
                            <button class="rd-navbar-toggle" data-custom-toggle=".rd-navbar-nav-wrap"
                                data-custom-toggle-disable-on-blur="true">
                                <span></span></button><a class="rd-navbar-brand brand"
                                href="http://livedemo00.template-help.com/wt_prod-20296/index.html"><img
                                    src="http://livedemo00.template-help.com/wt_prod-20296/images/logo-default-160x52.png"
                                    alt="" width="160" height="52" /></a>
                        </div>
                        <div class="rd-navbar-nav-wrap">
                            <div class="rd-navbar-nav-inner">
                                <!-- RD Navbar Nav-->
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item active">
                                        <a class="rd-nav-link" href="index.html#home">Home</a>
                                    </li>
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="index.html#about">About</a>
                                    </li>
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="index.html#services">Services</a>
                                    </li>
                                    @auth
                                    <li class="rd-nav-item">
                                       <a class="rd-nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                   </li>
                                   @else
                                   <li class="rd-nav-item">
                                      <a class="rd-nav-link" href="{{ route('login') }}">Login</a>
                                    </li>
                                    <li class="rd-nav-item">
                                       <a class="rd-nav-link" href="{{ route('register') }}">SignUp</a>
                                    </li>
                                    @endauth
                                 </ul>
                            </div>
                        </div>
                        <div class="rd-navbar-contact">
                            <div class="unit flex-row align-items-center">
                                <div class="unit-left">
                                    <svg class="icon" version="1.1" fill="none" stroke="#151515" x="0px"
                                        y="0px" width="32px" height="32px" viewbox="0 0 54 53.948">
                                        <g>
                                            <path
                                                style="
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                                d="                  M43.557,51.564l4.269-4.269c1.704-1.704,1.529-4.514-0.372-5.994l-6.683-5.202c-1.456-1.133-3.497-1.125-4.944,0.018l-1.486,1.174                  c-1.594,1.26-3.879,1.126-5.316-0.31L17.07,25.026c-1.436-1.437-1.57-3.722-0.31-5.316l1.174-1.486                  c1.143-1.448,1.151-3.488,0.018-4.944L12.75,6.597c-1.48-1.901-4.29-2.076-5.994-0.372l-4.269,4.269                  c-2.942,2.942-2.93,11.19,13.475,27.595C32.366,54.493,40.851,54.27,43.557,51.564z">
                                            </path>
                                            <path
                                                style="
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                                d="                  M53,26C53,12.193,41.807,1,28,1"></path>
                                            <path
                                                style="
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                                d="                  M28,7c10.493,0,19,8.507,19,19"></path>
                                            <path
                                                style="
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                                d="                  M28,13c7.18,0,13,5.82,13,13"></path>
                                            <path
                                                style="
                            stroke-width: 2;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                            stroke-miterlimit: 10;
                          "
                                                d="                  M28,19c3.866,0,7,3.134,7,7"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="unit-body">
                                    <p>Customer Service</p>
                                    <a href="tel:#">+1 (409) 987–5874</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <section class="swiper-container swiper-slider swiper-variant-1 bg-black" data-loop="true"
            data-autoplay="false" data-simulate-touch="true">
            <div class="swiper-wrapper text-center">
                <div class="swiper-slide" data-slide-bg="images/slide-1.jpg">
                    <div class="swiper-slide-caption">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-md-10 col-lg-9">
                                    <h2 class="slider-header" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="0s">
                                        The Best<br class="d-none d-lg-block" />
                                        Loans for You
                                    </h2>
                                    <p class="slider-text" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="300">
                                        Providing low-rate mortgage loans since 2001.
                                    </p>
                                    <div class="button-wrap" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="600">
                                        <a class="button button-link button-link-white" href="index.html#"
                                            data-toggle="modal" data-target="#exampleModal">Get a Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-slide-bg="images/slide-2.jpg">
                    <div class="swiper-slide-caption">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-md-10 col-lg-9">
                                    <h2 class="slider-header" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="0s">
                                        Efficient<br class="d-none d-lg-block" />
                                        Mortgage Financing
                                    </h2>
                                    <p class="slider-text" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="300">
                                        Let our experts help you choose the perfect financing
                                        option.
                                    </p>
                                    <div class="button-wrap" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="600">
                                        <a class="button button-link button-link-white" href="index.html#"
                                            data-toggle="modal" data-target="#exampleModal">Get a Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide" data-slide-bg="images/slide-3.jpg">
                    <div class="swiper-slide-caption">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-md-10 col-lg-9">
                                    <h2 class="slider-header" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="0s">
                                        Special<br class="d-none d-lg-block" />
                                        Family Rates
                                    </h2>
                                    <p class="slider-text" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="300">
                                        We offer the best crediting options for young families.
                                    </p>
                                    <div class="button-wrap" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="600">
                                        <a class="button button-link button-link-white" href="index.html#"
                                            data-toggle="modal" data-target="#exampleModal">Get a Quote</a>
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
                                    <img src="http://livedemo00.template-help.com/wt_prod-20296/images/logo-inverse-160x52.png"
                                        alt="" width="160" height="52" />
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
                                    <h5><a href="index.html#">Quick and Easy</a></h5>
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
                                    <svg x="0px" y="0px" width="52" height="48"
                                        viewbox="0 0 45 42">
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
                                    <h5><a href="index.html#">No Penalties</a></h5>
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
                                    <svg x="0px" y="0px" width="48px" height="48px"
                                        viewBox="0 0 48 48" enable-background="new 0 0 48 48">
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
                                    <h5><a href="index.html#">Lower Rates</a></h5>
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
                                    <h5><a href="index.html#">Secure Process</a></h5>
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
                        <a class="button button-xl button-white-outline" href="index.html#" data-toggle="modal"
                            data-target="#exampleModal">Send us a letter</a>
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
                        <a class="button button-xl button-white-outline" href="index.html#" data-toggle="modal"
                            data-target="#exampleModal">Get a Quote</a>
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
                            Capital is not tied to any specific lender, which means we can
                            establish and recommend the best mortgage product. Our aim is to
                            provide you with tailored and honest advice to help guide you
                            through difficult decisions.
                        </p>
                        <a class="button button-primary button-width" href="index.html#">read more</a>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block align-self-lg-end">
                        <img class="img-responsive center-block"
                            src="http://livedemo00.template-help.com/wt_prod-20296/images/image-2-569x600.jpg"
                            alt="" width="569" height="600" />
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
                        <form class="rd-mailform rd-mailform-inline form-style-1"
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
                        </form>
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
                                    <a class="thumbnail-grayscale" href="index.html#"><img
                                            src="http://livedemo00.template-help.com/wt_prod-20296/images/clients-3.png"
                                            alt="" /></a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="thumbnail-grayscale" href="index.html#"><img
                                            src="http://livedemo00.template-help.com/wt_prod-20296/images/clients-4.png"
                                            alt="" /></a>
                                </div>
                            </div>
                            <div class="row row-30 row-offset-5">
                                <div class="col-sm-6">
                                    <a class="thumbnail-grayscale" href="index.html#"><img
                                            src="http://livedemo00.template-help.com/wt_prod-20296/images/clients-7.png"
                                            alt="" /></a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="thumbnail-grayscale" href="index.html#"><img
                                            src="http://livedemo00.template-help.com/wt_prod-20296/images/clients-8.png"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="page-foot bg-overlay-90 page-foot-default bg-gray-dark">
            <div class="container section-top-70 section-bottom-50 text-sm-left">
                <div class="row row-50">
                    <div class="col-sm-6 col-lg-3">
                        <h6 class="page-footer-title">Contact us</h6>
                        <ul class="list">
                            <li><a href="tel:#">+1 (409) 987–5874</a></li>
                            <li><a href="mailto:#">info@demolink.org</a></li>
                            <li>
                                6036 Richmond hwy.,<br />
                                Alexandria, VA, 2230
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <h6 class="page-footer-title">Products</h6>
                        <ul class="list">
                            <li><a href="index.html#">Credit Cards</a></li>
                            <li><a href="index.html#">Student Loans</a></li>
                            <li><a href="index.html#">Mortgages</a></li>
                            <li><a href="index.html#">Personal Loans</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <h6 class="page-footer-title">About us</h6>
                        <ul class="list">
                            <li><a href="index.html#">Social Media</a></li>
                            <li><a href="index.html#">Testimonials</a></li>
                            <li><a href="index.html#">Our History</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <h6 class="page-footer-title">Still have questions?</h6>
                        <p class="text-spacing-0">
                            Feel free to contact our loan agents.
                        </p>
                        <a class="button button-icon button-icon-right button-primary button-rect" href="index.html#"
                            data-toggle="modal" data-target="#exampleModal"><span
                                class="icon icon-xs-smaller fl-bigmug-line-email64"></span>Contact us</a>
                    </div>
                </div>
            </div>
            <div class="container container-top-0">
                <hr />
            </div>
            <div class="container container-top-0 section-top-50 section-bottom-30 small text-spacing-50 text-sm-left">
                <p>
                    Estimated savings are calculated based on the credit profiles of all
                    loans originated as of December 01, 2017 in which the funds were
                    used for credit card refinancing. Capital calculates estimated
                    savings by deriving current credit card APR using minimum monthly
                    payment and 1% of the principal balance. We then compare estimated
                    credit card APR to Capital APR to determine median savings per
                    borrower. To evaluate savings on a loan you are considering, it is
                    important to compare your actual APR from your existing debt to the
                    APR offered by our company.
                </p>
                <p>
                    Loans used to fund education related expenses are subject to a 3
                    business day wait period between loan acceptance and funding in
                    accordance with federal law. While most of our borrowers opt for
                    automated recurring payment for ease of use, we also accept payments
                    by check or one time electronic payments. Borrowers have the
                    flexibility to choose the repayment method that works best for them.
                </p>
                <p>
                    The average 3-year loan on Capital will have an APR of 17% and 36
                    monthly payments of $31 per $1,000 borrowed. The average APR on
                    Capital is calculated based on 3-year rates offered in the last 1
                    month. You can find out more information from our agents.
                </p>
            </div>
            <div class="container section-top-15 section-bottom-60">
                <div class="row text-center">
                    <div class="col-sm-4 text-sm-right order-sm-1">
                        <ul class="list-inline list-inline-xs">
                            <li>
                                <a class="icon icon-sm-custom link-tundora-inverse fa-instagram"
                                    href="index.html#"></a>
                            </li>
                            <li>
                                <a class="icon icon-sm-custom link-tundora-inverse fa-facebook"
                                    href="index.html#"></a>
                            </li>
                            <li>
                                <a class="icon icon-sm-custom link-tundora-inverse fa-twitter" href="index.html#"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-8 text-sm-left text-spacing-0">
                        <p class="rights">
                            <span>BlueBird</span><span>&nbsp;&#169;&nbsp;</span><span
                                class="copyright-year"></span><span>. All Rights Reserved</span>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
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
                    <form class="rd-mailform form-style-2" data-form-output="form-output-global"
                        data-form-type="contact" method="post"
                        action="http://livedemo00.template-help.com/wt_prod-20296/bat/rd-mailform.php">
                        <div class="form-wrap">
                            <input class="form-input" id="contact-name-2" type="text" name="name" />
                            <label class="form-label" for="contact-name-2">Your name</label>
                        </div>
                        <div class="form-wrap">
                            <input class="form-input" id="contact-email-2" type="email" name="email" />
                            <label class="form-label" for="contact-email-2">Your e-mail</label>
                        </div>
                        <div class="form-wrap">
                            <input class="form-input" id="contact-phone-2" type="text" name="phone" />
                            <label class="form-label" for="contact-phone-2">Phone</label>
                        </div>
                        <div class="form-wrap">
                            <textarea class="form-input" id="contact-message-3" name="message"></textarea>
                            <label class="form-label" for="contact-message-3">Your message</label>
                        </div>
                        <button class="button button-primary" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="http://livedemo00.template-help.com/wt_prod-20296/js/core.min.js"></script>
    <script src="http://livedemo00.template-help.com/wt_prod-20296/js/script.js"></script>

    <!--LIVEDEMO_00 -->

    <script type="text/javascript">
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
    </script>

    <!-- coded by Ragnar-->
    <!-- Google Tag Manager --><noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-P9FT69"
            height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
    <script>
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
    </script>
    <!-- End Google Tag Manager -->
</body>

</html>
