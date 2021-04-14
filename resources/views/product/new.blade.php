@include('layout.header' , [
    'PageTitle' => 'New Products'
])
<body>
    @include('layout.navbar')
    <div class="container all-products-page">
        <div class="row mt-5">
            <div class="col-lg-12 col-12">
                <h1 class="mb-4">New Products</h1>
                <div class="row">
                    @forelse ($AllProducts as $Product)
                    <div class="col-lg-3 col-6">
                        <div class="single-product">
                            <a href="{{route('product.single' , $Product->slug)}}" title="{{$Product->title}}" class="product-image">
                                <img src="{{$Product->Thumb}}" alt="{{$Product->title}}"/>
                            </a>
                            <div class="moreinfo">
                                <h2 class="product-name text-left"><a href="{{route('product.single' , $Product->slug)}}" title="{{$Product->title}}">{{$Product->title}}</a></h2>
                                <h4 class="brand-info text-left mt-1"><a href="{{route('products' , ['brand' , $Product->Brand->slug])}}">{{$Product->Brand->title}}</a></h4>
                                <p class="price mt-2">{{convertCurrency($Product->price , 'USD' , getCurrency()['code']) . getCurrency()['symbole']}}</p>
                            </div>
                            @auth
                            @if($Product->CartReady)
                                  <a class="btn btn-brand" id="add-to-cart" data-target="{{route('cart.add')}}" data-id="{{$Product->id}}" data-user="{{auth()->user()->id}}" href="javascript:;"><i class="fas fa-cart-plus"></i> Add to cart</a>
                                @else
                                  <p class="text-danger">{{$Product->status}}</p>
                                @endif
                            @endauth
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p>There is no products in this filters</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>