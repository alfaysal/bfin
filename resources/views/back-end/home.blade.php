@extends('back-end.master')

@section('title')
  <title>Bfin Dashboard</title>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('/') }}/asset/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}/asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}/asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}/asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
  <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

@endsection


@section('bread_crumb')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0  text-center">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection


@section('content')
  
    <div class="row">
           <div class="col-md-10 offset-md-1">
             <div class="card card-dark">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Create Employee</h3>
                <a class="btn btn-success btn-sm pull-right" onclick="createSupplier()">Add New</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body table-responsive p-0">

                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                  
                  </tfoot>
                </table>
              </div>
            </div>
           </div>
        </div>

        <div class="modal fade" id="employee_modal">
          <form id="employe_save">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>
                        <button type="button" class="close"
                                data-dismiss="modal" aria-hidden="true">&times;
                        </button>
                    </div>
                    <div class="modal-body">
                      
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control input-sm" type="text" name="name">
                        </div>

                        <div class="form-group">
                            <label>Designation</label>
                            <input class="form-control input-sm" type="text" name="designation">
                        </div>
                     
                        

                       
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary SupplierbtnSave"
                                onClick="storeEmployee()">
                                Submit
                        </button>

                        <button type="submit" class="btn btn-primary SupplierbtnUpdate"
                                onClick="supplierUpdate()">Update
                        </button>
                    </div>
                </div>
            </div>
          </form>
        </div>
      

@endsection

@section('scripts')
  <script src="{{ asset('/') }}/asset/plugins/toastr/toastr.min.js"></script>

  <script src="{{ asset('/') }}/asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}/asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}/asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}/asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}/asset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}/asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<!-- jquery validation cdn -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>



@endsection