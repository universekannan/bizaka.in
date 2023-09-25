<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>PayApp - Finance, Banking, Wallet, Crypto Mobile PWA</title>
    <link rel="stylesheet" type="text/css" href="{!! asset('mobile/styles/bootstrap.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('mobile/fonts/bootstrap-icons.css') !!}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">
    <link rel="manifest" href="_manifest.json">
    <meta id="theme-check" name="theme-color" content="#FFFFFF">
    <link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light">
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">

        <div class="page-content my-0 py-0">
            <div class="card bg-5 card-fixed">
                <div class="card-center mx-3 px-4 py-4 bg-white rounded-m">
                    <h1 class="font-30 font-800 mb-0">PayApp</h1>
                    <p>Login to your Account.</p>
                    <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
                        <i class="bi bi-person-circle font-13"></i>
                        <input type="text" class="form-control rounded-xs" id="c1" placeholder="Username" />
                        <label for="c1" class="color-theme">Username</label>
                        <span>(required)</span>
                    </div>
                    <div class="form-custom form-label form-border form-icon mb-4 bg-transparent">
                        <i class="bi bi-asterisk font-13"></i>
                        <input type="password" class="form-control rounded-xs" id="c2" placeholder="Password" />
                        <label for="c2" class="color-theme">Password</label>
                        <span>(required)</span>
                    </div>
                    <div class="form-check form-check-custom">
                        <input class="form-check-input" type="checkbox" name="type" value id="c2a">
                        <label class="form-check-label font-12" for="c2a">Remember this account</label>
                        <i class="is-checked color-highlight font-13 bi bi-check-circle-fill"></i>
                        <i class="is-unchecked color-highlight font-13 bi bi-circle"></i>
                    </div>
                    <a href="" class="btn btn-full gradient-highlight shadow-bg shadow-bg-s mt-4">SIGN IN</a>
                    <div class="row">
                        <div class="col-6 text-start">
                            <a href="page-forgot-1.html" class="font-11 color-theme opacity-40 pt-4 d-block">Forgot
                                Password?</a>
                        </div>
                        <div class="col-6 text-end">
                            <a href="page-signup-1.html" class="font-11 color-theme opacity-40 pt-4 d-block">Create
                                Account</a>
                        </div>
                    </div>
                </div>
                <div class="card-overlay rounded-0 m-0 bg-black opacity-70"></div>
            </div>
        </div>
    </div>
    <script src="{!! asset('mobile/scripts/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('mobile/scripts/custom.js') !!}"></script>
</body>
