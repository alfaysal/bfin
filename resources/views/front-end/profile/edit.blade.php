@extends('front-end.master')

@section('title')
    <title>Edit Profile</title>
@endsection


@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12 bg-light">
                    <div class="d-flex" id="wrapper">
                        @include('front-end.profile.sidebar')
                        <div id="page-content-wrapper">  
                            <div class="container-fluid">
                                @if(Session::has('edit_pro_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('edit_pro_message') }}
                                    </div>

                                 @endif

                                 @if(count($errors) > 0)
                                         <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                <form action="{{ route('update_profile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-dark mt-4">
                                      <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Edit Info</h3>
                                      </div>

                                        <div class="card-body table-responsive p-3">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control input-sm" type="text" value="{{ $user->name }}" name="name" required="">
                                                <input type="hidden" value="{{ $user->id }}" name="id" required="">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control input-sm" type="email" value="{{ $user->email }}" name="email" required="">
                                            </div>

                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input class="form-control input-sm" type="text" value="{{ $user->phone }}" name="phone" required="">
                                            </div>


                                            <div class="form-group">
                                                <label>Image</label>
                                                <img style="width: 70px; height: 70px" src="{{ asset($user->image)  }}">
                                                <input type="hidden" name="old_image" value="{{ $user->image }}">
                                                <input type="file" name="image"  class="form-control" >
                                            </div>


                                            <div class="form-group">
                                                <label>Gender</label>
                                                <input type="radio" class="form-check-input" name="gender" value="male" {{($user->gender == 'male') ? 'checked' : ''}}>Male
                                                 <input type="radio" class="form-check-input" name="gender" value="female" {{$user->gender == 'female' ? 'checked' : ''}}>Female
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <input class="btn btn-success" type="submit" name="submit" value="Submit">
                                            
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


@section('js')
 <script src="{{ asset('/') }}/back-end/asset/plugins/select2/js/select2.full.min.js"></script>

        <script type="text/javascript">
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                  theme: 'bootstrap4'
                })
            })
        </script>
    
@endsection












