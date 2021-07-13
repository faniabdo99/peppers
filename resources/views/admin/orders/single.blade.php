@include('admin.layout.header')
<body>
    <div class="wrapper ">
        @include('admin.layout.sidebar')
        <div class="main-panel">
            <!-- Navbar -->
            @include('admin.layout.navbar')
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.layout.noto')
                            <button class="btn btn-primary no-print" onclick="window.print()"><i class="material-icons">print</i> Print / Save to PDF</button>
                            <div class="card mb-5">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Order: #{{$TheOrder->tracking_number}}</h4>
                                </div>
                                <div class="card-body">
                                    <h3 class="ml-2">Basic Information:</h3>
                                    <div class="single-order-information">
                                        <h5>Order ID:</h5>
                                        <p>{{$TheOrder->id}}</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Tracking Number:</h5>
                                        <p>{{$TheOrder->tracking_number}}</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Status:</h5>
                                        <p>{{$TheOrder->status}}</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Customer Name:</h5>
                                        <p>{{$TheOrder->name}}</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Phone Number:</h5>
                                        <p><a class="text-dark" href="tel:{{$TheOrder->phone_number}}">{{$TheOrder->phone_number}}</a></p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Email:</h5>
                                        <p><a class="text-dark" href="mailto:{{$TheOrder->email}}">{{$TheOrder->email}}</a></p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Order Notes:</h5>
                                        <p>@if($TheOrder->order_notes) {{$TheOrder->order_notes}} @else N/A @endif</p>
                                    </div>
                                    <h3 class="ml-2">Shipping Information:</h3>
                                    <div class="single-order-information">
                                        <h5>Country:</h5>
                                        <p>{{$TheOrder->country}}</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>City:</h5>
                                        <p>{{$TheOrder->city}}</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Address:</h5>
                                        <p>{{$TheOrder->address}}</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Address #2:</h5>
                                        <p>@if($TheOrder->address_2) {{$TheOrder->address_2}} @else N/A @endif</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>ZIP Code:</h5>
                                        <p>@if($TheOrder->zip_code) {{$TheOrder->zip_code}} @else N/A @endif</p>
                                    </div>
                                    <h3 class="ml-2">Financial Information:</h3>
                                    <div class="single-order-information">
                                        <h5>Total:</h5>
                                        <p>{{$TheOrder->FinalTotal}}$</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Subtotal:</h5>
                                        <p>{{$TheOrder->total_amount}}$</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Shipping Costs</h5>
                                        <p>{{$TheOrder->total_shipping_cost}}$</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Payment Method</h5>
                                        <p>{{$TheOrder->PaymentMethodText}}</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Is Paid</h5>
                                        <p>@if($TheOrder->is_paid) Yes @else No @endif</p>
                                    </div>
                                    <div class="single-order-information">
                                        <h5>Paymob Transaction ID</h5>
                                        <p>@if($TheOrder->payment_id) {{$TheOrder->payment_id}} @else N/A @endif</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-5">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Order Products</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>Image</th>
                                            <th>SKU</th>
                                            <th>Price</th>
                                            <th>Title</th>
                                        </thead>
                                        <tbody>
                                            @forelse($TheOrder->Items()->get() as $Item)
                                                <tr>
                                                    <td width="15%"><img width="50" src="{{$Item->Product->Thumb}}"></td>
                                                    <td width="15%">{{$Item->Product->sku}}</td>
                                                    <td width="15%">{{$Item->Product->price}}$</td>
                                                    <td width="55%"><a target="_blank" href="{{route('product.single' , [$Item->Product->slug , $Item->Product->id])}}">{{$Item->Product->title}}</a></td>
                                                </tr>
                                            @empty
                                                <p>There are no products</p>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card no-print">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Update Order Status</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('admin.orders.updateStatus')}}" method="post">
                                        @csrf
                                        <input type="text" hidden name="order_id" value="{{$TheOrder->id}}">
                                        <label>Order Status</label>
                                        <select class="form-control" name="status" required>
                                            <option value="">Select Order Status</option>
                                            <option value="Complete">Complete</option>
                                            <option value="Order Shipped">Order Shipped</option>
                                            <option value="Awaites Payment">Awaites Payment</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                        <br>
                                        <input type="checkbox" name="notify_user" id="notify_user"> <label for="notify_user">Notify User By Email</label>
                                        <br><br>
                                        <button class="btn btn-primary" type="submit">Update Status</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.layout.scripts')
        </div>
    </div>
    @include('admin.layout.scripts')
</body>
</html>
