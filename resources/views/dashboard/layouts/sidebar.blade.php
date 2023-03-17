    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
                                {{-- Kalau ada request url nya tampilin class active, kalau gaada kosongin. --}}
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} d-inline-block" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              <span class="d-inline-block align-middle">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }} d-inline-block" href="/dashboard/posts">
              <span data-feather="file-text" class="align-text-bottom"></span>
              <span class="d-inline-block align-middle">My Posts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/post*') ? 'active' : '' }} d-inline-block" href="/post">
              <span data-feather="arrow-left" class="align-text-bottom"></span>
              <span class="d-inline-block align-middle">Back to posts</span>
            </a>
          </li>
        </ul>

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }} d-inline-block" href="/dashboard/categories">
              <span data-feather="grid" class="align-text-bottom"></span>
              <span class="d-inline-block align-middle">Post Categories</span>
            </a>
          </li>
        </ul>
        @endcan

      </div>
    </nav>