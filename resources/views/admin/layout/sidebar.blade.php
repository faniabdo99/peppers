    <div class="sidebar text-white bg-dark">
        <div class="logo"><a href="{{route('admin.home')}}" class="simple-text logo-normal " id="admin-header">
            Pepper's Dashboard
        </a>
    </div>
    <ul class="nav">
        <li class="nav-item admin-item ">
            <a class="nav-link" href="./dashboard.html">
                <i class="material-icons">category</i>
                <p>Products</p>
            </a>
        </li>
        <li class="nav-item admin-item">
            <a class="nav-link" href="{{route('admin.categories.all')}}">
                <i class="material-icons">library_books</i>
                <p>Categories</p>
            </a>
        </li>
        <li class="nav-item admin-item ">
            <a class="nav-link" href="{{route('admin.discount.all')}}">
                <i class="material-icons">content_paste</i>
                <p>Discounts List</p>
            </a>
        </li>
        <li class="nav-item admin-item">
            <a class="nav-link" href="{{route('admin.coupons.all')}}">
                <i class="material-icons">sell</i>
                <p>Coupons</p>
            </a>
        </li>
        <li class="nav-item admin-item">
            <a class="nav-link" href="./map.html">
                <i class="material-icons">list_alt</i>
                <p>Orders</p>
            </a>
        </li>
        <li class="nav-item admin-item">
            <a class="nav-link" href="{{route('admin.blog.all')}}">
                <i class="material-icons">article</i>
                <p>Blogs</p>
            </a>
        </li>
        <li class="nav-item admin-item">
            <a class="nav-link" href="{{route('admin.blog.all')}}">
                <i class="material-icons">unsubscribe</i>
                <p>Newsletter</p>
            </a>
        </li>
        <li class="nav-item admin-item">
            <a class="nav-link" href="./user.html">
                <i class="material-icons">person</i>
                <p>Users</p>
            </a>
        </li>
    </ul>
        </div>
    </div>
