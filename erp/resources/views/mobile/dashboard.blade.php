@extends('mobile/layouts.app')
@section('mobile/content')


            <svg id="header-deco" viewBox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg"
                class="transition duration-300 ease-in-out delay-150">
                <path id="header-deco-1"
                    d="M 0,600 C 0,600 0,120 0,120 C 92.36363636363635,133.79904306220095 184.7272727272727,147.59808612440193 287,148 C 389.2727272727273,148.40191387559807 501.4545454545455,135.40669856459328 592,129 C 682.5454545454545,122.5933014354067 751.4545454545455,122.77511961722489 848,115 C 944.5454545454545,107.22488038277511 1068.7272727272727,91.49282296650718 1172,91 C 1275.2727272727273,90.50717703349282 1357.6363636363635,105.25358851674642 1440,120 C 1440,120 1440,600 1440,600 Z">
                </path>
                <path id="header-deco-2"
                    d="M 0,600 C 0,600 0,240 0,240 C 98.97607655502392,258.2105263157895 197.95215311004785,276.4210526315789 278,282 C 358.04784688995215,287.5789473684211 419.16746411483257,280.5263157894737 524,265 C 628.8325358851674,249.4736842105263 777.377990430622,225.47368421052633 888,211 C 998.622009569378,196.52631578947367 1071.3205741626793,191.57894736842107 1157,198 C 1242.6794258373207,204.42105263157893 1341.3397129186603,222.21052631578948 1440,240 C 1440,240 1440,600 1440,600 Z">
                </path>
                <path id="header-deco-3"
                    d="M 0,600 C 0,600 0,360 0,360 C 65.43540669856458,339.55023923444975 130.87081339712915,319.1004784688995 245,321 C 359.12918660287085,322.8995215311005 521.9521531100479,347.1483253588517 616,352 C 710.0478468899521,356.8516746411483 735.3205741626795,342.3062200956938 822,333 C 908.6794258373205,323.6937799043062 1056.7655502392345,319.62679425837325 1170,325 C 1283.2344497607655,330.37320574162675 1361.6172248803828,345.1866028708134 1440,360 C 1440,360 1440,600 1440,600 Z">
                </path>
                <path id="header-deco-4"
                    d="M 0,600 C 0,600 0,480 0,480 C 70.90909090909093,494.91866028708137 141.81818181818187,509.8373205741627 239,499 C 336.18181818181813,488.1626794258373 459.6363636363636,451.5693779904306 567,446 C 674.3636363636364,440.4306220095694 765.6363636363636,465.88516746411483 862,465 C 958.3636363636364,464.11483253588517 1059.8181818181818,436.8899521531101 1157,435 C 1254.1818181818182,433.1100478468899 1347.090909090909,456.555023923445 1440,480 C 1440,480 1440,600 1440,600 Z">
                </path>
            </svg>

            <div class="splide single-slider slider-no-dots slider-no-arrows slider-visible" id="single-slider-1">
                <div class="splide__track">
                    <div class="splide__list">

                        <div class="splide__slide">
                            <div class="card card-style m-0 bg-5 shadow-card shadow-card-m" style="height:200px">
                                <div class="card-top p-3">
                                    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-card-more"
                                        class="icon icon-xxs bg-white color-black float-end"><i
                                            class="bi bi-three-dots font-18"></i></a>
                                </div>
                                <div class="card-center">
                                    <div class="bg-theme px-3 py-2 rounded-end d-inline-block">
                                        <h1 class="font-13 my-n1">
                                            <a class="color-theme" data-bs-toggle="collapse" href="#balance3"
                                                aria-controls="balance2">Click for Balance</a>
                                        </h1>
                                        <div class="collapse" id="balance3">
                                            <h2 class="color-theme font-26">{{ Auth::user()->wallet }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <strong class="card-top no-click font-12 p-3 color-white font-monospace">Main
                                    Account</strong>
                                <strong class="card-bottom no-click p-3 font-12 text-start color-white font-monospace">1234
                                    5678 1234 5661</strong>
                                <strong class="card-bottom no-click p-3 font-12 text-end color-white font-monospace">08 /
                                    25</strong>
                                <div class="card-overlay bg-black opacity-50"></div>
                            </div>
                        </div>

                        <div class="splide__slide">
                            <div class="card card-style m-0 bg-9 shadow-card shadow-card-m" style="height:200px">
                                <div class="card-top p-3">
                                    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-card-more"
                                        class="icon icon-xxs bg-white color-black float-end"><i
                                            class="bi bi-three-dots font-18"></i></a>
                                </div>
                                <div class="card-center">
                                    <div class="bg-theme px-3 py-2 rounded-end d-inline-block">
                                        <h1 class="font-13 my-n1">
                                            <a class="color-theme" data-bs-toggle="collapse" href="#balance1"
                                                aria-controls="balance1">Click for Balance</a>
                                        </h1>
                                        <div class="collapse" id="balance1">
                                            <h2 class="color-theme font-26">$65,500</h2>
                                        </div>
                                    </div>
                                </div>
                                <strong class="card-top no-click font-12 p-3 color-white font-monospace">Company
                                    Account</strong>
                                <strong class="card-bottom no-click p-3 font-12 text-start color-white font-monospace">1234
                                    5678 1234 5661</strong>
                                <strong class="card-bottom no-click p-3 font-12 text-end color-white font-monospace">08 /
                                    25</strong>
                                <div class="card-overlay bg-black opacity-50"></div>
                            </div>
                        </div>

                        <div class="splide__slide">
                            <div class="card card-style m-0 bg-7 shadow-card shadow-card-m" style="height:200px">
                                <div class="card-top p-3">
                                    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-card-more"
                                        class="icon icon-xxs bg-white color-black float-end"><i
                                            class="bi bi-three-dots font-18"></i></a>
                                </div>
                                <div class="card-center">
                                    <div class="bg-theme px-3 py-2 rounded-end d-inline-block">
                                        <h1 class="font-13 my-n1">
                                            <a class="color-theme" data-bs-toggle="collapse" href="#balance2"
                                                aria-controls="balance2">Click for Balance</a>
                                        </h1>
                                        <div class="collapse" id="balance2">
                                            <h2 class="color-theme font-26">$15,100</h2>
                                        </div>
                                    </div>
                                </div>
                                <strong class="card-top no-click font-12 p-3 color-white font-monospace">Savings
                                    Account</strong>
                                <strong class="card-bottom no-click p-3 font-12 text-start color-white font-monospace">1234
                                    5678 1234 5661</strong>
                                <strong class="card-bottom no-click p-3 font-12 text-end color-white font-monospace">08 /
                                    25</strong>
                                <div class="card-overlay bg-black opacity-50"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissable" style="margin: 15px;">
                <a href="#" style="color:white !important" class="close" data-dismiss="alert"
                    aria-label="close">&times;</a>
                <strong> {{ session('success') }} </strong>
            </div>
        @endif
            <div class="content py-2">
                <div class="d-flex text-center">
                    <div class="me-auto">
                        
<a href="{{ route('summary') }}" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-green-dark bi bi-arrow-up-circle"></i></a>
<h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Summary</h6>
</div>
<div class="m-auto">
<a href="{{ route('withdrawal') }}" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-red-dark bi bi-arrow-down-circle"></i></a>
<h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Withdrawal</h6>
</div>
<div class="m-auto">
<a href="{{ route('passwordchange') }}" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-red-dark bi bi-lock"></i></a>
<h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Change Password</h6>
</div>
<div class="ms-auto">
<a href="#" class="icon icon-xxl rounded-m bg-theme shadow-m"><i class="font-28 color-brown-dark bi bi-filter-circle"></i></a>
<h6 class="font-13 opacity-80 font-500 mb-0 pt-2">Bills</h6>
                    </div>
                </div>
            </div>

            <div class="content my-0 mt-n2 px-1">
                <div class="d-flex">
                    <div class="align-self-center">
                        <h3 class="font-16 mb-2">Recent Activity</h3>
                    </div>
                    <div class="align-self-center ms-auto">
                        <a href="{{ route('summary') }}" class="font-12 pt-1">View All</a>
                    </div>
                </div>
            </div>

            <div class="card card-style">
                <div class="content">
                    <a href="#" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-orange shadow-bg shadow-bg-s"><i
                                    class="bi bi-google color-white"></i></span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1">Today Income</h5>
                            <p class="mb-0 font-11 opacity-80">{{ $today }}</p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                            <h4 class="pt-1 mb-n1 color-red-dark">{{ $todays_income }}</h4>
                            <p class="mb-0 font-11">Amount</p>
                        </div>
                    </a>
                    <div class="divider my-2 opacity-50"></div>
                    <a href="#" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-green shadow-bg shadow-bg-s"><i
                                    class="bi bi-caret-up-fill color-white"></i></span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1">Total Income</h5>
                            <p class="mb-0 font-11 opacity-80"><span class="copyright-year"></span></p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                            <h4 class="pt-1 mb-n1 color-blue-dark">{{ $total_income }}</h4>
                            <p class="mb-0 font-11">Amount</p>
                        </div>
                    </a>
                    <div class="divider my-2 opacity-50"></div>
                    <a href="#" class="d-flex py-1">
                        <div class="align-self-center">
                            <span class="icon rounded-s me-2 gradient-yellow shadow-bg shadow-bg-s"><i
                                    class="bi bi-pie-chart-fill color-white"></i></span>
                        </div>
                        <div class="align-self-center ps-1">
                            <h5 class="pt-1 mb-n1">Total Withdrawal</h5>
                            <p class="mb-0 font-11 opacity-80"><span class="copyright-year"></span></p>
                        </div>
                        <div class="align-self-center ms-auto text-end">
                            <h4 class="pt-1 mb-n1 color-green-dark">{{ $withdrawal_income }}</h4>
                            <p class="mb-0 font-11">Amount</p>
                        </div>
                    </a>
                </div>
            </div>
      
@endsection
