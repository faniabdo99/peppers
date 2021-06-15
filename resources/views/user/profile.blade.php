@include('layout.header' , [
    'PageTitle' => 'My Profile'
])
<body>
    @include('layout.navbar')
    <div class="container user-profile">
        <div class="row">
            @include('user.sidebar')
            <div class="col-lg-9 col-sm-12">
                <p>
                    Hello, <b>{{auth()->user()->name}}</b><br>
                    From your My Account Dashboard you have the ability to view your orders and update your account informations.
                </p>
                {{-- <ul class="profile-orders-statistics">
                    <li><i class="fas fa-shopping-cart"></i><br> (25) Completed Orders</li>
                    <li><i class="fas fa-spinner fa-spin"></i><br> (3) In Progress Orders</li>
                    <li><i class="fas fa-truck"></i><br> (5) Ready to Ship</li>
                </ul> --}}
            </div>
        </div>
    </div>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>
