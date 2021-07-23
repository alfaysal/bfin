@extends('front-end.master')

@section('title')
    <title>bfin</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('/') }}/back-end/asset/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}/back-end/asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

@section('header')
    
    <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Create Your Own Blog</h1>
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
                                @if(Session::has('blog_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{ Session::get('blog_message') }}
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

                                <form action="{{ route('save_stories') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card card-dark mt-4">
                                      <div class="card-header d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Create Blog</h3>
                                      </div>

                                        <div class="card-body table-responsive p-3">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control input-sm" type="text" value="{{ old('title') }}" name="title" required="">
                                            </div>

                                            <div class="form-group">
                                                <label>Body</label>
                                                <textarea class="form-control" name="body" rows="4">{{ old('body') }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Section</label>
                                                <select class="form-control" required="" name="section_id">
                                                    <option value="">Select Section Type</option>
                                                    @foreach($sections as $section)
                                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                              <label>Multiple</label>
                                              <select class="select2" required="" name="tags[]" multiple="multiple" data-placeholder="Select Tags" style="width: 100%;">
                                                <option value="">Select Tags</option>
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                              </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>

                                            <div class="form-group">
                                                <label>Image Caption</label>
                                                <input type="text" class="form-control" value="{{ old('caption') }}" name="caption">
                                            </div>

                                            <div class="form-group">
                                                <label>Publish Status</label>
                                                <select class="form-control" name="is_published">
                                                    <option value=""> Select Published Status</option>
                                                    <option value="0">published</option>
                                                    <option value="1">only me</option>
                                                </select>
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












