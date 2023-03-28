<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>Bluebird Financial Bank | Home</title>
    {{-- <meta name="format-detection" content="telephone=no" /> --}}
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8" />
    {{-- <script src="http://livedemo00.template-help.com/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script> --}}
    <link rel="icon" href="/static_assets/img/blue-bird-logo-1.svg" type="image/x-icon" />
    <link rel="stylesheet" type="text/css"
        href="http://fonts.googleapis.com/css?family=Lato:400,700%7CRaleway:300,300i,400,400i,700,900%7CPlayfair+Display:700italic,900" />
    <link rel="stylesheet" href="/static_assets/css/bstrap.css" />
    <link rel="stylesheet" href="/static_assets/css/style.css" />

    <style>
        a {
            cursor: pointer;
        }

        .mt-5 {
            margin-top: 5em;
        }
        .mt-10 {
            margin-top: 10rem;
        }
    </style>
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
                <img src="/static_assets/img/blue-bird-logo-1.svg" alt="" width="200" height="52" />
            </a>
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
                                <span></span></button>

                            <style>
                                .logo_img_welcome_page {
                                    width: 70px !important;

                                }

                                .mt-_5 {
                                    margin-top: -1.2em;
                                }
                            </style>

                            <a class="rd-navbar-brand brand mt-_5" href="#">
                                <img src="/static_assets/img/blue-bird-logo-1.svg" alt=""
                                    class="logo_img_welcome_page" /></a>

                        </div>
                        <div class="rd-navbar-nav-wrap">
                            <div class="rd-navbar-nav-inner">
                                <!-- RD Navbar Nav-->
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item active">
                                        <a class="rd-nav-link" href="#">Home</a>
                                    </li>
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="#about">About</a>
                                    </li>
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="#services">Services</a>
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
                                    <a href="tel:#">+1 (373) 987–3342</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <section class="swiper-container swiper-slider swiper-variant-1 bg-black" data-loop="true"
            data-autoplay="false" data-simulate-touch="true">
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
                <div class="swiper-slide"
                    data-slide-bg="http://livedemo00.template-help.com/wt_prod-20296/images/slide-1.jpg">
                    <div class="swiper-slide-caption">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col-md-10 col-lg-9">
                                    <h2 class="slider-header" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="0s">
                                        The Best<br class="d-none d-lg-block" />
                                        Credit Card Deals For You
                                    </h2>
                                    <p class="slider-text" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="300">
                                        Providing low-rate mortgage loans since 2000.
                                    </p>
                                    <div class="button-wrap" data-caption-animate="fadeInUpSmall"
                                        data-caption-delay="600">
                                        <a class="button button-link button-link-white" data-toggle="modal"
                                            data-target="#exampleModal">Get a Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide"
                    data-slide-bg="http://livedemo00.template-help.com/wt_prod-20296/images/slide-2.jpg">
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
                                        <a class="button button-link button-link-white" data-toggle="modal"
                                            data-target="#exampleModal">Get a Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide"
                    data-slide-bg="http://livedemo00.template-help.com/wt_prod-20296/images/slide-3.jpg">
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


        <section class="section-75 section-lg-100 bg-wasip" id="services">
            <div class="container">
                <h2>Credit Card Benefits Overview</h2>
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
                        <a class="button button-xl button-black-outline" data-toggle="modal"
                            data-target="#exampleModal">Send us a letter</a>
                    </div>
                </div>
            </div>
        </section>



        <section class="bg-default">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 section-75 section-lg-100 text-lg-left">
                        <h2>Easy Credit Card Application System</h2>
                        <h5 class="text-spacing-50">
                            We provide personalized credit services for all.
                        </h5>
                        <p class="text-spacing-50 text-gray">
                            At Bluebird Bank, we understand the importance of having a reliable and convenient tool to
                            manage your finances. Our credit cards are designed to provide you with the flexibility and
                            convenience you need to make purchases, manage expenses, and even save money.


                        </p>
                        <p class="text-spacing-50 text-gray">
                            Applying for a Bluebird Bank credit card is easy and straightforward. You can visit our
                            website, fill out an application form, and receive a decision in minutes. If approved,
                            you'll receive your card within a few business days, and you'll be ready to start using it
                            for your purchases.
                        </p>
                        {{-- <a class="button button-secondary button-width" >read more</a> --}}
                    </div>
                    <div class="col-lg-6 d-none d-lg-block align-self-lg-end">
                        <img class="img-responsive center-block" src="/static_assets/lpage/ccs/cc2.jpeg"
                            alt="" width="569" height="600" />
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-default">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block align-self-lg-end">
                        <img class="img-responsive center-block" src="/static_assets/lpage/ccs/cc1.jpeg"
                            alt="" width="569" height="600" />
                    </div>
                    <div class="col-lg-6 section-75 section-lg-100 text-lg-left mt-5">
                        <h2 class="mt-5">Key Benefits of Using Credit Cards</h2>
                        <h5 class="text-spacing-50">
                            We know how to make you profit from your credit cards.
                        </h5>
                        <p class="text-spacing-50 text-gray">
                            One of the benefits of using a Bluebird Bank credit card is the ability to earn rewards and
                            cashback on your purchases. Depending on the type of card you choose, you can earn points or
                            cashback on every purchase you make. These rewards can add up quickly, and you can redeem
                            them for travel, merchandise, or even statement credits, which can help you save money on
                            future purchases.
                        </p>
                        <p class="text-spacing-50 text-gray">
                            In addition to earning rewards, using a credit card can also help you save money on interest
                            charges. By using a credit card to make purchases instead of using cash or a debit card, you
                            can take advantage of the interest-free period that most credit cards offer. As long as you
                            pay your balance in full by the due date, you won't be charged any interest on your
                            purchases.
                        </p>
                        {{-- <a class="button button-secondary button-width" >read more</a> --}}
                    </div>

                </div>
            </div>
        </section>


        <section class="bg-default">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 section-75 section-lg-100 text-lg-left mt-10">
                        <h2>A rewarding Credit Card Experience</h2>
                        <h5 class="text-spacing-50">
                            More Benefits To Consider
                        </h5>
                        <p class="text-spacing-50 text-gray">
                            Another benefit of using a Bluebird Bank credit card is the ability to track and manage your
                            expenses. Our credit card statements provide you with a clear breakdown of your purchases,
                            which can help you identify areas where you can cut back on expenses and save money. You can
                            also set up alerts and notifications to stay on top of your spending and avoid overspending.
                            
                        </p>
                        <p class="text-spacing-50 text-gray">
                           At Bluebird Bank, we're committed to providing our customers with the best possible credit
                            card experience. Our credit cards offer competitive interest rates, no annual fees, and 24/7
                            customer service support. Our credit card specialists are available to answer any questions
                            you may have and provide you with the guidance and support you need to make informed
                            financial decisions.

                        </p>
                        {{-- <a class="button button-secondary button-width" >read more</a> --}}
                    </div>
                    <div class="col-lg-6 d-none d-lg-block align-self-lg-end">
                        <img class="img-responsive center-block"
                            src="/static_assets/lpage/ccs/cc3.jpg"
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
