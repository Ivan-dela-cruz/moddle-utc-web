<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="javascript:void(0);"><span></span></a>
        <a href="javascript: return void();" class="b-brand">
            <img height="70" width="140" src="{{asset('img/logo_pantallas.png')}}" alt="">
          
        </a>
        <a href="javascript:void(0);" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="javascript:void(0);" class="pop-search"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            @if(\Illuminate\Support\Facades\Auth::user()->url_image==='#')
                                <img src="{{asset('img/user.jpg')}}" class="img-radius"
                                     alt="User-Profile-Image">
                            @else
                                <img src="{{\Illuminate\Support\Facades\Auth::user()->url_image}}" class="img-radius"
                                     alt="User-Profile-Image">
                            @endif

                            <span>{{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</span>
                            <a href="auth-signin.html" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        {{---
                        <ul class="pro-body">

                            <li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i>
                                    Profile</a></li>
                            <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My
                                    Messages</a></li>
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock
                                    Screen</a></li>
                        </ul>
                        ---}}
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
