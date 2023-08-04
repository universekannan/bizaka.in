@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Members</h1>
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
                        <h3 class="card-title"></h3>
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
                        <div class="table-responsive">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
									@if(Auth::user()->id == 1)
                                    <th>Password</th>
									@endif
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todayjoined as $key => $todayjoined)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $todayjoined->name }}</td>
                                    <td>{{ $todayjoined->email }}</td>
                                    <td>{{ $todayjoined->phone }}</td>
	                                @if(Auth::user()->id == 1)
                                    <td>{{ $todayjoined->plain_password }}</td>
									@endif
									@if($todayjoined->status == 1)
									 <td class="text-danger">Inactive</td>
									@elseif($todayjoined->status == 2)
                                      <td class="text-success">Active</td>
									@endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
                        