<header>
    <!--Navigation Section-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="navbar-header text-center">
                        <a href="{{ url('/') }}" class="navbar-brand">True Taste</a>
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
                            <li class="tv-drop-menu">
                                <a href="{{ url('/') }}" data-hover="Home" class="tv-menu"><span>home</span></a>
                            </li>
                            <li class=""><a href="menu.html" class="tv-menu" data-hover="Menu"><span>Menu</span></a></li>
                            <li class=""><a href="events.html" class="tv-menu" data-hover="Events"><span>Events</span></a></li>
                            <li class=""><a href="about.html" class="tv-menu" data-hover="About"><span>About</span></a></li>
                            <li><a href="{{ url('/contact-us') }}" class="tv-menu" data-hover="Contact Us"><span>contact us</span></a></li>
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
            <h1>True Taste</h1>
            <div class="tv-title-line-effect">
                <i class="icon"></i>
            </div>
            <p>Modern Restaurant & Fast Food House</p>
        </div>
    </div>
    <!--End Banner Section-->
</header>