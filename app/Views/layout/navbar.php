<nav class="navbar" id="nav-2">
    <div class="container-fluid">
    
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
            <li class="nav-item">
            <a class="nav-link" href="/laporan">Laporan</a>
            </li>
      </ul>
        <div class="dropdown">
            <div class="dropdown-toggle btn-profile" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="d-sm-none d-lg-inline-block">Hi, <?php if(in_groups('guru')){ echo('Guru');}else{ echo('Staf Tata Usaha');} ?></div>
                <img alt="image" src="/assets/img/avatar/avatar-default.png" class="rounded-circle mr-1">
                </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                </li>
        <?php if(in_groups('admin')) :?>
                <li>
                    <a class="dropdown-item" href="/admin">
                        <span class="material-symbols-sharp">key</span>
                        <span class="text">Admin</span>
                    </a>
                </li>
        <?php endif ?>
                <li>
                    <a class="dropdown-item" href="/logout" style="color: red;">
                        <span class="material-symbols-sharp">logout</span>
                        <span class="text">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
