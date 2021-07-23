@php
    
    $route = Route::current()->getName();
    
@endphp

<div class="border-end bg-white" id="sidebar-wrapper">
                           
	<div class="list-group list-group-flush">
	    <a class="list-group-item {{($route == 'user_dashboard') ? 'active':' '}} list-group-item-action list-group-item-light p-3" href="{{ route('user_dashboard') }}">My Profile</a>
	    <a class="list-group-item {{($route == 'create_blog') ? 'active':' '}} list-group-item-action list-group-item-light p-3" href="{{ route('create_blog') }}">Create Blog</a>
	    <a class="list-group-item {{($route == 'tag') ? 'active':' '}} list-group-item-action list-group-item-light p-3" href="{{ route('tag') }}">Create Tag</a>
	    <a class="list-group-item {{($route == 'my_blogs') ? 'active':' '}} list-group-item-action list-group-item-light p-3" href="{{ route('my_blogs') }}">My Blogs</a>
	</div>
</div>