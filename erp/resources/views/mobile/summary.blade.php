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
        @foreach($inpayment as $in)
    <a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-1">
    <div class="align-self-center">
    <span class="icon gradient-red me-2 shadow-bg shadow-bg-s rounded-s">
    </span>
    </div>
    <div class="align-self-center ps-1">
    <h5 class="pt-1 mb-n1">{{ $in->name_from }}</h5>
    <p class="mb-0 font-11 opacity-70">{{ $in->paydate }}</p>
    </div>
    <div class="align-self-center ms-auto text-end">
    <h4 class="pt-1 mb-n1 color-green-dark">{{ $in->amount }} Z</h4>
    <p class="mb-0 font-11"> Received</p>
    </div>
    </a>
    @endforeach
    <div class="divider my-2 opacity-50"></div>
    </div>
    
    <div class="collapse" id="tab-5" data-bs-parent="#tab-group-2">
        @foreach($outpayment as $out)
    <a href="#" class="d-flex py-1" data-bs-toggle="offcanvas" data-bs-target="#menu-activity-1">
    <div class="align-self-center">
    <span class="icon gradient-yellow me-2 shadow-bg shadow-bg-xs rounded-s">
    </div>
    <div class="align-self-center ps-1">
    <h5 class="pt-1 mb-n1">{{ $out->name_to }}</h5>
    <p class="mb-0 font-11 opacity-70">{{ $out->paydate }}</p>
    </div>
    <div class="align-self-center ms-auto text-end">
    <h4 class="pt-1 mb-n1 color-red-dark">{{ $out->amount }} Z</h4>
    <p class="mb-0 font-11">Out Payment</p>
    </div>
    </a>
    @endforeach
    <div class="divider my-2 opacity-50"></div>
    </div>
    
    </div>
    </div>
    </div>
    </div>
@endsection
