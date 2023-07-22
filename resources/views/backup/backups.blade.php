@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="content-header">
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Backup Database</h3>
                        <form action="{{ url('backup/create') }}" method="GET" enctype="multipart/form-data" id="CreateBackupForm">
                           {{ csrf_field() }}
                           <input type="submit" name="submit" class="btn btn-secondary btn-sm float-right" style="margin-bottom:2em;" value="Create Database Backup">
                       </form>
                    </div>
                    <div class="card-body">
                     @if(session()->has('success'))
                     <div class="alert alert-success alert-dismissable">
                        <a href="#" style="color:white !important" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> {{ session('success') }} </strong>
                     </div>
                     @endif
                      @if ( Session::has('update') )
                         <div class="alert alert-success alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert">&times;</button>
                             {{ Session::get('update') }}
                         </div>
                         @endif
         
                         @if ( Session::has('delete') )
                         <div class="alert alert-danger alert-dismissible">
                             <button type="button" class="close" data-dismiss="alert">&times;</button>
                             {{ Session::get('delete') }}
                         </div>
                     @endif
                     @if (count($backups))
                     <div class="table-responsive">
                     <table id="example2" class="table table-bordered table-striped">
                                          <thead>
                                            <tr>
                                             <th>File Name</th>
                                             <th>File Size</th>
                                             <th>Created Date</th>
                                             <th>Created Age</th>
                                             <th>Action</th>
                                         </tr>
                                          </thead> 
                                          <tbody>
                                             @foreach($backups as $backup)
                                              <tr>
                                                 <td>{{ $backup['file_name'] }}</td>
                                                 <td>{{ \App\Http\Controllers\BackupController::humanFilesize($backup['file_size']) }}</td>
                                                 <td>
                                                     {{ date('F jS, Y, g:ia (T)',$backup['last_modified']) }}
                                                 </td>
                                                 <td>
                                                     {{ \Carbon\Carbon::parse($backup['last_modified'])->diffForHumans() }}
                                                 </td>
                                                 <td>
                                                     <a class="btn btn-success"
                                                        href="{{ url('backup/download/'.substr($backup['file_name'],12)) }}"><i
                                                             class="fa fa-cloud-download"></i> Download</a>
                                                     <a class="btn btn-danger" onclick="return confirm('Do you really want to delete this file')" data-button-type="delete"
                                                        href="{{ url('/backup/delete/'. substr($backup['file_name'],12)) }}"><i class="fa fa-trash-o"></i>
                                                         Delete</a>
                                                 </td>
                                             </tr>
                                             @endforeach
                                          </tbody>
                                       </table>
                                    </div>
                                        @else
                                     <div class="well">
                                         <h4 class="text-center">No backups</h4>
                                     </div>
                                 @endif
                  
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
<!-- /.content -->
</div>
@endsection
