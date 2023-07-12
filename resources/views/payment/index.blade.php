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
            <h1>Summary</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Summary</li>
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
              <form class="form-inline" role="form" method="post" action="{{ route('paysearch') }}">
                @csrf
                  <div class="form-group">
                      <label>From Date&nbsp;&nbsp;</label>
                      <input class="form-control" value="" required type="date" name="from_date"  >

                      <label>&nbsp;&nbsp;To Date&nbsp;&nbsp;</label>
                      <input class="form-control" value="" required type="date" name="to_date"  >

                      <input required="required" class="btn btn-info" type="submit" name="submit" value="Show"/>
                  </div>
              </form>
            </div>
            <!-- /.card-header -->
             <div class="card-body">
              @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Unique Id</th>
                  <th width="120px" style="text-align:left">Date Time</th>
                  <th>Description</th>
                  <th style="text-align:left">Debit</th>
                  <th style="text-align:left">Credit</th>
                  <th width="60px" style="text-align:left">Balance</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($payment as $payment)
                <tr>
                  <td>{{ $payment->uniqueId }}</td>
                  <td>{{ $payment->created_at }}</td>
                  <td>{{ $payment->description }}</td>
                  <td>@if($payment->type == 'DEBIT') {{ $payment->amount }} @endif</td>
                  <td>@if($payment->type == 'CREDIT') {{ $payment->amount }} @endif</td>
                  <td>{{ $payment->balance }}</td>
                </tr>
               @endforeach
                </tbody>
              </table>
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
  });
</script>
