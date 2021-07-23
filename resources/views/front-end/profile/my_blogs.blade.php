		
@extends('front-end.master')

@section('title')
    <title>My Blog</title>
@endsection


@section('header')
    
    <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
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
                       <div class="row">
                        @if(Session::has('delete_blog'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ Session::get('delete_blog') }}
                                    </div>

                                 @endif
                        
                        @foreach($blogs as $blog)
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <a href="{{ route('blog_details',['id'=>$blog->id]) }}"><img class="card-img-top" src="{{ asset($blog->image) }}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ Carbon\Carbon::parse($blog->created_at)->format('Y-m-d') }} by <strong>{{ $blog->name }}</strong></div>
                                    <h2 class="card-title h4">{{ $blog->title }}</h2>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->body, $limit = 150 , $end = '......')  }}</p>
                                    @if($blog->is_blocked == 1)
                                        <button class="btn btn-danger btn-sm">Blocked By Admin</button>
                                    @endif
                                    <a class="btn btn-primary" href="{{ route('blog_details',['id'=>$blog->id]) }}">Read more →</a>
                                    <a class="btn btn-success" href="{{ route('blog_edit',['id'=>$blog->id]) }}">edit</a>
                                    <a class="btn btn-danger" href="{{ route('blog_delete',['id'=>$blog->id]) }}" onclick="return confirm('Are you sure?')">delete</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
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
        
    </script>

@endsection























