@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Withdrawal Request</h1>
                </div>
                <div class="col-sm-6">
                    <ol class=" float-sm-right">

                     
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Request</h3>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:15%">S No</th>
                                <th style="width:15%">Name</th>
                                <th style="width:15%">Amount</th>
                                <th style="width:15%">Date</th>
                                <th style="width:20%">Status</th>
                               <th style="width:20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdrawal as $key => $withd)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $withd->name }}</td>
                                    <td>{{ $withd->amount }}</td>
                                    <td>{{ $withd->req_time }}</td>
                                    <td>{{ $withd->status }}</td>
                                    @if (Auth::user()->id == 1)
                                        <td><a onclick="appove_withdrawal('{{ $withd->id }}','{{ $withd->user_id }}','{{ $withd->name }}','{{ $withd->amount }}')"
                                                href="#" class="btn btn-sm btn-primary"><i
                                                    class="fa fa-eye"></i>Approve</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        </div>
    </section>
    </div>
    

    <div class="modal fade" id="approve" tabindex="-1" aria-hidden="true">
        <form action="{{ url('/confirmwithdrawal') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollable">Confirm Withdrawal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="approve_id" id="apprid">
                                <input type="hidden" name="user_id" id="appruserid">
                                <div class="form-group row">
                                    <label for="class_name" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input readonly class="form-control no-border" id="apprname" style="border: 0">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="class_name" class="col-sm-4 col-form-label">Amount</label>
                                    <div class="col-sm-8">
                                        <input readonly name="amount" class="form-control no-border" id="appramt" style="border: 0">
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
        </form>
    </div>
@endsection
@push('page_scripts')
    <script>


        function appove_withdrawal(id, user_id, name, amount) {
            $("#appruserid").val(user_id);
            $("#apprname").val(name);
            $("#appramt").val(amount);
            $('#apprid').val(id);
            $("#approve").modal("show");
        }

    </script>
@endpush
