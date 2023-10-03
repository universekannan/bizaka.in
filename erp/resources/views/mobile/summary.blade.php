@extends('mobile/layouts.app')
@section('mobile/content')

    <div class="card card-style">
    <div class="content">
    <div class="tabs tabs-pill" id="tab-group-2">
    <div class="tab-controls rounded-m p-1 overflow-visible">
    <a class="font-13 rounded-m shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-4" aria-expanded="true">In Payment</a>
    <a class="font-13 rounded-m shadow-bg shadow-bg-s" data-bs-toggle="collapse" href="#tab-5" aria-expanded="false">Out Payment</a>
    </div>
    <div class="mt-3"></div>
    
    <div class="collapse show" id="tab-4" data-bs-parent="#tab-group-2">
    <a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-1">
    <div class="align-self-center">
    <span class="icon gradient-red me-2 shadow-bg shadow-bg-s rounded-s">
    <img src="images/pictures/6s.jpg" width="45" class="rounded-s" alt="img">
    </span>
    </div>
    <div class="align-self-center ps-1">
    <h5 class="pt-1 mb-n1">Karla Black</h5>
    <p class="mb-0 font-11 opacity-70">12th March <span class="copyright-year"></span></p>
    </div>
    <div class="align-self-center ms-auto text-end">
    <h4 class="pt-1 mb-n1 color-green-dark">$150.55</h4>
    <p class="mb-0 font-11"> Received</p>
    </div>
    </a>
    <div class="divider my-2 opacity-50"></div>
    </div>
    
    <div class="collapse" id="tab-5" data-bs-parent="#tab-group-2">
    <a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-1">
    <div class="align-self-center">
    <span class="icon gradient-yellow me-2 shadow-bg shadow-bg-xs rounded-s">
    <img src="images/pictures/21s.jpg" width="45" class="rounded-s" alt="img"></span>
    </div>
    <div class="align-self-center ps-1">
    <h5 class="pt-1 mb-n1">Jane Doe</h5>
    <p class="mb-0 font-11 opacity-70">12th March <span class="copyright-year"></span></p>
    </div>
    <div class="align-self-center ms-auto text-end">
    <h4 class="pt-1 mb-n1 color-red-dark">$250.00</h4>
    <p class="mb-0 font-11">Transfered</p>
    </div>
    </a>
    <div class="divider my-2 opacity-50"></div>
    </div>
    
    </div>
    </div>
    </div>
    </div>
@endsection
