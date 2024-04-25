<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Life Style</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            {{--  --}}
            <li class="dropdown active">

              <a href="/admin/album" class="nav-link nav-link-2 {{Request::is('admin/album')? 'active' : '' }}" ><i class="fas fa-columns"></i> <span>Album</span></a> 


              <a href="/admin/foto" class="nav-link nav-link-2 {{Request::is('admin/foto')? 'active' : '' }}" ><i class="fas fa-th"></i> <span>Data Foto</span></a> 

              <a href="/admin/komen" class="nav-link nav-link-2 {{Request::is('admin/komen')? 'active' : '' }}" ><i class="fas fa-th"></i> <span>Komentar</span></a> 

        
          </ul>
        </aside>
      </div>