<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
    </form>
    <div class="d-sm-none d-lg-inline-block text-center">
      <a href="/photos" class="dropdown-item has-icon">
        <i class="far fa-home" style="display: block; margin: 0 auto;"></i> 
        Photos
      </a>
    </div>
    
    
    
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->username }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="/profile" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <form action="/logout" method="POST">
            @csrf
            <button class="bg-white border-0"><a class="dropdown-item has-icon">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a></button>
        </form>
        
        </div>
      </li>
    </ul>
  </nav>