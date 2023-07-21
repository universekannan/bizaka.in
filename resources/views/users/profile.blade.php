@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Profie</h3>
                        </div>
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissable" style="margin: 15px;">
                                    <a href="#" style="color:white !important" class="close" data-dismiss="alert"
                                        aria-label="close">&times;</a>
                                    <strong> {{ session('success') }} </strong>
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissable" style="margin: 15px;">
                                    <a href="#" style="color:white !important" class="close" data-dismiss="alert"
                                        aria-label="close">&times;</a>
                                    <strong> {{ session('error') }} </strong>
                                </div>
                            @endif
                            @foreach ($profile as $pro)
                                <form action="{{ url('/updateprofile') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $pro->id }}" />
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-4 col-form-label"><span
                                                        style="color:red"></span>Full Name</label>
                                                <div class="col-sm-8">
                                                    <input required="requiered" type="text" class="form-control"
                                                        name="name" id="name" maxlength="50"
                                                        placeholder="Full Name" value="{{ $pro->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="aadhar_no" class="col-sm-4 col-form-label"><span
                                                        style="color:red"></span>Aadhaar No</label>
                                                <div class="col-sm-8">
                                                    <input readonly required="requiered" type="text" class="form-control"
                                                        name="aadhar_no" id="aadhar_no" maxlength="50"
                                                        placeholder="Aadhaar No" value="{{ $pro->aadhar_no }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-4 col-form-label"><span
                                                        style="color:red"></span>Mobile Number</label>
                                                <div class="col-sm-8">
                                                    <input required="requiered" type="text" class="form-control"
                                                        name="phone" id="phone" maxlength="50"
                                                        placeholder="Mobile Number" value="{{ $pro->phone }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label"><span
                                                        style="color:red"></span>Email ID</label>
                                                <div class="col-sm-8">
                                                    <input readonly required="requiered" type="text" class="form-control"
                                                        name="email" id="email" maxlength="50" placeholder="Email ID"
                                                        value="{{ $pro->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="gender" class="col-sm-4 col-form-label"><span
                                                        style="color:red"></span>Gender </label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="gender">
                                                        <option>Select</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-4 col-form-label"><span
                                                        style="color:red"></span>Contact Address</label>
                                                <div class="col-sm-8">
                                                    <textarea rows="5" required="requiered" type="text" class="form-control" name="address"
                                                        id="address" maxlength="1000" placeholder="Contact Address">{{ $pro->address }}</textarea>
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                    <label for="payment_qr_oode" class="col-sm-4 col-form-label">
                                                        <span style="color:red"></span>UPI QR</label>
                                                    <div class="col-sm-8">
                                                        <input type="file" name="payment_qr_oode"><br/><br />
                                                        <img style="width:200px" src="{{ URL::to('/') }}/upload/qrcodeimg/{{ $pro->payment_qr_oode }}" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="upi" class="col-sm-4 col-form-label">
                                                        <span style="color:red"></span>UPI ID</label>
                                                    <div class="col-sm-8">
                                                        <input required="requiered" type="text" class="form-control"
                                                            name="upi" id="upi" maxlength="50"
                                                            placeholder="UPI ID" value="{{ $pro->upi }}">
                                                    </div>
                                                </div>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <a href="" class="btn btn-info">Back</a>
                                <input id="save" class="btn btn-info" type="submit" name="submit"
                                    value="Submit" />
                            </div>
                        </div>
                        @endforeach
                      </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
