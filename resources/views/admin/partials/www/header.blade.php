<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bluebird Bank| Experience banking made easy</title>
    <meta charset="UTF-8" />
    <meta name="description" content="Bluebird Global Express" />
    <meta name="keywords" content="banks, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- favicons --}}
    <link href="/static_assets/favicon_io/apple-touch-icon.png" rel="shortcut icon" />
    <link href="/static_assets/favicon_io/favicon-32x32.png" rel="shortcut icon" />
    <link rel="icon" type="image/x-icon" href="/static_assets/favicon_io/favicon-32x32.png">
    
    <link href="/static_assets/favicon_io/favicon.ico" rel="shortcut icon" />

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="/static_assets/website/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/static_assets/website/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/static_assets/website/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/static_assets/website/css/flaticon.css" />
    <link rel="stylesheet" href="/static_assets/website/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="/static_assets/website/css/slicknav.min.css" />

    <link rel="stylesheet" href="/static_assets/website/css/style.css" />
    <style>
        .my-1 {
            margin-top: 1em;
            margin-bottom: 1em;
        }

        .my-2 {
            margin-top: 2em;
            margin-bottom: 2em;
        }

        .my-3 {
            margin-top: 3em;
            margin-bottom: 3em;
        }

        .my-4 {
            margin-top: 4em;
            margin-bottom: 4em;
        }

        .my-5 {
            margin-top: 5em;
            margin-bottom: 5em;
        }
    </style>


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <header class="header-section">
        <a href="/" class="site-logo">
            {{-- <img src="/static_assets/website/img/logo.png" alt="" /> --}}
            {{-- <x-application-logo /> --}}
            <div class="" style="background: whitesmoke; padding: .4em .012em; margin-top: -1.31em;">
                <x-application-logo :width=85 />
            </div>
        </a>
        <nav class="header-nav">
            <ul class="main-menu">
                <li><a href="{{ route('bank-homepage') }}" class="
                  {{ Route::currentRouteName() == 'bank-homepage' ? 'active' : ''}}">Home</a></li>
                <!-- <li><a href="news.html">News</a></li> -->
                <li><a href="{{ route('bank-loan') }}" class="{{ Route::currentRouteName() == 'bank-loan' ? 'active' : ''}}"">Apply For A Loan Today</a></li>
                <li><a href="{{ route('bank-about') }}" class="{{ Route::currentRouteName() == 'bank-about' ? 'active' : ''}}"">About Us</a></li>
                <li><a href="{{ route('bank-contact') }}" class="{{ Route::currentRouteName() == 'bank-contact' ? 'active' : ''}}"">Contact</a></li>
                <li><a href="{{ route('register') }}" class="">Join Us Today</a></li>
            </ul>
            <div class="header-right">
                <span
                 class="hr-btn"><i class="flaticon-029-telephone-1"></i>Call us now!
                </span>
                <div class="hr-btn hr-btn-2">+(619) 483-2333</div>

            </div>
        </nav>
    </header>
