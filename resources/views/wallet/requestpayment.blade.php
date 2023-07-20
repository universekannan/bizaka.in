@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Withdrawal Request</h1>
                </div>
                <div class="col-sm-6">
                    
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

                    <table id="example1" class="table table-bordered table-striped">
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
                                    <td>{{ $payreq->to_id }}</td>
                                    <td>{{ $payreq->amount }}</td>
                                    <td>{{ $payreq->req_time }}</td>
                                    <td>{{ $payreq->status }} &nbsp;

                                        </td>
        
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
   
@endsection
@push('page_scripts')
    <script>
        $('#amount').on('input', function() {
            var wallet = parseInt($('#wallet').val());
            var amt = parseInt($('#amount').val());
            var balance = wallet - amt;
            $('#balance').val(balance);
            if (balance >= 0) {
                $('#submitbutton').prop('disabled', false);
            } else {
                $('#submitbutton').prop('disabled', true);
            }
        });

        function appove_withdrawal(id, user_id, name, amount, upi, qr_code) {
            $("#appruserid").val(user_id);
            $("#apprname").val(name);
            $("#appramt").val(amount);
            $("#apprupi").val(upi);
            $('#apprid').val(id);
            $("#apprqrcode").attr("src", "../uploads/qrcodeimg/" + qr_code);
            $("#approve").modal("show");
        }

        function complete_withdraw(pay_image) {
            $("#compqrcode").attr("src", "../uploads/paidimg/" + pay_image);
            $("#complete").modal("show");
        }
    </script>
@endpush
