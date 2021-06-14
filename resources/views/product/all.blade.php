@include('layout.header' , [
'PageTitle' => 'All Products'
])

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
                                            <li><input type="radio" @if ($r->color == '') checked @endif name="color" value=""> ALL
                                                COLORS</li>
                                            @forelse ($AllColors as $Color)
                                                @if (strpos($Color, '/'))
                                                @else
                                                    <li><input type="radio" @if ($r->color == $Color) checked @endif name="color" value="{{ $Color }}">
                                                        {{ ucfirst($Color) }} <span
                                                            style="display:inline-block;height:15px;width:15px;margin-bottom:-3px;background:{{ strtolower($Color) }};border-radius:50px;"></span>
                                                    </li>
                                                @endif
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
                                            <li><input type="radio" @if ($r->size == '') checked @endif name="size" value=""> All
                                                Sizes</li>
                                            @forelse ($AllSizes as $Size)
                                                @if (is_numeric($Size) || $Size == null)
                                                @else
                                                    <li><input type="radio" @if ($r->size == $Size) checked @endif name="size" value="{{ $Size }}">
                                                        {{ $Size }}</li>
                                                @endif
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
                                            <li><input type="radio" @if ($r->condition == '') checked @endif name="condition" value=""> All
                                            </li>
                                            <li><input type="radio" @if ($r->condition == 'New') checked @endif name="condition" value="New">
                                                New</li>
                                            <li><input type="radio" @if ($r->condition == 'Preowned') checked @endif name="condition" value="Preowned"> Preowned</li>
                                        </ul>
                                    </div>
                                    <div class="shop-by-price">
                                        <div class="filter-section">
                                            <h2><i class="fas fa-dollar-sign"></i> Price</h2>
                                        </div>
                                        <ul class="filter-list-items">
                                            <li><input type="number" name="price_from"
                                                    value="{{ $r->price_from ?? '' }}" placeholder="From"></li>
                                            <li><input type="number" name="price_to" value="{{ $r->price_to ?? '' }}"
                                                    placeholder="To"></li>
                                        </ul>
                                        <button class="btn btn-brand d-block w-100" type="submit"><i
                                                class="fas fa-filter"></i> Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <h1 class="mb-4">All Products @if ($TheFilter) in
                        <b>{{ $TheFilter->title }}</b> @endif
                </h1>
                <div class="row ajax-products-list">
                    @forelse ($AllProducts as $Product)
                        <div class="col-lg-4 col-6">
                            <div class="single-product">
                                <a href="{{ route('product.single', [$Product->slug,$Product->id]) }}" title="{{ $Product->title }}"
                                    class="product-image">
                                    <img src="{{ $Product->Thumb }}" alt="{{ $Product->title }}" />
                                </a>
                                <div class="moreinfo">
                                    <h4 class="brand-info text-left mt-1"><a
                                            href="{{ route('products', ['brand', $Product->Brand->slug]) }}">{{ $Product->Brand->title }}</a>
                                    </h4>
                                    <h2 class="product-name text-left"><a
                                            href="{{ route('product.single', [$Product->slug,$Product->id]) }}"
                                            title="{{ $Product->title }}">{{ $Product->title }}</a></h2>
                                    <p class="price mt-2">
                                        {{ convertCurrency($Product->price, 'USD', getCurrency()['code']) . getCurrency()['symbole'] }}
                                    </p>
                                </div>
                                @if (isInUserCart(getUserId(), $Product->id))
                                    <a class="btn btn-brand"><i class="fas fa-check"></i> Added to Cart</a>
                                @else
                                    @if ($Product->CartReady)
                                        <a class="btn btn-brand add-to-cart" data-target="{{ route('cart.add') }}"
                                            data-id="{{ $Product->id }}" data-user="{{ getUserId() }}"
                                            href="javascript:;"><i class="fas fa-cart-plus"></i> Add to cart</a>
                                    @else
                                        <a class="btn btn-brand pre-oreder-modal-toggler" href="javascript:;"
                                            data-target="pre-oreder-modal" data-title="{{ $Product->title }}"
                                            data-sku="{{ $Product->sku }}"><i class="fas fa-cart-plus"></i> Pre
                                            Order</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @empty
                        <p>There is no products in this filters</p>
                    @endforelse
                </div>
                <div class="col-12 text-center" id="load-more"></div>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @include('layout.scripts')
    <script>
        // var getParams = function (url) {
        //     var params = {};
        //     var parser = document.createElement('a');
        //     parser.href = url;
        //     var query = parser.search.substring(1);
        //     var vars = query.split('&');
        //     for (var i = 0; i < vars.length; i++) {
        //         var pair = vars[i].split('=');
        //         params[pair[0]] = decodeURIComponent(pair[1]);
        //     }
        //     return params;
        // };
        // var ClickCount = 0;
        // $('.next-link').click(function(e){
        //     $(this).html('<i class="fas fa-spinner fa-spin"></i>');
        //     e.preventDefault();
        //     var AjaxParameters = getParams($(this).attr('href'));
        //     var AjaxLink = $(this).attr('href').substring('fsd', $(this).attr('href').indexOf("page"))
        //     AjaxLink = AjaxLink + 'page=' + (parseInt(AjaxParameters.page)+ClickCount);
        //     //Make Ajax Request
        //     $.ajax({
        //         url: AjaxLink,
        //         method: 'get',
        //         success: function(response){
        //             //Grab the data and append it to the current div
        //             ClickCount += 1;
        //             if($('.ajax-products-list' , response).html().includes('<p>There is no products in this filters</p>')){
        //                 $('.ajax-products-list').append('<div class="col-12"><p class="text-center">You have seen all the products in this filter</p></div>');
        //                 $('.next-link').css('display' , 'none');
        //             }else{
        //                 $('.ajax-products-list').append($('.ajax-products-list' , response).html());
        //                 $('.next-link').html('Load More Products');
        //             }
        //         },
        //         error:function(response){
        //             $('.ajax-products-list').append("<p class='text-center'>Something went wrong</p>");
        //         }
        //     });
        // });


        //Modern Infinit Scroll
        var PageElements = $('.ajax-products-list').children();
        var ScrollCount = 1;
        //Clear the page
        $('.ajax-products-list').html('');
        //Show only 18 as a start
        PageElements.each(function(index, item) {
            if ((ScrollCount * 18) > index) {
                $('.ajax-products-list').append(item);
            }
        });
        $(window).scroll(function() {
            var scrollPercent = 100 * $(window).scrollTop() / ($(document).height() - $(window).height());
            //Now , Dedect scroll action and act accordingally
            if (scrollPercent > 90) {
                $('#load-more').html('<i class="fas fa-spinner fa-spin fa-5x"></i>');
                ScrollCount = ScrollCount + 1;
                PageElements.each(function(index, item) {
                    if ((ScrollCount * 18) > index) {
                        if (item == '') {
                            alert('Done.');
                        } else {
                            $('.ajax-products-list').append(item);
                        }
                    }
                });
                $('#load-more').html('');
            }
        });

    </script>
</body>

</html>
