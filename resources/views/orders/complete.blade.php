@include('layout.header' , [
    'PageTitle' => 'Order Success'
])
<body>
    @include('layout.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-3">Success!</h1>
                <p>Your order has been created, a recipt has been emailed to {{auth()->user()->email}}</p>
                <a href="{{route('home')}}" class="btn btn-brand">Back to Homepage</a>
            </div>
        </div>
    </div>
</body>
</html>
