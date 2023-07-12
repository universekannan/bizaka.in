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
                                        
                                        @if (Auth::user()->id == 1)
                                           
                                        @else
                                            <a href="" data-toggle="modal" data-target="#Withdrawal "
                                                class="btn btn-primary float-sm-right" title="Withdrawal Amound Request  "><i
                                                    class="fas fa-plus"> Withdrawal </i> </a>
                                        @endif
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
                  <th style="width:35%">Amount</th>
                  <th style="width:15%">Date</th>
                  <th style="width:20%">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($withdrawal as $key => $withd)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $withd->amount }}</td>
                  <td>{{ $withd->req_time}}</td>
                  <td>{{ $withd->status }}</td>
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
 <div class="modal fade" id="Withdrawal">
        <div class="modal-dialog">
            <form method="post" action="{{ url('saverequest') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Withdrawal Request </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
				    <div class="form-group row">
                        <label for="" class="col-sm-12 col-form-label"><span
                                style="color:red"></span>Wallet</label>
                        <input value="{{ Auth::user()->wallet }}" type="text" class="form-control" name="wallet" id="wallet" readonly>
                    </div>
                    @if (Auth::user()->wallet > 0)
                        <div class='form-group row'>
                            <label for='transfer_payment' class='col-sm-12 col-form-label'><span
                                    style='color:red'></span>Withdrawal Amount</label>
                            <input maxlength="7" required='requiered' type='text' class='form-control number'
                                id="amount" name='amount' placeholder='Enter Amount'>
                        </div>
                        <div class='form-group row'>
                            <label for='balance' class='col-sm-12 col-form-label'><span
                                    style='color:red'></span>Balance</label>
                            <input readonly required='requiered' type='text' class='form-control' id="balance"  name='balance'>
                        </div>
                    @endif
                </div>
                 <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    @if (Auth::user()->wallet > 0)
                        <input value="Submit" id="submitbutton" type='submit' class='btn btn-primary' />
                    @endif
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@push('page_scripts')
<script>
    $('#amount').on('input', function() {
        var wallet = parseInt($('#wallet').val());
        var amt = parseInt($('#amount').val());
        var balance = wallet - amt;
        $('#balance').val(balance);
        if(balance >= 0){
            $('#submitbutton').prop('disabled', false);
        }else{
            $('#submitbutton').prop('disabled', true);
        }
    });
</script>
@endpush
