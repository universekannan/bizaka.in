@extends('layouts.app')
@section('content')
<div class="container-fluid">
 <div class="row mb-2">
    <div class="col-sm-6">
       <h1 class="m-0"></h1>
   </div>
</div> 
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $members }}</h3>
                        <p> Members</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon nav-icon fas fa-user-graduate"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-righ"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection