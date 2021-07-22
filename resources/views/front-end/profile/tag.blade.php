		
@extends('front-end.master')

@section('title')
    <title>bfin</title>
@endsection


@section('header')
    
    <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header>
@endsection


@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-12 bg-light">
                    <div class="d-flex" id="wrapper">
                        @include('front-end.profile.sidebar')
                         <div id="page-content-wrapper">
               
                    <div class="container-fluid">
                        @if(Session::has('tag_message'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">{{ Session::get('tag_message') }}
                                </div>

                            @endif

                        <form action="{{ route('add_tag') }}" method="POST">
                            @csrf
                            <div class="card card-dark mt-4">
                              <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Create Tag</h3>
                              </div>

                                <div class="card-body table-responsive p-3">
                                    @if(count($errors) > 0)
                                         <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control input-sm" type="text" name="name" value="{{ old('name') }}" required="">
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <input class="btn btn-success" type="submit" name="submit" value="Add Tag">
                                    
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
    <script type="text/javascript">
        $('.alert').alert()
        aler
    </script>

@endsection























