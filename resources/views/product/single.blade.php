@include('layout.header' , [
    'PageTitle' => $TheProduct->title
])
<body>
    @include('layout.navbar')
    <div class="product-view">
        <div class="product-essential py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="product-img-box">
                            <div class="product-slider">
                                <div class="slide-wrap">
                                    <div id="productCarousel" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                                <li data-target="#productCarousel" data-slide-to="0" class="active" style="background-image:url('{{$TheProduct->SmallThumb}}');"></li>
                                            @forelse ($TheProduct->Gallery as $key => $GalleryItem)
                                                <li data-target="#productCarousel" data-slide-to="{{$key+1}}" style="background-image:url('{{$GalleryItem->SmallThumb}}');"></li>
                                            @empty
                                            @endforelse
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <a data-fancybox="gallery" href="{{$TheProduct->FullSize}}">
                                                    <img src="{{$TheProduct->Thumb}}">
                                                </a>
                                            </div>
                                            @forelse ($TheProduct->Gallery as $key => $GalleryItem)
                                            <div class="carousel-item">
                                                <a data-fancybox="gallery" href="{{$GalleryItem->FullSize}}">
                                                    <img src="{{$GalleryItem->Thumb}}">
                                                </a>
                                            </div>
                                            @empty
                                            @endforelse
                                        </div>
                                        <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                                            <i class="fas fa-chevron-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                                            <i class="fas fa-chevron-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="social_shopping">
                                    <span>Share:</span>
                                    <div class="social_shopping1">
                                        <a href="http://www.facebook.com/share.php?u={{url()->current()}}" class="link-facebook faceognal" target="_blank">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </div>
                                    <div class="social_shopping1">
                                        <a href="https://www.pinterest.com/pin/create/button/?url={{url()->current()}}&amp;media={{$TheProduct->FullSize}}&amp;description={{$TheProduct->title}}" class="faceognal" target="_blank">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </div>
                                    <div class="social_shopping1">
                                        <a href="http://twitter.com/share?text=Check out {{$TheProduct->title}} at @Pepperscloset&amp;url={{url()->current()}}" class="link-twitter faceognal" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </div>
                                    <div class="social_shopping1">
                                        <a href="https://api.whatsapp.com/send?text=Check%20this%20from%20Peppers%20Closet%20{{url()->current()}}" class="link-whatsapp faceognal" target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="easy_ways">
                                <div class="easy_wys_img">
                                    <ul>
                                        <li><a class="static_link" href="{{route('static.authenticity')}}" target="_blank"><i class="fas fa-check fa-2x mr-1"></i> verified<br>authenticity</a></li>
                                        <li><a class="static_link" href="{{route('static.returns')}}" target="_blank"><i class="fas fa-truck fa-2x mr-1"></i> Hassle-free<br>returns</a></li>
                                        <li><a class="static_link" href="javascript:void(0);"><i class="fas fa-lock fa-2x mr-1"></i> secure<br>transactions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="productCont">
                            <div class="product-name-main">
                                <p class="font-weight-bold"><a href="{{route('products' , ['brand',$TheProduct->Brand->slug])}}">{{$TheProduct->Brand->title}}</a></p>
                                <h1>{{$TheProduct->title}}</h1>
                                <span class="product-code">Product SKU: <strong>{{$TheProduct->sku}}</strong></span>
                            </div>
                            <div class="product-shop">
                                {{-- <p class="no-rating"><a href="#product_tabs_product_review">Be the first to review this product</a></p> --}}
                                @if($TheProduct->qty)
                                    <div class="price-box mb-4">{{convertCurrency($TheProduct->price , 'USD' , getCurrency()['code']) . getCurrency()['symbole']}}</div>
                                @endif
                                @if($TheProduct->CartReady)
                                    @if(isInUserCart(getUserId() , $TheProduct->id))
                                        <a class="btn btn-brand"><i class="fas fa-check"></i> Added to Cart</a>
                                    @else
                                        <a class="btn btn-brand add-to-cart" data-target="{{route('cart.add')}}" data-id="{{$TheProduct->id}}" data-user="{{getUserId()}}" href="javascript:;"><i class="fas fa-cart-plus"></i> Add to cart</a>
                                    @endif
                                @else
                                    <a class="btn btn-brand pre-oreder-modal-toggler" href="javascript:;" data-target="pre-oreder-modal" data-title="{{$TheProduct->title}}" data-link="{{route('product.single' , [$TheProduct->slug , $TheProduct->id])}}"><i class="fas fa-cart-plus"></i> Pre Order</a>
                                @endif
                            </div>
                        </div>
                        <div class="product-collateral">
                            <ul class="nav nav-tabs product-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#product_tabs_description_contents">Product Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#product_tabs_additional_contents">Additional Informationrmation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#product_tabs_waranty_contents">Warranty And Returns</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="product-tabs-content tab-pane fade show active" id="product_tabs_description_contents">
                                    <h2>Details</h2>
                                    {!! $TheProduct->content !!}
                                </div>
                                <div class="product-tabs-content tab-pane fade" id="product_tabs_additional_contents">
                                    <h2>Additional Information</h2>
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <th class="label">Width</th>
                                                <td class="data">{{$TheProduct->width}} CM</td>
                                            </tr>
                                            <tr>
                                                <th class="label">Height</th>
                                                <td class="data">{{$TheProduct->height}} CM</td>
                                            </tr>
                                            <tr>
                                                <th class="label">Depth</th>
                                                <td class="data">{{$TheProduct->depth}} CM</td>
                                            </tr>
                                            <tr>
                                                <th class="label">Color</th>
                                                <td class="data">{{$TheProduct->color}}</td>
                                            </tr>
                                            <tr>
                                                <th class="label">Gender</th>
                                                <td class="data">{{$TheProduct->for_gender ?? 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th class="label">Condition</th>
                                                <td class="data">{{$TheProduct->condition}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="product-tabs-content tab-pane fade" id="product_tabs_waranty_contents">
                                    <h2>Warranty And Returns</h2>
                                    <p><b>Warranty: </b>We offer a lifetime 100% authenticity guarantee for all of our
                                        items. In the improbable scenario of a sale of an inauthentic item, you will
                                        receive a 100% refund, including the cost of return.</p>
                                    <p><b>Returns: </b>Customer Service should be contacted on the same day (a maximum
                                        of eight hours after receiving the item). The customer service team will assist
                                        you in arranging the return. Refund price includes only the cost of the item,
                                        and does not include any shipping fee paid, or custom duties. Items must be
                                        received by us in the same condition as when shipped with all tags intact. If
                                        any of the packaging or seals on the item was broken, the item will not be
                                        returned or refunded, however, we can resell the item on your behalf.
                                        Please note that we mark our final sale items as ‘No return on this item’, once
                                        purchased such items cannot be returned.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>
