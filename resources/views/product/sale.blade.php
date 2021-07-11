@include('layout.header' , [
    'PageTitle' => 'Products on Sale'
])
<body>
    @include('layout.navbar')
    <div class="container all-products-page">
        <div class="row mt-5">
            <div class="col-lg-12 col-12">
                <h1 class="mb-4">Products On Sale</h1>
                <div class="row">
                    @forelse ($AllProducts as $Product)
                    <div class="col-lg-3 col-6">
                        <div class="single-product">
                            <a href="{{route('product.single' , [$Product->slug , $Product->id])}}" title="{{$Product->title}}" class="product-image">
                                <img src="{{$Product->Thumb}}" alt="{{$Product->title}}"/>
                            </a>
                            <div class="moreinfo">
                                <h4 class="brand-info text-left mt-1"><a href="{{route('products' , ['brand' , $Product->Brand->slug])}}">{{$Product->Brand->title}}</a></h4>
                                <h2 class="product-name text-left"><a href="{{route('product.single' , [$Product->slug , $Product->id])}}" title="{{$Product->title}}">{{$Product->title}}</a></h2>
                                @if ($Product->CartReady)
                                <p class="price mt-2">
                                    {{ convertCurrency($Product->price, 'USD', getCurrency()['code']) . getCurrency()['symbole'] }}
                                </p>
                            @endif
                        </div>
                            @if(isInUserCart(getUserId() , $Product->id))
                                <a class="btn btn-brand"><i class="fas fa-check"></i> Added to Cart</a>
                            @else
                                @if($Product->CartReady)
                                    <a class="btn btn-brand add-to-cart" data-target="{{route('cart.add')}}" data-id="{{$Product->id}}" data-user="{{getUserId()}}" href="javascript:;"><i class="fas fa-cart-plus"></i> Add to cart</a>
                                @else
                                     <a class="btn btn-brand" href="{{route('contact.get')}}"><i class="fas fa-cart-plus"></i> Pre Order</a>
                                @endif
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p>There is no products on sale now, Keep visiting this page for awesome deals</p>
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
