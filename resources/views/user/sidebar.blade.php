<div class="col-lg-3 col-12">
    <ul class="profile-sidebar">
        <li class="active"><a href="{{route('profile')}}"><i class="fas fa-user"></i> My Account</a></li>
        <li><a href="{{route('profile.getEdit')}}"><i class="fas fa-edit"></i> Edit Account</a></li>
        <li><a href="{{route('orders')}}"><i class="fas fa-shopping-cart"></i> My Orders ({{auth()->user()->Orders->count()}})</a></li>
        <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>