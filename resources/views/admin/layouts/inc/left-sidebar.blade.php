<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset(Auth::user()->image) }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown">John Doe</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"> keyboard_arrow_down </i>
                <ul class="dropdown-menu slideUp">
                    <li><a href="profile.html"><i class="material-icons">person</i>Profile</a></li>
                    <li class="divider"></li>
                </ul>
            </div>
            <div class="email">john.doe@example.com</div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
            </li>

            <li><a href="{{ route('about.index') }}"><i class="zmdi zmdi-assignment"></i><span>About</span> </a></li>

            <li><a href="{{ route('banner.index') }}"><i class="zmdi zmdi-assignment"></i><span>Banner</span> </a></li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Brand</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('brand.create') }}">Add Brand</a></li>
                    <li><a href="{{ route('brand.index') }}">All Brand</a></li>
                </ul>
            </li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>Project</span> </a>
                <ul class="ml-menu">
                    <li><a href="ec-product-detail.html">Category</a></li>
                    <li><a href="ec-product.html">Add Product</a></li>
                    <li><a href="ec-product-List.html">All Product</a></li>
                </ul>
            </li>

            <li><a href="mail-inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span> </a></li>

            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>Pages</span> </a>
                <ul class="ml-menu">
                    <li><a href="{{ route('website_setting') }}">Website Setting</a></li>
                </ul>
            </li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" ><i class="zmdi zmdi-power"></i><span>Logout</span> </a>
                </form>
            </li>

        </ul>
    </div>
    <!-- #Menu -->
</aside>
