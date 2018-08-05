	
<div class="sidebar" data-background-color="white" data-active-color="danger">
<!--
	Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
	Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
-->
	<div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('/dashboard') }}" class="simple-text">
                Foodie Miracles Admin
            </a>
        </div>
        <ul class="nav">
            <li class="{{ Request::segment(2) == 'customer-orders' ? 'active' : '' }}">
                <a href="{{ url('/admin/orders') }}">
                    <i class="fa fa-pie-chart" aria-hidden="true"></i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'menu' ? 'active' : '' }}">
                <a href="{{ url('/admin/menu') }}">
                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                    <p>Menu</p>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'queries' ? 'active' : '' }}">
                <a href="{{ url('/admin/queries') }}">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    <p>Queries</p>
                </a>
            </li>
        </ul>
	</div>
</div>