@include('layouts.header')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.menu')
  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Withdrawal Requests</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">withdrawal Request</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
      
    
    
    
     <div class="card">
            <div class="card-header">
              <h3 class="card-title">New Requests</h3>
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
                  <th style="width:15%">Customer No</th>
                  <th style="width:35%">Description</th>
                  <th style="width:15%">Withdrawal</th>
                  <th style="width:15%">Balance</th>
                  <th style="width:20%">Pay</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($withdrawal as $withd)
                <tr>
                  <td>{{ $withd->uniqueId }}</td>
                  <td>{{ $withd->description }}</td>
                  <td>{{ $withd->youWillGet }}</td>
                  <td>{{ $withd->newBalance }}</td>
                  <td>
              <a class="btn btn-primary btn-sm paynow" style="color:#ffffff;" data-withdrawalid="{{ $withd->id }}" data-uniqueid="{{ $withd->uniqueId }}" data-transactionAmount="{{ $withd->youWillGet }}" data-toggle="modal" data-target="#modal-popup">
                Pay Now <i class="fas fa-arrow-circle-right"></i>
              </a>
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

  <div class="modal fade" id="modal-popup">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pay Now</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="validatepin">
          <form method="post" action="{{ route('transactions') }}">
            @csrf

                                        <div class="form-group">
                                            <label for="uniqueId">Unique Id *</label>
                                            <input type="text" class="form-control"  required="required" name="uniqueId" placeholder="Unique Id" id="uniqueId" readonly><br>
                                        </div>

                                        <div class="form-group">
                                            <label for="transactionAmount">Transaction Amount *</label>
                                            <input type="number" class="form-control"  required="required" name="transactionAmount" placeholder="Transaction Amount" id="transactionAmount" readonly><br>
                                        </div>

                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="notes" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="tpassword"> Transfer Password *</label>
                                            <input type="text" class="form-control"  required="required" name="tpassword" placeholder="Transfer Password">
                                        </div>
                <input type="hidden" name="withdrawalId" id="withdrawalId">
                <div class="card-footer">
                    <button type="submit" id="transactionSubmit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default pinC" data-dismiss="modal">X</button>
              <button type="button" class="btn btn-default pinC" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    @include('layouts.footers')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('.paynow').on('click', function(){

        var withdrawalid = $(this).attr('data-withdrawalid');
        var uniqueid = $(this).attr('data-uniqueid');
        var transactionAmount = $(this).attr('data-transactionAmount');
        $('#uniqueId').val(uniqueid); 
        $('#withdrawalId').val(withdrawalid); 
        $('#transactionAmount').val(transactionAmount); 

    })
  });
</script>
