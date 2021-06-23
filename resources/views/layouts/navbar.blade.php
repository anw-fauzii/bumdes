<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src mb-4"><img src="{{asset('storage/logo.png')}}"  width="130px"></div>
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
        <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">                             
                                    <div class="dropdown show">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(Auth::user()->logo == NULL)
                                            <img width="42" class="rounded-circle" src="{{asset('storage/user.png')}}" alt="">
                                            @else
                                            <img width="42" class="rounded-circle" src="{{asset('storage/'. Auth::user()->logo)}}" alt="">
                                            @endif
                                        </a>
                                        <div class="dropdown-menu">
                                        <div class="text-center">
                                        @if(Auth::user()->logo == NULL)
                                            <img width="100" class="rounded-circle" src="{{asset('storage/user.png')}}" alt="">
                                            @else
                                            <img width="100" class="rounded-circle" src="{{asset('storage/'. Auth::user()->logo)}}" alt="">
                                        @endif
                                        </div>
                                        <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Profil</a>
                                            <a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}">Ganti Password</a>
                                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Keluar</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-right ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <strong>{{ Auth::user()->nama }}</strong>
                                    </div>
                                    <div class="widget-subheading">
                                        {{ Auth::user()->email }}    
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>      
        </div>
    </div>
</div> 