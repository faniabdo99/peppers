@include('layout.header' , [
    'PageTitle' => 'My Orders'
])
<body>
    @include('layout.navbar')
    <div class="container user-profile">
        <div class="row">
            @include('user.sidebar')
            <div class="col-lg-9 col-sm-12">
                <h2>My Orders ({{auth()->user()->Orders->count()}})</h2>
                <table class="table table-striped">
                    <thead>
                        <th>Tracking Number</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Payment Method</th>
                    </thead>
                    <tbody>
                        @forelse (auth()->user()->Orders as $Order)
                        <tr>
                            <td>{{$Order->tracking_number}}</td>
                            <td>{{convertCurrency($Order->FinalTotal , 'USD' , getCurrency()['code']) . getCurrency()['symbole']}}</td>
                            <td>{{$Order->status}}</td>
                            <td>{{$Order->PaymentMethodText}}</td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>
