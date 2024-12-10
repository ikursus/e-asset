<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Menu Utama</div>
            <a class="nav-link" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Pengguna
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('pengguna.index') }}">Senarai Pengguna</a>
                    <a class="nav-link" href="{{ route('pengguna.create') }}">Daftar Pengguna</a>
                </nav>
            </div>


            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAssets" aria-expanded="false" aria-controls="collapseAssets">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Asset
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseAssets" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('asset.index') }}">Senarai Asset</a>
                    <a class="nav-link" href="{{ route('asset.create') }}">Permohonan Baru</a>
                </nav>
            </div>


            <div class="sb-sidenav-menu-heading">Akaun</div>
            <a class="nav-link" href="{{ route('profile.edit') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Profile
            </a>
            <a class="nav-link" href="{{ route('logout') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Logout
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
