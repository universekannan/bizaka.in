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
            <p>Members</p>
          </div>
          <div class="icon">
            <i class="nav-icon nav-icon fas fa-user-graduate"></i>
          </div>
          <a href="#" onclick="send_invitation('{{ Auth::user()->referral_id }}')" class="small-box-footer">Send Invitation<i class="fas fa-arrow-circle-righ"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="referral">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="full_name"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <a class="btn btn-info text-center" id="msgbtn"
          href=""
          data-action="share/whatsapp/share" target="_blank">Send Whatsapp</a>
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
  function send_invitation(ref_id){
    $("#referral").modal("show");
    $('#msgbtn').attr('href','https://api.whatsapp.com/send?text=Sir, We are from Aara Network. Please join us by clicking the link below http://localhost:8000/join/'+referral_id);
    console.log('https://api.whatsapp.com/send?text=Sir, We are from Aara Network. Please join us by clicking the link below http://localhost:8000/join/'+ref_id);
  }
 </script>
@endpush