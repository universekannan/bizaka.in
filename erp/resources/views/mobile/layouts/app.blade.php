<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>PayApp - Finance, Banking, Wallet, Crypto Mobile PWA</title>
    <link rel="stylesheet" type="text/css" href="{!! asset('mobile/styles/bootstrap.css') !!}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    {{--    <link rel="stylesheet" type="text/css" href="{!! asset('mobile/fonts/bootstrap-icons.css') !!}"> --}}
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@500;600;700&amp;family=Roboto:wght@400;500;700&amp;display=swap"
        rel="stylesheet">
    <link rel="manifest" href="{!! asset('_manifest.json') !!}">
    <meta id="theme-check" name="theme-color" content="#FFFFFF">
    <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('mobile/app/icons/icon-192x192.html') !!}">
</head>

<body class="theme-light">
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>
    <div id="page">

        <div id="footer-bar" class="footer-bar-1 footer-bar-detached">
            <a href="page-wallet.html"><i class="bi bi-wallet2"></i><span>Cards</span></a>
            <a href="page-activity.html"><i class="bi bi-graph-up"></i><span>Activity</span></a>
            <a href="index-waves.html" class="circle-nav-2"><i class="bi bi-house-fill"></i><span>Home</span></a>
            <a href="page-payments.html"><i class="bi bi-receipt"></i><span>Payments</span></a>
            <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-sidebar"><i
                    class="bi bi-three-dots"></i><span>More</span></a>

        </div>
        <div id="menu-sidebar" data-menu-active="nav-welcome"
            class="offcanvas offcanvas-start offcanvas-detached rounded-m">

            <!-- menu-size will be the dimension of your menu. If you set it to smaller than your content it will scroll-->
            <div class="menu-size" style="width:230px;">
                <!-- Menu Title-->
                <div class="pt-3">
                    <div class="page-title sidebar-title d-flex">
                        <div class="align-self-center me-auto">
                            <p class="color-highlight">Welcome Back</p>
                            <h1>Enabled</h1>
                        </div>
                        <div class="align-self-center ms-auto">
                            <a href="#" data-bs-toggle="dropdown"
                                class="icon gradient-blue shadow-bg shadow-bg-s rounded-m">
                                <img src="images/pictures/25s.jpg" width="45" class="rounded-m" alt="img">
                            </a>
                            <!-- Menu Title Dropdown Menu-->
                            <div class="dropdown-menu">
                                <div class="card card-style shadow-m mt-1 me-1">
                                    <div
                                        class="list-group list-custom list-group-s list-group-flush rounded-xs px-3 py-1">
                                        <a href="#" class="list-group-item">
                                            <i
                                                class="has-bg gradient-green shadow-bg shadow-bg-xs color-white rounded-xs bi bi-credit-card"></i>
                                            <strong class="font-13">Wallet</strong>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i
                                                class="has-bg gradient-blue shadow-bg shadow-bg-xs color-white rounded-xs bi bi-graph-up"></i>
                                            <strong class="font-13">Activity</strong>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <i
                                                class="has-bg gradient-yellow shadow-bg shadow-bg-xs color-white rounded-xs bi bi-person-circle"></i>
                                            <strong class="font-13">Account</strong>
                                        </a>
                                        <a href="{{ route('walletlogout') }}" class="list-group-item">
                                            <i
                                                class="has-bg gradient-red shadow-bg shadow-bg-xs color-white rounded-xs bi bi-power"></i>
                                            <strong class="font-13">Log Out</strong>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="divider divider-margins mb-3 opacity-50"></div>

                    <!-- Main Menu List-->
                    <div class="list-group list-custom list-menu-large">
                        <a href="index-waves.html" id="nav-welcome" class="list-group-item">
                            <i class="bi bg-red-dark shadow-bg shadow-bg-xs bi-heart-fill"></i>
                            <div>Welcome</div>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                        <a href="pages.html" id="nav-pages" class="list-group-item">
                            <i class="bi bg-green-dark shadow-bg shadow-bg-xs bi-star-fill"></i>
                            <div>Page Packs</div>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                        <a href="#" id="nav-homes" data-submenu="sub1" class="list-group-item">
                            <i class="bi bg-blue-dark shadow-bg shadow-bg-xs bi-house-fill"></i>
                            <div>Home Styles</div>
                            <i class="bi bi-plus font-18"></i>
                        </a>
                        <div class="list-submenu" id="sub1">
                            <a href="index-waves.html" id="nav-waves" class="list-group-item">
                                <div class="ps-4">Waves</div>
                                <i class="bi bi-chevron-right"></i>
                            </a>
                            <a href="index.html" id="nav-classic" class="list-group-item">
                                <div class="ps-4">Classic</div>
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                        <a href="components.html" id="nav-comps" class="list-group-item">
                            <i class="bi bg-brown-dark shadow-bg shadow-bg-xs bi-gear-wide-connected"></i>
                            <div>Components</div>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                        <a data-bs-toggle="offcanvas" data-bs-target="#menu-highlights" href="#"
                            class="list-group-item">
                            <i class="bi bg-magenta-dark shadow-bg shadow-bg-xs bi-droplet"></i>
                            <div>Color Theme</div>
                            <i class="bi bi-chevron-right"></i>
                        </a>

                        <a href="#" class="list-group-item" data-toggle-theme data-trigger-switch="switch-1">
                            <i class="bi bg-yellow-dark shadow-bg shadow-bg-xs bi-lightbulb-fill"></i>
                            <div>Dark Mode</div>
                            <div class="form-switch ios-switch switch-green switch-s me-2">
                                <input type="checkbox" data-toggle-theme class="ios-input" id="switch-1">
                                <label class="custom-control-label" for="switch-1"></label>
                            </div>
                        </a>
                    </div>

                    <div class="divider divider-margins mb-3 opacity-50"></div>

                    <!-- Quick Actions Icons-->
                    <div class="content pt-1">
                        <div class="d-flex text-center">
                            <div class="me-auto">
                                <a href="page-payment-transfer.html"
                                    class="icon icon-s rounded-s gradient-red shadow-bg shadow-bg-xs"><i
                                        class="font-16 color-white bi bi-arrow-up"></i></a>
                                <h6 class="font-11 font-400 opacity-70 mb-n1 pt-2">Transfer</h6>
                            </div>
                            <div class="m-auto">
                                <a href="page-payment-request.html"
                                    class="icon icon-s rounded-s gradient-green shadow-bg shadow-bg-xs"><i
                                        class="font-16 color-white bi bi-arrow-down"></i></a>
                                <h6 class="font-11 font-400 opacity-70 mb-n1 pt-2">Request</h6>
                            </div>
                            <div class="ms-auto">
                                <a href="page-payment-exchange.html"
                                    class="icon icon-s rounded-s gradient-blue shadow-bg shadow-bg-xs"><i
                                        class="font-16 color-white bi bi-arrow-left-right"></i></a>
                                <h6 class="font-11 font-400 opacity-70 mb-n1 pt-2">Exchange</h6>
                            </div>
                        </div>
                    </div>


                    <div class="divider divider-margins opacity-50"></div>

                    <!-- Useful Links-->
                    <h6 class="opacity-40 px-3 mt-n2 mb-0">Useful Links</h6>
                    <div class="list-group list-custom list-menu-small">
                        <a href="tel:+1 234 567 8091" class="list-group-item default-link">
                            <i class="bi bi-arrow-up-circle-fill opacity-20 font-16"></i>
                            <div>Support</div>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                        <a href="page-profile.html" class="list-group-item">
                            <i class="bi bi-person-circle opacity-20 font-16"></i>
                            <div>Account</div>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                        <a href="page-signin-1.html" class="list-group-item">
                            <i class="bi bi-bar-chart-fill opacity-20 font-16"></i>
                            <div>Log Out</div>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>

                    <div class="divider divider-margins opacity-50"></div>
                    <!-- Menu Copyright -->
                    <p class="px-3 font-9 opacity-30 color-theme mt-n3">Copyright <span
                            class="copyright-year"></span>. Made with <i
                            class="bi bi-heart-fill color-red-dark px-1"></i> by Enabled</p>
                </div>
            </div>

        </div>
        
            <div class="pt-3">
                <div class="page-title d-flex">
                    <div class="align-self-center me-auto">
                        <p class="color-black opacity-80 header-date"></p>
                        <h1 class="color-black">Welcome</h1>
                    </div>
                    <div class="align-self-center ms-auto">
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-highlights"
                            class="icon bg-white color-theme rounded-m shadow-xl">
                            <i class="bi bi-palette-fill color-black font-16"></i>
                        </a>
                        <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-notifications"
                            class="icon bg-white color-theme rounded-m shadow-xl">
                            <i class="bi bi-bell-fill color-black font-17"></i>
                            <em class="badge bg-red-light color-white scale-box">3</em>
                        </a>
                        <a href="#" data-bs-toggle="dropdown" class="icon rounded-m shadow-xl">
                            <img src="images/pictures/25s.html" width="45" class="rounded-m" alt="img">
                        </a>

                        <div class="dropdown-menu">
                            <div class="card card-style shadow-m mt-1 me-1">
                                <div class="list-group list-custom list-group-s list-group-flush rounded-xs px-3 py-1">
                                    <a href="#" class="list-group-item">
                                        <i
                                            class="has-bg gradient-green shadow-bg shadow-bg-xs color-white rounded-xs bi bi-credit-card"></i>
                                        <strong class="font-13">Wallet</strong>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i
                                            class="has-bg gradient-blue shadow-bg shadow-bg-xs color-white rounded-xs bi bi-graph-up"></i>
                                        <strong class="font-13">Activity</strong>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i
                                            class="has-bg gradient-yellow shadow-bg shadow-bg-xs color-white rounded-xs bi bi-person-circle"></i>
                                        <strong class="font-13">Account</strong>
                                    </a>
                                    <a href="{{ route('walletlogout') }}" class="list-group-item">
                                        <i
                                            class="has-bg gradient-red shadow-bg shadow-bg-xs color-white rounded-xs bi bi-power"></i>
                                        <strong class="font-13">Log Out</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('mobile/content')
        </div>




        @yield('mobile/third_party_scripts')

        <script src="{!! asset('mobile/scripts/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('mobile/scripts/custom.js') !!}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


        @stack('mobile/page_scripts')

        <script>

           $('#amt').on('input', function() {
            var wallet = parseInt($('#bal').val());
            var amt = parseInt($('#amt').val());
            var balance = wallet - amt;
            $('#balance').val(balance);
            if (balance >= 0) {
                $('#sub').prop('disabled', false);
                $("#warn").html("");
            } else {
                $('#sub').prop('disabled', true);
                $("#warn").html('Please enter the amount below ' + wallet);
            }
        });


       </script>
        
</body>

</html>
