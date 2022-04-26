<ul class="metismenu list-unstyled" id="side-menu">
    <li class="menu-title">Main</li>

    <li>
        <a href="{{ route('member.home') }}" class="waves-effect">
            <i class="ti-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="menu-title">My Store</li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ti-archive"></i>
            <span> Products </span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="{{ route('member.product') }}">All Products</a>
            </li>
            <li>
                <a href="#">Runout Products</a>
            </li>
            <li>
                <a href="#">Entry Products</a>
            </li>
        </ul>
    </li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ti-archive"></i>
            <span> Order </span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li>
                <a href="#">All Orders</a>
            </li>
        </ul>
    </li>
</ul>
