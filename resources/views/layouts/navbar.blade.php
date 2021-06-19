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
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            @if(Auth::user()->logo == NULL)
                                            <img width="42" class="rounded-circle" src="{{asset('storage/user.png')}}" alt="">
                                            @else
                                            <img width="42" class="rounded-circle" src="{{asset('storage/'. Auth::user()->logo)}}" alt="">
                                            @endif
                                        </a>
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