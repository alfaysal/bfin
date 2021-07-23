@extends('back-end.master')

@section('title')
  <title>All Users</title>
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
            <h1 class="m-0 float-right">All Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
        <div class="row">
          <div class="col-md-12 ">
             <div class="card card-dark">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">All Users</h3>
              </div>

                <div class="card-body table-responsive p-3">
                <table class="table table-hover" id="users_table">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->gender }}</td>
                            @if($user->is_blocked == 0)
                            <td><span class="badge badge-success">Active</span></td>
                            @else
                            <td><span class="badge badge-danger">Blocked</span></td>
                            @endif

                            <td>
                                <form action="{{ route('blocked_user') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div style="display:inline">
                                        <div class="form-group" style="float:left;">
                                        <select class="form-control" name="is_blocked">
                                            @if($user->is_blocked == 0)
                                                <option value="0" selected="">Active</option>
                                            @else
                                                <option value="1" selected="">Blocked</option>

                                            @endif
                                            <option value="0">Active</option>
                                            <option value="1">Blocked</option>
                                        </select>
                                        </div>

                                        <div class="form-group" >
                                           <input
                                           class="btn btn-success btn-sm" type="submit" value="submit" name="">
                                        </div>
                                    </div>
                                    
                                </form>
                            </td>

                        </tr>
                    @endforeach
                  </tbody>
                </table>
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
     
        var table = $('#users_table').DataTable();


     
    
    </script>

@endsection