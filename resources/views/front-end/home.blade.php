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
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach($blogs as $blog)
                            <div class="card mb-4">
                                <a href="{{ route('blog_details',['id'=>$blog->id]) }}"><img class="card-img-top" src="{{ asset($blog->image) }}" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ $blog->created_at->diffForHumans() }}</div>
                                    <h2 class="card-title h4">{{ $blog->title }}</h2>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->body, $limit = 150 , $end = '......')  }}</p>
                                    <a class="btn btn-primary" href="{{ route('blog_details',['id'=>$blog->id]) }}">Read more →</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            {{ $blogs->links() }}
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0" style="display: block;">
                                        @foreach($sections as $section)
                                        <li><a href="">{{ $section->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
@endsection





