@include('admin.layout.header')
<body>
    <div class="wrapper ">
        @include('admin.layout.sidebar')
        <div class="main-panel">
            @include('admin.layout.navbar')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.layout.noto')
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Testing Phase</h4>
                                    <p class="card-category">This section is only available during the testing phase, Please be careful since any click <span class="bg-danger">WILL NOT require confirmation</span></p>
                                </div>
                                <div class="card-body">
                                    <h4 class="font-weight-bold">Reset Orders</h4>
                                    <p>After clicking the button below, The system will automatically delete all the orders and cart records.</p>
                                    <a href="{{route('admin.resetOrder')}}" class="btn btn-danger">Reset Orders System</a>
                                    <br><br><br>
                                    <h4 class="font-weight-bold">Re-Generate Test Products</h4>
                                    <p>After clicking the button below, The system will automatically delete all the current testing products and create new ones, Also the users cart will be cleared.</p>
                                    <a href="{{route('admin.resetProducts')}}" class="btn btn-danger">Re-Generate Products</a>
                                    <br><br><br>
                                    <h4 class="font-weight-bold">Reset Users</h4>
                                    <p>After clicking the button below, The system will automatically delete all the users except the admin user.</p>
                                    <a href="{{route('admin.resetUsers')}}" class="btn btn-danger">Reset Users</a>
                                </div>
                            </div>
                            <a href="#">Reset Test Data</a>
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Latest Orders</h4>
                                    <p class="card-category">Last 10 Orders Made in Peppers Closet</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <th>ID</th>
                                                <th>Date</th>
                                                <th>Customer Name</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                                @forelse ($LatestOrders as $Order)
                                                    <tr>
                                                        <td>{{$Order->id}}</td>
                                                        <td>{{$Order->created_at->format('Y-m-d')}}</td>
                                                        <td>{{$Order->name}}</td>
                                                        <td>{{$Order->status}}</td>
                                                        <td>{{$Order->PaymentMethodText}}</td>
                                                        <td>{{$Order->FinalTotal}}$</td>
                                                        <td><a href="{{route('admin.orders.single' , $Order->id)}}">Details</a></td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.scripts')
</body>
</html>