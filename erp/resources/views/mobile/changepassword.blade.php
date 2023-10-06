@extends('mobile/layouts.app')
@section('mobile/content')


<div class="card card-style">
    <div class="content">
    <h1 class="mb-0 pt-2">Forgot</h1>
    <p>
    Recover your Account
    </p>
    <form action="{{ route('passwordupdate') }}" method="post">
        @csrf
       
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissable" style="margin: 15px;">
            <a href="#" style="color:white !important" class="close" data-dismiss="alert"
                aria-label="close">&times;</a>
            <strong> {{ session('error') }} </strong>
        </div>
    @endif
    <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
    <i class="bi bi-lock font-16"></i>
    <input type="text" class="form-control rounded-xs" id="c1" name="oldpassword" required placeholder="Old Password" />
    <label for="c1" class="color-theme">Old Password</label>
    <span>(required)</span>
    </div>
    <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
        <i class="bi bi-lock font-16"></i>
        <input type="text" class="form-control rounded-xs" name="new_password"  required id="c2" placeholder="New Password" />
        <label for="c2" class="color-theme">New Password</label>
        <span>(required)</span>
        </div>
        <div class="form-custom form-label form-border form-icon mb-3 bg-transparent">
            <i class="bi bi-lock font-16"></i>
            <input type="text" class="form-control rounded-xs" name="confirm_password" required id="c3" placeholder="Confirm Password" />
            <label for="c3" class="color-theme">Confirm Password</label>
            <span>(required)</span>
            </div>
    <input type="submit" value="Update Password" class="btn btn-full gradient-highlight shadow-bg shadow-bg-s mt-4">
    </form>
    </div>
    </div>
    </div>









@endsection