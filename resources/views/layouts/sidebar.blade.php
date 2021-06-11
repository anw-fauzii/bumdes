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
                            Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('kabupaten.index') }}">
                        <i class="metismenu-icon pe-7s-culture"></i>
                            Bumdes
                    </a>
                </li>
                <li>
                    <a href="{{ route('jenisUsaha.index') }}">
                        <i class="metismenu-icon pe-7s-server"></i>
                            Jenis Usaha
                    </a>
                </li>   
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="metismenu-icon pe-7s-cash"></i>
                            Sisa Hasil Usaha
                    </a>
                </li>  
                <li>
                    <a href="{{ route('user.index') }}">
                        <i class="metismenu-icon pe-7s-users"></i>
                            User
                    </a>
                </li>  
                @endrole 
                @role('bumdes')
                <li>
                    <a href="/dashboard">
                        <i class="metismenu-icon pe-7s-home"></i>
                            Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('shu.show', Auth::user()->profil_bumdes_id) }}">
                        <i class="metismenu-icon pe-7s-server"></i>
                            Sisa Hasil Usaha
                    </a>
                </li>   
                <li>
                    <a href="{{ route('bumdes.edit', Auth::user()->profil_bumdes_id) }}">
                        <i class="metismenu-icon pe-7s-user"></i>
                            Profil
                    </a>
                </li>
                @endrole
                <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"> <i class="metismenu-icon pe-7s-power"></i>Logout</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                </li>      
            </ul>
        </div>
    </div>
</div> 