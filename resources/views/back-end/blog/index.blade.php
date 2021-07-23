@extends('back-end.master')

@section('title')
  <title>All Blogs</title>
@endsection



@section('bread_crumb')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 float-right">All Blogs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Blogs</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')

  <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('search_back_end') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" name="keywords" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <div class="list-group">
                        @foreach($blogs as $blog)
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-auto">
                                    <img class="img-fluid" src="{{ asset($blog->image) }}" alt="Photo" style="max-height: 160px;">
                                </div>
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right">{{ Carbon\Carbon::parse($blog->created_at)->format('Y-m-d') }}</div>
                                        <h3>{{ $blog->title }}</h3>
                                        <p class="mb-0">{{ \Illuminate\Support\Str::limit($blog->body, $limit = 150 , $end = '......')  }}</p>
                                        @if($blog->is_blocked == 0)
                                        <p><span class="badge badge-success">Published</span></p>
                                        @else
                                        <p><span class="badge badge-danger">Blocked</span></p>
                                        @endif
                                        <div style="display:inline;">
                                        	<a class="btn btn-primary" href="{{ route('blog_detail_backend',['id'=>$blog->id]) }}">Read more →</a>

	                                        <form action="{{ route('blocked_status') }}" method="POST" class="form-inline" style="float: right;">
	                                        	@csrf
	                                        	<input type="hidden" value="{{ $blog->id }}" name="id">
	                                        	<div class="form-group">
	                                        		<label>Status:</label>
	                                        		<select class="form-control input-sm" name="is_blocked">
	                                        			<option value="">Select Status</option>
	                                        			<option value="0">Published</option>
	                                        			<option value="1">Blocked</option>
	                                        		</select>
	                                        	</div>
	                                        	<div class="form-group">
	                                        		<input class="btn btn-success btn-sm" type="submit" name="submit">
	                                        	</div>
	                                        </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


@endsection

