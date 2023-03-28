<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <title>Bluebird Financial Bank |

        @if (Route::currentRoutename() == 'dashboard')
            {{ 'Home' }}
        @elseif (strstr(Route::currentRoutename(), '-'))
            {{ ucfirst(str_replace('-', ' ', Route::currentRoutename())) }}
        @else
            {{ ucfirst(Route::currentRoutename()) }}
        @endif

    </title>
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
                                        <a class="rd-nav-link" href="/">Home</a>
                                    </li>
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="{{ route('about') }}">About</a>
                                    </li>
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="{{ route('personal-loans') }}">Personal Loans</a>
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
