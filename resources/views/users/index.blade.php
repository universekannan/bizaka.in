@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Members</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button type="button" class="btn btn-block btn-primary btn-sm"
                        data-toggle="modal" data-target="#addmember" ><i class="fa fa-plus"> Add </i></button>
                    </li>
                </ol>
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
                                    <th>Phone</th>
									@if(Auth::user()->id == 1)
                                    <th>Password</th>
									@endif
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $key => $memberslist)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $memberslist->name }}</td>
                                    <td>{{ $memberslist->phone }}</td>
	                                @if(Auth::user()->id == 1)
                                    <td>{{ $memberslist->plain_password }}</td>
									@endif
                                    @if($memberslist->status == 2)
                                      <td class="text-success">Active</td>
                                      @else
                                      <td class="text-danger">Inactive</td>
                                      @endif
                                    <td>
                                        <a onclick="edit_member('{{ $memberslist->id }}','{{ $memberslist->name }}','{{ $memberslist->phone }}','{{ $memberslist->address }}')"
                                            href="#" class="btn btn-sm btn-primary"><i
                                            class="fa fa-edit"></i>Edit</a>
                                            <a href="{{ route('purchase',$memberslist->id) }}" class="btn btn-sm btn-success"><i
                                                class="fa fa-arrow-right"></i> Purchase</a>
                                        </td>
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
    <div class="modal fade" id="addmember">
        <form action="{{ url('/addmember') }}" method="post">
            {{ csrf_field() }}
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Member</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label"><span
                                        style="color:red">*</span>Name</label>
                                        <div class="col-sm-8">
                                            <input required="required" type="text" class="form-control"
                                            name="name" id="name" maxlength="30"
                                            placeholder="Full Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-4 col-form-label"><span
                                            style="color:red">*</span>Phone</label>
                                            <div class="col-sm-8">
                                                <input required="required" type="text" class="form-control number"
                                                name="phone" id="phone" maxlength="10"
                                                placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="referral" class="col-sm-4 col-form-label"><span
                                                style="color:red">*</span>Referral Id</label>
                                                <div class="col-sm-8">
                                                    <input required="required" type="text" class="form-control"
                                                    name="referral" id="referral" maxlength="20"
                                                    placeholder="Referral ..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-4 col-form-label"><span
                                                    style="color:red">*</span>Address</label>
                                                    <div class="col-sm-8">
                                                        <textarea required="required" class="form-control"
                                                        name="address" id="address" maxlength="200" rows="2"
                                                        placeholder="Address .."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                        data-dismiss="modal">Close</button>
                                        <input class="btn btn-primary" type="submit" value="Submit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>   

                <div class="modal fade" id="editmember">
                    <form action="{{ url('/updatemember') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="member_id">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Member</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-4 col-form-label"><span
                                                    style="color:red">*</span>Name</label>
                                                    <div class="col-sm-8">
                                                        <input required="required" type="text" class="form-control"
                                                        name="name" id="editname" maxlength="30"
                                                        placeholder="Full Name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="phone" class="col-sm-4 col-form-label"><span
                                                        style="color:red">*</span>Phone</label>
                                                        <div class="col-sm-8">
                                                            <input required="required" type="text" class="form-control number"
                                                            name="phone" id="editphone" maxlength="10"
                                                            placeholder="Phone Number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-4 col-form-label"><span
                                                    style="color:red">*</span>Address</label>
                                                    <div class="col-sm-8">
                                                        <textarea required="required" class="form-control"
                                                        name="address" id="editaddress" maxlength="200" rows="2"
                                                        placeholder="Address .."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                    <input class="btn btn-primary" type="submit" value="Submit" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form> 
                            </div>   

                            @endsection
                            @push('page_scripts')
                            <script>
                                function edit_member(id,name,phone,address) {
                                    $("#member_id").val(id);
                                    $("#editname").val(name);
                                    $("#editphone").val(phone);
                                    $("#editaddress").val(address);
                                    $("#editmember").modal("show");
                                }
                            </script>
                            @endpush