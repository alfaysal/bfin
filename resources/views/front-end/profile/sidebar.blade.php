@php
    
    $route = Route::current()->getName();
    
@endphp

<div class="border-end bg-white" id="sidebar-wrapper">
                           
	<div class="list-group list-group-flush">
	    <a class="list-group-item {{($route == 'user_dashboard') ? 'active':' '}} list-group-item-action list-group-item-light p-3" href="#!">Dashboard</a>
	    <a class="list-group-item {{($route == 'create_blog') ? 'active':' '}} list-group-item-action list-group-item-light p-3" href="{{ route('create_blog') }}">Create Blog</a>
	    <a class="list-group-item {{($route == 'tag') ? 'active':' '}} list-group-item-action list-group-item-light p-3" href="{{ route('tag') }}">Create Tag</a>
	    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Events</a>
	    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Profile</a>
	    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a>
	</div>
</div>