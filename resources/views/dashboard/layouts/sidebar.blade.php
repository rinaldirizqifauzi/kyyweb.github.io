<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="file-text"></span>
            My Post
          </a>
        </li>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span> Data Master</span>
        </h6>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/types*') ? 'active' : '' }}" href="/dashboard/types">
            <span data-feather="list"></span>
              Daftar Merek Helm
          </a>
        </li>

        <ul class="nav flex-colomn">
          <li class="nav-item"> 
            <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
              <span data-feather="grid"></span>
              Type Helm
            </a>
          </li>
        </ul>

  

        
      </ul>
    </div>
  </nav>