@php
    
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();

@endphp


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
      <span class="brand-text font-weight-light">BFIN Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
  
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         

          <li class="nav-item {{($prefix == '/blog') ? 'menu-open':' '}}">
            <a href="#" class="nav-link">
              <i class="fas fa-blog"></i>
              <p>
                Blog
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('all_blogs') }}" class="nav-link {{($route == 'all_blogs') ? 'active':' '}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>index</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search & Insert</p>
                </a>
              </li>
              

            </ul>
          </li>

          <li class="nav-item {{($prefix == '/user') ? 'menu-open':' '}}">
            <a href="#" class="nav-link">
            <i class="fas fa-users"></i>

              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('all_users') }}" class="nav-link {{($route == 'all_users') ? 'active':' '}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>index</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Search & Insert</p>
                </a>
              </li>
              

            </ul>
          </li>

          <li class="nav-item {{($prefix == '/section') ? 'menu-open':' '}}">
            <a href="#" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Category & Tags
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('section') }}" class="nav-link {{($route == 'section') ? 'active':' '}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sections</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tags</p>
                </a>
              </li>
              

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>