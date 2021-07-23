@php
    
    $route = Route::current()->getName();
    
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">BFIN </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link {{($route == '') ? 'active':' '}}" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link {{($route == 'user_dashboard') ? 'active':' '}}" href="{{ route('user_dashboard') }}">Account</a></li>
                        
                        
                        @guest
                            <li class="nav-item"><a class="nav-link {{($route == 'login') ? 'active':' '}}" href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link {{($route == 'register') ? 'active':' '}}" href="{{ route('register') }}">Register</a></li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                        <li class="nav-item"><a class="nav-link {{($route == 'create_blog') ? 'active':' '}}" aria-current="page" href="{{ route('create_blog') }}">Blog</a></li>
                    </ul>
                </div>
            </div>
        </nav>