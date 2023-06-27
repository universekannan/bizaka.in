@extends('layouts.app')
@section('content')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            @if(Auth::user()->user_type_id == 1) 
            <h1>Primary Users</h1>
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
                  <h3 class="card-title">View Primary Users Details</h3>
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
                          <th> S No</th>
						  <th> District</th>
						  <th> Full Name</th>
						  <th> Email</th>
						  <th> Phone</th>
						  <th> Status</th>
                          <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($primaryusers as $key=>$primaryuserslist)
                        <tr>
                           <td>{{ $key + 1 }}</td>
                           <td>{{ $primaryuserslist->district_name }}</td>
                           <td>{{ $primaryuserslist->full_name }}</td>
                           <td>{{ $primaryuserslist->email }}</td>
                           <td>{{ $primaryuserslist->phone }}</td>
                           <td>{{ $primaryuserslist->status }}</td>
                           <td>
                              <div class="btn-group">
                                 <button type="button" class="btn btn-default">Action</button>
                                 <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                 <span class="sr-only">Toggle Dropdown</span>
                                 </button>
                                 <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="{{ url('/edituser', $primaryuserslist->userID) }}">Edit</a>
 <a onclick="userdatas('{{ $primaryuserslist->id }}','{{ $primaryuserslist->full_name }}','{{ $primaryuserslist->profile_photo }}','{{ $primaryuserslist->username }}','{{ $primaryuserslist->district_name }}','{{ $primaryuserslist->email }}','{{ $primaryuserslist->pas }}','{{ $primaryuserslist->phone }}','{{ $primaryuserslist->status }}')" type="button" class="dropdown-item"> View</a>                                    <a class="dropdown-item" href="">Status</a>
                                    <a class="dropdown-item" href=""> User Wallet</a>
                                 </div>
                              </div>
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
<div class="modal fade" id="userdata">
                           <div class="modal-dialog">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title" id="full_name" ></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                
                                    <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>ID </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red" id="id" ></span> </label>
                                    </div>
                                    <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>UserName </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red"  id="username"></span> </label>
                                    </div>
                                    <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>District </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red" id="district_name"></span> </label>
                                    </div>
                                    <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Email </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red" id="emails"></span></label>
                                    </div>
                                    <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Password </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red" id="pas"></span></label>
                                    </div>
                                    <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Phone </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red" id="phones"></span></label>
                                    </div>
                                    <div class="form-group row">
                                       <label for="" class="col-sm-4 col-form-label"><span style="color:red"></span>Status </label>
                                       <label for="" class="col-sm-8 col-form-label"><span style="color:red" id="status"></span> </label>
                                    </div>
                                    <center>
                                    <a class="btn btn-info" href="" id="msgbtn" data-action="share/whatsapp/share" target="_blank">Send Whatsapp</a>
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

    function userdatas(id, full_name,profile_photo,username,district_name,email,pas,phone,status){
        $("#id").text(id);
        $("#full_name").text(full_name);
        $("#profile_photo").text(profile_photo);
        $("#username").text(username);
        $("#district_name").text(district_name);
        $("#emails").text(email);
        $("#pas").text(pas);
        $("#phones").text(phone);
        $("#status").text(status);
        $('#msgbtn').attr('href','https://api.whatsapp.com/send?phone=91'+phone+'&text=Sir, We are from NalaVariyam , Your Login UserName : '+username+', Password : '+pas+', Contact Us : Mobile 7598984380 Email : ramjitrust039@gmail.com, Websit : www.nalavariyam.com. I have attached your Login website  link below https://nalavariyam.com/apps/')
        $("#userdata").modal("show");
    }
</script>
@endpush