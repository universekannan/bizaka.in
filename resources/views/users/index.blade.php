@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Members</h1>
            </div>
            <div class="col-sm-6">
                @if($childcount < 5)
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button type="button" class="btn btn-block btn-primary btn-sm"
                        data-toggle="modal" data-target="#addmember" ><i class="fa fa-plus"> Add </i></button>
                    </li>
                </ol>
                @endif
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
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Password</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $key => $m)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $m->name }}</td>
                                    <td>{{ $m->email }}</td>
                                    <td>{{ $m->phone }}</td>
                                    <td>{{ $m->plain_password }}</td>
                                    @if($m->status == 1)
                                    <td>Active</td>
                                    @else
                                    <td>Inactive</td>
                                    @endif
                                    <td>
                                        <a onclick="edit_member('{{ $m->id }}','{{ $m->name }}','{{ $m->phone }}','{{ $m->email }}')"
                                            href="#" class="btn btn-sm btn-primary"><i
                                            class="fa fa-edit"></i>Edit</a>
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
                                            <label for="email" class="col-sm-4 col-form-label"><span
                                                style="color:red">*</span>Email</label>
                                                <div class="col-sm-8">
                                                    <input required="required" type="text" class="form-control"
                                                    name="email" id="email" maxlength="30"
                                                    placeholder="Email">
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
                        <input type="hidden" name="member_id" id="member_id" value="">
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
                                                        <label for="email" class="col-sm-4 col-form-label"><span
                                                            style="color:red">*</span>Email</label>
                                                            <div class="col-sm-8">
                                                                <input required="required" type="text" class="form-control"
                                                                name="email" id="editemail" maxlength="30"
                                                                placeholder="Email">
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
                                function edit_member(id,name,phone,email) {
                                    $("#member_id").val(id);
                                    $("#editname").val(name);
                                    $("#editphone").val(phone);
                                    $("#editemail").val(email);
                                    $("#editmember").modal("show");
                                }
                            </script>
                            @endpush