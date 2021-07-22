@extends('back-end.master')

@section('title')
  <title>Section Create</title>
@endsection

@section('css')
  
  <link rel="stylesheet" href="{{ asset('/') }}/back-end/asset/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}/back-end/asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}/back-end/asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('/') }}/back-end/asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('bread_crumb')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 float-right">Section Create</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Section Create</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
        <div class="row">
          <div class="col-md-8 offset-md-2">
             <div class="card card-dark">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Create Section</h3>
                <a class="btn btn-success btn-sm pull-right" onclick="create()">Add New</a>
              </div>

                <div class="card-body table-responsive p-3">
                <table class="table table-hover" id="section_table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="section_tbody">

                  </tbody>
                </table>
              </div>
            </div>
           </div>

        </div>

        <div class="modal fade" id="section_modal">
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
                                <input class="form-control input-sm" type="text" name="name" required="">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            <button type="button" class="btn btn-primary btnSave"
                                    onClick="store()">Save
                            </button>
                            <button type="button" class="btn btn-primary btnUpdate"
                                    onClick="update()">Update
                            </button>
                        </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')
  <script src="{{ asset('/') }}/back-end/asset/plugins/toastr/toastr.min.js"></script>

  <!-- DataTables  & Plugins -->
<script src="{{ asset('/') }}/back-end/asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}/back-end/asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}/back-end/asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}/back-end/asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}/back-end/asset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}/back-end/asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}/back-end/asset/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('/') }}/back-end/asset/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/') }}/back-end/asset/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/') }}/back-end/asset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}/back-end/asset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}/back-end/asset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 
 <!--  ************************Section Js************** -->
    <script>
        var _modal = $('#section_modal');
        var btnSave = $('.btnSave');
        var btnUpdate = $('.btnUpdate');

        var table = $('#section_table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{{ route('section_data') }}',
              columns: [
                  { data: 'name', name: 'name' },
                  { data: 'action', name: 'action' },
              ]
        });

        function reset() {
            _modal.find('input,select').each(function () {
                $(this).val(null)
            })

        }
        function getInputs() {
            var id = $('input[name="id"]').val()
            var name = $('input[name="name"]').val()
            return {id: id, name: name}
        }
        function create() {
            _modal.find('.modal-title').text('New section');
            reset();
            _modal.modal('show')
            btnSave.show()
            btnUpdate.hide()
        }

        
        function store(){
            $.ajax({
                method: 'POST',
                url: baseURL + '/section/store',
                data: getInputs(),
                dataType: 'JSON',
                success: function () {
                    reset()
                    _modal.modal('hide')
                    table.ajax.reload(null,false) 
                  successToast()
                }
            })
        }

        function successToast(){
                toastr.success('data added successfully')
        }

        function infoToast(){
                toastr.info('data updated successfully')
        }

        function errorToast(){
                toastr.error('data deleted')
        }

        function canNotDeleteToast(){
                toastr.error('data can not be deleted deleted')
        }

        $('#section_table').on('click', '#edit_sections', function (e) {

            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                method: 'POST',
                url: baseURL + '/section/edit',
                data: {'id':id},
                dataType: 'JSON',
                success: function (data) {
                      _modal.modal('show')
                      _modal.find('.modal-title').text('Update Section');
                       $('input[name="id"]').val(data.id)
                      $('input[name="name"]').val(data.name)
                      btnSave.hide()
                      btnUpdate.show()
                },
               error: function (error) {
                    console.log(error);
                }
            })
            
        })
        function update(){
            $.ajax({
                method: 'POST',
                url: baseURL + '/section/update',
                data: getInputs(),
                dataType: 'JSON',
                success: function () {
                    reset()
                    _modal.modal('hide')
                    table.ajax.reload(null,false) 
                    infoToast();
                }
            })
        }
        $('#section_table').on('click', '#delete_sections', function () {
            if(!confirm('Are you sure?')) return;
            var id = $(this).data('id');
            var data={id:id}
            $.ajax({
                method: 'POST',
                url: baseURL + '/section/delete',
                data:data,
                dataType: 'JSON',
                success: function (data) {
                    table.ajax.reload(null,false) 
                    errorToast();
                },
               error: function (error) {
                    canNotDeleteToast()
                    console.log(error);
                }
            })
        })

     
    
    </script>

@endsection