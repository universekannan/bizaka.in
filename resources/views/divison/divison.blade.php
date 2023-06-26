@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="content-header">
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Divison Details</h3>
                    <button type="button" class="btn btn-sm btn-secondary float-right" data-toggle="modal" data-target="#adddivison"><i class="fa fa-plus"> </i> Add Divison</button>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissable" style="margin: 15px;">
                        <a href="#" style="color:white !important" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong> {{ session('success') }} </strong>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="example2" class="table table-bordered">
                            <thead>
                                <tr> 
                                    <th>Division Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($divison as $divis)
                                <tr> 
                                    <td>{{ $divis->division_name }}</td>

                                    <td style="white-space: nowrap"><a onclick="edit_divison('{{ $divis->id }}','{{ $divis->division_name }}')" href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> edit</a>
                                      <a onclick="return confirm('Do you want to Confirm delete operation?')"  href="{{ url('/deletedivison' ,$divis->id ) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>

                   <div class="modal fade" id="adddivison">
                     <form action="{{url('/adddivison')}}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Divison</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">   
                                          <div class="form-group row">
                                            <label for="division_name" class="col-sm-4 col-form-label"><span style="color:red">*</span>Divison Name</label>
                                            <div class="col-sm-8">
                                                <input required="required" type="text" class="form-control" name="division_name" id="division_name" maxlength="1" placeholder="Divison Name">
                                            </div>
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

            <div class="modal fade" id="editdivison" tabindex="-1"  aria-hidden="true">
               <form action="{{url('/editdivison')}}" method="post">
                   {{ csrf_field() }}
                   <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollable">Edit Divison</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">   
                            <input type="hidden" name="class_id" id="class_id">
                            <div class="form-group row">
                                <label for="division_name" class="col-sm-4 col-form-label"><span style="color:red">*</span>Division Name</label>
                                <div class="col-sm-8">
                                    <input required="required" type="text" class="form-control" name="division_name" id="editdivisonname" maxlength="50" placeholder="Divison Name">
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
</div>
</div>
</div>
</div>
</div>
@endsection
@push('page_scripts')

<script>

function edit_divison(id,division_name){
    $("#editdivisonname").val(division_name);
    $('#class_id').val(id);
    $("#editdivison").modal("show");
}

</script>

@endpush