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
                                data-toggle="modal" data-target="#addmember"><i class="fa fa-plus"> Add </i></button>
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
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Referral ID</th>
                                            <th>Phone</th>
                                            <th>Wallet Amount</th>
                                            @if (Auth::user()->id == 1)
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
                                                <td>{{ $memberslist->id }}</td>
                                                <td>{{ $memberslist->name }}</td>
                                                <td>{{ $memberslist->referral_id }}</td>
                                                <td>{{ $memberslist->phone }}</td>
                                                <td>{{ $memberslist->wallet }}</td>
                                                @if (Auth::user()->id == 1)
                                                    <td>{{ $memberslist->plain_password }}</td>
                                                @endif
                                                @if ($memberslist->status == 1)
                                                    <td class="text-success">Active</td>
                                                @else
                                                    <td class="text-danger">Inactive</td>
                                                @endif
                                                <td style="white-space: nowrap">
                                                    <a onclick="edit_member('{{ $memberslist->id }}','{{ $memberslist->name }}','{{ $memberslist->phone }}','{{ $memberslist->address }}')"
                                                        href="#" class="btn btn-sm btn-primary"><i
                                                            class="fa fa-edit"></i>Edit</a>
                                                    <a onclick="view_member('{{ $memberslist->id }}','{{ $memberslist->name }}','{{ $memberslist->phone }}','{{ $memberslist->email }}','{{ $memberslist->plain_password }}','{{ $memberslist->address }}')"
                                                        href="#" class="btn btn-sm btn-info"><i
                                                            class="fa fa-eye"></i> View</a>
                                                    <a href="{{ route('purchase', $memberslist->id) }}"
                                                        class="btn btn-sm btn-success"><i class="fa fa-arrow-right"></i>
                                                        Purchase</a>
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
                                        <input required="required" type="text" class="form-control" name="name"
                                            id="name" maxlength="30" placeholder="Full Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="parent_id" class="col-sm-4 col-form-label"><span
                                            style="color:red">*</span>Referral ID</label>
                                    <div class="col-sm-8">
                                        <input required="required" type="text" class="form-control" name="parent_id"
                                            id="parent_id" maxlength="30" placeholder="Referral ID">
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
                                            name="phone" id="phone" maxlength="10" placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="email" class="col-sm-4 col-form-label"><span
                                            style="color:red">*</span>Email Id</label>
                                    <div class="col-sm-8">
                                        <input required="required" type="text" class="form-control" name="email"
                                            id="email" maxlength="20" placeholder="Email ..">
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
                                        <textarea required="required" class="form-control" name="address" id="address" maxlength="200" rows="2"
                                            placeholder="Address .."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                                        <input required="required" type="text" class="form-control" name="name"
                                            id="editname" maxlength="30" placeholder="Full Name">
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
                                            name="phone" id="editphone" maxlength="10" placeholder="Phone Number">
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
                                        <textarea required="required" class="form-control" name="address" id="editaddress" maxlength="200" rows="2"
                                            placeholder="Address .."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input class="btn btn-primary" type="submit" value="Submit" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="viewmember">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> View Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>ID </label>
                        <label for="" class="col-sm-8 col-form-label"><span style="color:red"
                                id="id"></span> </label>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Name </label>
                        <label for="" class="col-sm-8 col-form-label"><span style="color:red"
                                id="full_names"></span> </label>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Email
                        </label>
                        <label for="" class="col-sm-8 col-form-label"><span style="color:red"
                                id="emails"></span></label>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Password
                        </label>
                        <label for="" class="col-sm-8 col-form-label"><span style="color:red"
                                id="pas"></span></label>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Phone
                        </label>
                        <label for="" class="col-sm-8 col-form-label"><span style="color:red"
                                id="phones"></span></label>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Address
                        </label>
                        <label for="" class="col-sm-8 col-form-label"><span style="color:red"
                                id="viewaddress"></span></label>
                    </div>
                    <center>
                        <a class="btn btn-info" href="" id="msgbtn" data-action="share/whatsapp/share"
                            target="_blank">Send Whatsapp</a>
                    </center>

                </div>
                <div class="modal-footer justify-content-between">
                    <a type="" class=""></a>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('page_scripts')
    <script>
        function edit_member(id, name, phone, address) {
            $("#member_id").val(id);
            $("#editname").val(name);
            $("#editphone").val(phone);
            $("#editaddress").val(address);
            $("#editmember").modal("show");
        }

        function view_member(id, full_name, phone, email, pas, address) {
            $("#id").text(id);
            $("#full_names").text(full_name);
            $("#emails").text(email);
            $("#pas").text(pas);
            $("#phones").text(phone);
            $("#viewaddress").text(address);
            $('#msgbtn').attr('href', 'https://api.whatsapp.com/send?phone=91' + phone +
                '&text=Sir, We are from Dawn Fish , Your Login UserName : ' + email +', Password : ' + pas +
                ', Contact Us : Mobile 12345678 Email : info@bizaka.com, Website : www.bizaka.in. I have attached your Login website  link below https://erp.bizaka.in/walletlogin'
            )
            $("#viewmember").modal("show");
        }
    </script>
@endpush
