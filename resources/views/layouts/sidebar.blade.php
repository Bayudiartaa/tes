<div class="main-sidebar">
    <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Master</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Ms</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('dashboard') !!}"><i class="fas fa-home"></i><span>Dashboard</span></a>
        </li>
        <li class="nav-item dropdown {{ Request::segment(1) == 'sales' ? 'active' : '' }}">
            <a class="nav-link" href="{!! route('sales.index') !!}"><i class="fas fa-users"></i><span>Sales</span></a>
        </li>
    </ul>
    </aside>
</div>
