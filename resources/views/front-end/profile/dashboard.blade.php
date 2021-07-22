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
        <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>
            Make sure to keep all page content within the
            <code>#page-content-wrapper</code>
            . The top navbar is optional, and just for demonstration. Just create an element with the
            <code>#sidebarToggle</code>
            ID which will toggle the menu when clicked.
        </p>
        </div>
    </div>
                    </div>
                </div>
                
            </div>
        </div>
   
@endsection

