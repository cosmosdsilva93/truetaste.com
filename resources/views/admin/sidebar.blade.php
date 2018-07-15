	
<div class="sidebar" data-background-color="white" data-active-color="danger">
<!--
	Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
	Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->
	<div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('/dashboard') }}" class="simple-text">
                Airlatte Admin
            </a>
        </div>
        <ul class="nav">
            <li class="{{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('/dashboard') }}">
                    <i class="fa fa-pie-chart" aria-hidden="true"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <!-- <li class="{{ Request::segment(1) == 'bookings' ? 'active' : '' }}">
                <a href="{{ url('/bookings') }}">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                    <p>Bookings</p>
                </a>
            </li> -->
            <li class="{{ Request::segment(1) == 'helipads' ? 'active' : '' }}">
                <a href="{{ url('/helipads') }}">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    <p>Helipads</p>
                </a>
            </li>
            <li class="{{ Request::segment(1) == 'routes' ? 'active' : '' }}">
                <a href="{{ url('/routez') }}">
                    <i class="fa fa-road" aria-hidden="true"></i>
                    <p>Routes</p>
                </a>
            </li>
            <li class="{{ Request::segment(1) == 'users' ? 'active' : '' }}">
                <a href="{{ url('/users') }}">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <p>Users</p>
                </a>
            </li>
        </ul>
	</div>
</div>