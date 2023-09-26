<header>
<div class="pt-3">
    <div class="page-title d-flex">
    <div class="align-self-center me-auto">
    <p class="color-white opacity-80 header-date"></p>
    <h1 class="color-white">Welcome</h1>
    </div>
    <div class="align-self-center ms-auto">
    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-highlights" class="icon bg-white color-theme rounded-m shadow-xl">
    <i class="bi bi-palette-fill color-black font-16"></i>
    </a>
    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#menu-notifications" class="icon bg-white color-theme rounded-m shadow-xl">
    <i class="bi bi-bell-fill color-black font-17"></i>
    <em class="badge bg-red-light color-white scale-box">3</em>
    </a>
    <a href="#" data-bs-toggle="dropdown" class="icon rounded-m shadow-xl">
    <img src="{!! asset('mobile/images/pictures/3.jpg') !!}" width="45" class="rounded-m" alt="img">
    </a>
    
    <div class="dropdown-menu">
    <div class="card card-style shadow-m mt-1 me-1">
    <div class="list-group list-custom list-group-s list-group-flush rounded-xs px-3 py-1">
    <a href="page-wallet.html" class="list-group-item">
    <i class="has-bg gradient-green shadow-bg shadow-bg-xs color-white rounded-xs bi bi-credit-card"></i>
    <strong class="font-13">Wallet</strong>
    </a>
    <a href="page-activity.html" class="list-group-item">
    <i class="has-bg gradient-blue shadow-bg shadow-bg-xs color-white rounded-xs bi bi-graph-up"></i>
    <strong class="font-13">Activity</strong>
    </a>
    <a href="page-profile.html" class="list-group-item">
    <i class="has-bg gradient-yellow shadow-bg shadow-bg-xs color-white rounded-xs bi bi-person-circle"></i>
    <strong class="font-13">Account</strong>
    </a>
    <a href="#" class="list-group-item"
    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
  </form>
    <i class="has-bg gradient-red shadow-bg shadow-bg-xs color-white rounded-xs bi bi-power"></i>
    <strong class="font-13">Log Out</strong>
    </a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</header>