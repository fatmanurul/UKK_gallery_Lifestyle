 <!-- Page Loader -->
 <div id="loader-wrapper">
    <div id="loader"></div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>

</div>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fas fa-film mr-2"></i>
            Life Style
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link nav-link-1 {{Request::is('photos')? 'active' : '' }}" aria-current="page" href="/photos">Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-2 {{Request::is('category')? 'active' : '' }}" href="/category">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-3 {{Request::is('login')? 'active' : '' }}" href="/login">Login</a>
          </li>

        </div>
      </div>
        </ul>
        </div>
    </div>
</nav>