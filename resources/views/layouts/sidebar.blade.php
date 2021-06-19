<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu Utama</li>
                @role('admin')
                <li>
                    <a href="/dashboard">
                        <i class="metismenu-icon pe-7s-home"></i>
                            Beranda
                    </a>
                </li>   
                <li>
                    <a href="{{ route('bumdes.index') }}">
                        <i class="metismenu-icon pe-7s-culture"></i>
                            Bumdes
                    </a>
                </li>  
                <li>
                    <a href="{{ route('kabupaten.index') }}">
                        <i class="metismenu-icon pe-7s-global"></i>
                            Kabupaten
                    </a>
                </li>
                <li>
                    <a href="{{ route('kecamatan.index') }}">
                        <i class="metismenu-icon pe-7s-flag"></i>
                            Kecamatan
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="metismenu-icon pe-7s-users"></i>
                            Akun
                    </a>
                </li>  
                @endrole 
                @role('bumdes')
                <li>
                    <a href="/dashboard">
                        <i class="metismenu-icon pe-7s-home"></i>
                            Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('jenisUsaha.index') }}">
                        <i class="metismenu-icon pe-7s-server"></i>
                            Jenis Usaha dan SHU
                    </a>
                </li>   
                <li>
                    <a href="{{ route('user.show', Auth::user()->id) }}">
                        <i class="metismenu-icon pe-7s-user"></i>
                            Profil
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.edit', Auth::user()->id) }}">
                        <i class="metismenu-icon pe-7s-settings"></i>
                            Akun
                    </a>
                </li>
                @endrole
                <li>
                    <a href="{{ route('tentang') }}">
                        <i class="metismenu-icon pe-7s-info"></i>
                            Tentang
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> <i class="metismenu-icon pe-7s-power"></i>Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>      
            </ul>
        </div>
    </div>
</div> 