<header>
    <!--Navigation Section-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="navbar-header text-center">
                        <a href="{{ url('/') }}" class="navbar-brand">Foodie Miracles</a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tv-navbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="collapse navbar-collapse" id="tv-navbar">
                        <ul class="nav navbar-nav text-center tv-hover-effect">
                            <li class="">
                                <a href="{{ url('/') }}" data-hover="Home" class="tv-menu"><span>home</span></a>
                            </li>
                            <li class=""><a href="{{ url('/menu') }}" class="tv-menu" data-hover="Menu"><span>Menu</span></a></li>
                            <li class=""><a href="{{ url('/events') }}" class="tv-menu" data-hover="Events"><span>Events</span></a></li>
                            <li class=""><a href="{{ url('/about-us') }}" class="tv-menu" data-hover="About"><span>About</span></a></li>
                            <li><a href="{{ url('/contact-us') }}" class="tv-menu" data-hover="Contact Us"><span>Contact us</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="collapse navbar-collapse" id="tv-navbar">
                        <ul class="nav navbar-nav text-center tv-hover-effect">
                            @if (!isset($_SESSION['userDetails']))
                                <li><a data-toggle="modal" href='#loginModal' class="tv-menu" data-hover="Log In"><span>Log In</span></a></li>
                            @else
                                <li class="tv-drop-menu">
                                    <a data-toggle="dropdown" aria-expanded="false" class="tv-menu"><span>Welcome, {{ $_SESSION['userDetails']['first_name'] . ' ' . $_SESSION['userDetails']['last_name'] }}</span><i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu tv-sub-menu">
                                        <li class="dropdown-submenu Navigation-listItem is-dropdown" align="center">
                                            <a href="{{ url('/logout') }}">Log Out</a>
                                        </li>
                                    </ul>
                                </li>        
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--End Navigation Section-->
    <!--Banner Section-->
    <div class="tv-banner-image" style="background: rgba(0, 0, 0, 0) url('images/Image9.png') no-repeat scroll center top / cover;">
        <div class="tv-banner-title">
            <h2>Welcome To</h2>
            <h1>Foodie Miracles</h1>
            <div class="tv-title-line-effect">
                <i class="icon"></i>
            </div>
            <p>Modern Restaurant & Fast Food House</p>
        </div>
    </div>
    <!--End Banner Section-->
</header>

<div class="modal fade" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body" align="center">
                <a href="{{ url('/auth-login/google') }}">
                    <img src="images/google_bttn.png" alt="login_with_google" height="130" width="320">
                </a>
                <a href="{{ url('/auth-login/facebook') }}">
                    <img src="images/fb_bttn.png" alt="login_with_facebook" height="53" width="253">
                </a>
                <hr style="border-bottom:1px #e5e5e5">
                <div align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>