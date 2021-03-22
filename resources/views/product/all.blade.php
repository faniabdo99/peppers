@include('layout.header')
<body>
    @include('layout.navbar')
    <div class="container all-products-page">
        <div class="row mt-5">
            <div class="col-lg-3 col-12">
                <div class="sidebar">
                    <form action="#" method="get">
                        <div class="block block-layered-nav">
                            <div class="block-content">
                                <div id="narrow-by-list">
                                    <div class="shop-by-color">
                                        <div class="filter-section">
                                            <h2><i class="fas fa-palette"></i> Color</h2>
                                        </div>
                                        <ul class="filter-list-items">
                                            @forelse ($AllColors as $Color)
                                                <li><input type="radio" @if($r->color == $Color) checked @endif name="color" value="{{$Color}}"> {{$Color}}</li>
                                            @empty
                                                <p>No Colors to show</p>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="shop-by-color">
                                        <div class="filter-section">
                                            <h2><i class="fas fa-ruler-combined"></i>Size</h2>
                                        </div>
                                        <ul class="filter-list-items">
                                            @forelse ($AllSizes as $Size)
                                                <li><input type="radio" @if($r->size == $Size) checked @endif name="size" value="{{$Size}}"> {{$Size}}</li>
                                            @empty
                                                <p>No Sizes to show</p>
                                            @endforelse
                                        </ul>
                                    </div>
                                    <div class="shop-by-condition">
                                        <div class="filter-section">
                                            <h2><i class="fas fa-sun"></i> Condition</h2>
                                        </div>
                                        <ul class="filter-list-items">
                                            <li><input type="radio" @if($r->condition == 'New') checked @endif name="condition" value="New"> New</li>
                                            <li><input type="radio" @if($r->condition == 'Pre Owned') checked @endif name="condition" value="Pre Owned"> Pre Owned</li>
                                        </ul>
                                    </div>
                                    <div class="shop-by-price">
                                        <div class="filter-section">
                                            <h2><i class="fas fa-dollar-sign"></i> Price</h2>
                                        </div>
                                        <ul class="filter-list-items">
                                            <li><input type="number" name="price_from" value="{{$r->price_from ?? ''}}" placeholder="From"></li>
                                            <li><input type="number" name="price_to" value="{{$r->price_to ?? ''}}" placeholder="To"></li>
                                        </ul>
                                        <button class="btn btn-brand d-block w-100" type="submit"><i class="fas fa-filter"></i> Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <h1 class="mb-4">All Products 
                    @if($TheFilter)
                        in <b>{{$TheFilter->title}}</b>
                    @endif
                    ({{$AllProducts->count()}})</h1>
                <div class="row">
                    @forelse ($AllProducts as $Product)
                    <div class="col-lg-4 col-6">
                        <div class="single-product">
                            <a href="{{route('product.single' , $Product->slug)}}" title="{{$Product->title}}" class="product-image">
                                <img src="{{$Product->Thumb}}" alt="{{$Product->title}}"/>
                            </a>
                            <div class="moreinfo">
                                <h2 class="product-name text-left"><a href="{{route('product.single' , $Product->slug)}}" title="{{$Product->title}}">{{$Product->title}}</a></h2>
                                <h4 class="brand-info text-left mt-1"><a href="{{route('products' , ['brand' , $Product->Brand->slug])}}">{{$Product->Brand->title}}</a></h4>
                                <p class="price mt-2">{{convertCurrency($Product->price , 'USD' , getCurrency()['code']) . getCurrency()['symbole']}}</p>
                            </div>
                            <a href="#" class="add-to-cart btn btn-brand d-block w-100 mt-3">Add to Cart</a>
                        </div>
                    </div>
                    @empty
                    <p>There is no products in this filters</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>
