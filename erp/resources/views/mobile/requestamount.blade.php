@extends('mobile/layouts.app')
@section('mobile/content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Request</h3>
                </div>
                <!-- /.card-header -->
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
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width:15%">S No</th>
                                    <th style="width:15%">To</th>
                                    <th style="width:35%">Amount</th>
                                    <th style="width:15%">Date</th>
                                    <th style="width:20%">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paymentrequest as $key => $payreq)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $payreq->to_id }} , {{ $payreq->name }}</td>
                                        <td>{{ $payreq->amount }}</td>
                                        <td>{{ $payreq->req_time }}</td>
                                        @if (Auth::user()->id == $payreq->from_id || $payreq->status == 'Approved')
                                            <td>{{ $payreq->status }}</td>
                                        @elseif(Auth::user()->id == $payreq->to_id)
                                            @if (Auth::user()->wallet < $payreq->amount)
                                                <td><a class="btn btn-info" href="#"
                                                        onclick="reqamount('{{ $payreq->id }}','{{ $payreq->amount }}','{{ $payreq->from_id }}','{{ $payreq->req_image }}')">Request</a>
                                                </td>
                                            @else
                                                <td><a class="btn btn-success"
                                                        onclick="appove_requestamount('{{ $payreq->id }}','{{ $payreq->from_id }}','{{ $payreq->amount }}','{{ $payreq->req_image }}')"
                                                        href="#">Activate</a></td>
                                            @endif
                                        @else
                                            <td>{{ $payreq->status }}</td>
                                        @endif

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade" id="Request">
            <form onsubmit="return validateamount()" action="{{ url('paymentrequest') }}" method="post"
                enctype="multipart/form-data">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Request Amount</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <center>
                                @foreach ($referencedata as $key => $referencedatas)
                                    {{ $referencedatas->name }}</br>
                                    {{ $referencedatas->phone }}</br>
                                    {{ $referencedatas->upi }}</br>
                                    <img style="width:200px"
                                        src="{{ URL::to('/') }}/upload/qrcodeimg/{{ $referencedatas->payment_qr_oode }}" />
                                    <input type="hidden" name="to_id" value="{{ $referencedatas->id }}">
                                @endforeach
                            </center>

                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="" class="col-sm-12 col-form-label"><span
                                        style="color:red"></span>Request
                                    Amount</label>
                                <input type="text" class="form-control" name="amount" placeholder='Enter Request Amount'
                                    required="required">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-12 col-form-label"><span style="color:red"></span>Paid
                                    Image(ScreenShot)</label>
                                <div class="custom-file">
                                    <input accept="image/png,image/jpeg,image/jpg" type="file" class="custom-file-input"
                                        name="req_image" required="required">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type='submit' id='plansubmit' class='btn btn-primary'>Request Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>
@endsection
