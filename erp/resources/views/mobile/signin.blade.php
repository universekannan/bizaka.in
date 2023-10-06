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
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>

<body class="theme-light">
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>

    <div id="page">

        <div class="page-content my-0 py-0">
            <div class="card bg-5 card-fixed">
                <form method="post" action="{{ url('/login') }}">
                @csrf
                <div class="card-center mx-3 px-4 py-4 bg-white rounded-m">
                    <h1 class="font-30 font-800 mb-0">PayApp</h1>
                    <p>Login to your Account.</p>
                    <p class="text-center text-danger">{{ session('message') }}</p>
                    <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
                        <i class="bi bi-person-circle font-13"></i>
                        <input type="text" class="form-control rounded-xs" name="email"  value="{{ old('email') }}" placeholder="Username" />
                        <label for="c1" class="color-theme">Username</label>
                        <span>(required)</span>
                    </div>
                    <div class="form-custom form-label form-border form-icon mb-4 bg-transparent">
                        <i class="bi bi-asterisk font-13"></i>
                        <input type="password" class="form-control rounded-xs" name="password" placeholder="Password" />
                        <label for="c2" class="color-theme">Password</label>
                        <span>(required)</span>
                    </div>
                    <div class="form-check form-check-custom">
                        <input class="form-check-input" type="checkbox" name="type" value id="c2a">
                        <label class="form-check-label font-12" for="c2a">Remember this account</label>
                        <i class="is-checked color-highlight font-13 bi bi-check-circle-fill"></i>
                        <i class="is-unchecked color-highlight font-13 bi bi-circle"></i>
                    </div>
                   
                    <input type="submit" value="signin" class="btn btn-full gradient-highlight shadow-bg shadow-bg-s mt-4"/>
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
              </form>
            </div>
        </div>
    </div>
    <script src="{!! asset('mobile/scripts/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('mobile/scripts/custom.js') !!}"></script>
</body>
