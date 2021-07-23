@extends('front-end.master')

@section('title')
    <title>bfin</title>
@endsection

@section('css')
    <style>
        .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}


    </style>
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
                    <button class="btn btn-primary" id="sidebarToggle">Hide Menu</button>
                    <div class="d-flex" id="wrapper">
                        @include('front-end.profile.sidebar')
                        <div id="page-content-wrapper">
               
                        <div class="container-fluid">
                            <h2 style="text-align:center">Your Profile</h2>
                            <div class="card">
                              <img src="{{ asset($user->image) }}" alt="John" style="width:100%">
                              <h1>{{ $user->name }}</h1>
                              <p class="title">Email: {{ $user->email }}</p>
                              <p class="title">Dob: {{ $user->d_o_b }}</p>
                              <p class="title">Phone: {{ $user->phone }}</p>
                              <p class="title">Gender: {{ $user->gender }}</p>
                              
                              <p><a href="{{ route('edit_user_info',['id'=>$user->id]) }}}" class="btn btn-success">Edit Info</a></p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
   
@endsection

