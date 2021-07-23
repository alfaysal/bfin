@extends('front-end.master')

@section('title')
    <title>bfin</title>
@endsection

@section('header')
	
	<header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Your Result</h1>
                </div>
            </div>
        </header>
@endsection


@section('content')
		<div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <h2>Your Result For: <strong>{{ $key_words }}</strong></h2>
                    <div class="row">
                        <div class="col-lg-12">
                            @if(count($blogs) > 0)
                                @foreach($blogs as $blog)
                                <div class="card mb-4">
                                    <a href="{{ route('blog_details',['id'=>$blog->id]) }}"><img class="card-img-top" src="{{ asset($blog->image) }}" alt="..." /></a>
                                    <div class="card-body">
                                        <div class="small text-muted">{{ Carbon\Carbon::parse($blog->created_at)->format('Y-m-d') }}</div>
                                        <h2 class="card-title h4">{{ $blog->title }}</h2>
                                        <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->body, $limit = 150 , $end = '......')  }}</p>
                                        <a class="btn btn-primary" href="{{ route('blog_details',['id'=>$blog->id]) }}">Read more →</a>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <h4 style="color:red">No result found</h4>
                            @endif
                        </div>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                @include('front-end.includes.sidebar')
            </div>
        </div>
@endsection





