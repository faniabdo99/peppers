@include('layout.header')
<body>
    @include('layout.navbar')
    <div class="container user-profile">
        <div class="row">
            @include('user.sidebar')
            <div class="col-lg-9 col-sm-12">
                <p>
                    Hello, <b>{{auth()->user()->name}}</b><br>
                    From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.
                </p>
                <ul class="profile-orders-statistics">
                    <li><i class="fas fa-shopping-cart"></i><br> (25) Completed Orders</li>
                    <li><i class="fas fa-spinner fa-spin"></i><br> (3) In Progress Orders</li>
                    <li><i class="fas fa-truck"></i><br> (5) Ready to Ship</li>
                </ul>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>
