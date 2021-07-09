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
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Latest Orders</h4>
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
                                                        <td>{{$Order->payment_method}}</td>
                                                        <td>{{$Order->total}}$</td>
                                                        <td><a href="#">Details</a></td>
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
<<<<<<< HEAD
=======
        

>>>>>>> f87d5fce8734834d767d7f1881705e6740ca282f
    </div>
    @include('admin.layout.scripts')
</body>

</html>
