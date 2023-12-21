<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="navbar-brand">
            <img class="img-fluid" src="{{ asset('frontend/img/logo.png') }}" alt="Logo Desa Candikuning"
                style="width: 250px" />
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <a href="/admin/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>
        <!-- Layouts -->
        <li class="menu-item {{ 
            Route::currentRouteName() == 'navbar' || 
            Route::currentRouteName() == 'banner' ||
            Route::currentRouteName() == 'profildesa' ||
            Route::currentRouteName() == 'infowilayah' ||
            Route::currentRouteName() == 'footer' ? 'open' : '' }}"
        >
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Layouts</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::currentRouteName() == 'navbar' ? 'active' : '' }}">
                    <a href="/admin/navbar" class="menu-link">
                        <div data-i18n="Navbar menu">Navbar</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'banner' ? 'active' : '' }}">
                    <a href="/admin/banner" class="menu-link">
                        <div data-i18n="Banner">Banner</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'profildesa' ? 'active' : '' }}">
                    <a href="/admin/profildesa" class="menu-link">
                        <div data-i18n="Profil Desa">Profil Desa</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'infowilayah' ? 'active' : '' }}">
                    <a href="/admin/infowilayah" class="menu-link">
                        <div data-i18n="Info Wilayah">Info Wilayah</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'footer' ? 'active' : '' }}">
                    <a href="/admin/footer" class="menu-link">
                        <div data-i18n="Footer">Footer</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'potensidesa' || Route::currentRouteName() == 'kategoripotensidesa' ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Potensi Desa">Potensi Desa</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::currentRouteName() == 'potensidesa' ? 'active' : '' }}">
                    <a href="/admin/potensidesa" class="menu-link">
                        <div data-i18n="Potensi Desa">Daftar Potensi</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'kategoripotensidesa' ? 'active' : '' }}">
                    <a href="/admin/kategoripotensi" class="menu-link">
                        <div data-i18n="Kategori Potensi">Kategori Potensi</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'umkm' || Route::currentRouteName() == 'kategoriumkm' ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="UMKM">UMKM</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::currentRouteName() == 'umkm' ? 'active' : '' }}">
                    <a href="/admin/umkm" class="menu-link">
                        <div data-i18n="UMKM">Daftar UMKM</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'kategoriumkm' ? 'active' : '' }}">
                    <a href="/admin/kategoriumkm" class="menu-link">
                        <div data-i18n="Kategori UMKM">Kategori UMKM</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'fasilitas' || Route::currentRouteName() == 'kategorifasilitas' ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-hotel"></i>
                <div data-i18n="Fasilitas">Fasilitas</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::currentRouteName() == 'fasilitas' ? 'active' : '' }}">
                    <a href="/admin/fasilitas" class="menu-link">
                        <div data-i18n="Fasilitas">Daftar Fasilitas</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'kategorifasilitas' ? 'active' : '' }}">
                    <a href="/admin/kategorifasilitas" class="menu-link">
                        <div data-i18n="Kategori Fasilitas">Kategori Fasilitas</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'berita' || Route::currentRouteName() == 'kategoriberita' ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-news"></i>
                <div data-i18n="Berita">Berita</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::currentRouteName() == 'berita' ? 'active' : '' }}">
                    <a href="/admin/berita" class="menu-link">
                        <div data-i18n="Daftar Berita">Daftar Berita</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::currentRouteName() == 'kategoriberita' ? 'active' : '' }}">
                    <a href="/admin/kategoriberita" class="menu-link">
                        <div data-i18n="Kategori Berita">Kategori Berita</div>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Settings</span></li>
        <!-- Cards -->
        <li class="menu-item {{ Route::currentRouteName() == 'petugas' ? 'active' : '' }}">
            <a href="/admin/petugas" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Petugas">Petugas</div>
            </a>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'wisatawan' ? 'active' : '' }}">
            <a href="/admin/wisatawan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Wisatawan">Wisatawan</div>
            </a>
        </li>

        <!-- Misc -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">help</span></li>
        <li class="menu-item">
            <a href="/admin/documentation" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
            </a>
        </li>
    </ul>
</aside>
