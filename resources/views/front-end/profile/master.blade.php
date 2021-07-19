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
                        @yield('profile_content')
                    </div>
                </div>
                
            </div>
        </div>
   
@endsection










