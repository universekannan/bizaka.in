@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Purchase List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><button type="button" class="btn btn-block btn-primary btn-sm"
                        data-toggle="modal" data-target="#addproducts" ><i class="fa fa-plus"> Add </i></button>
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
                                        <th>Purchase Date</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $key => $purchase)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $purchase->purchase_date }}</td>
                                        <td>{{ $purchase->amount }}</td>
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
<div class="modal fade" id="addproducts">
    <form action="{{ url('/addproduct') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Purchase</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <input type="hidden" value="{{ $id }}" name="member_id"> 
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="amount" class="col-sm-4 col-form-label"><span
                                style="color:red">*</span>Amount</label>
                                <div class="col-sm-8">
                                    <input required="required" type="text" class="form-control number"
                                    name="amount" id="amount" maxlength="10"
                                    placeholder="Amount">
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
    
</script>
@endpush