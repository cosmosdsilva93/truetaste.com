<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <h4>{{ $title }}</h4>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
				<li>
                    <a href="{{ url('/admin/logout') }}">
						<span><i class="fa fa-sign-out" aria-hidden="true"></i></span>
						<p>Logout</p>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>