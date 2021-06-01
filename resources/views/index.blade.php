@include('layout.header')
    <body>
        @include('layout.navbar')
        <section class="mb-5 homepage">
            <div class="container-fluid">
                <div class="row first-section-slider">
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div class="owl-carousel" id="homeage-hero-slider">
                            <img src="{{url('public/images')}}/homepage/slider1.png" class="img-responsive" alt="">
                            <img src="{{url('public/images')}}/homepage/slider2.png" class="img-responsive" alt="">
                            <img src="{{url('public/images')}}/homepage/slider3.png" class="img-responsive" alt="">
                            <img src="{{url('public/images')}}/homepage/slider4.png" class="img-responsive" alt="">
                            <img src="{{url('public/images')}}/homepage/slider5.png" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <a href="{{route('sell.howToSellWithUs')}}"><img src="{{url('public/images')}}/homepage/sell-to-us-slide.jpg" class="w-100 h-auto mb-2" alt=""></a>
                        <a href="#"><img src="{{url('public/images')}}/homepage/installments-slide.jpg" class="w-100 h-auto mb-2" alt=""></a>
                        <a href="{{route('products')}}"><img src="{{url('public/images')}}/homepage/shop-now-slide.jpg" class="w-100 h-auto mb-2" alt=""></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-5 top-designer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="sect-title"><span>Top Designers</span></h2>
                        <div class="mwslider">
                            <ul class="owl-carousel" id="homepage-designers-slider">
                                @forelse ($FeaturedBrands as $Brand)
                                <li>
                                    <a href="{{route('products', ['brand' , $Brand->slug])}}">
                                        <img src="{{$Brand->ImageSrc}}" alt="{{$Brand->title}}">
                                        <span class="slide-name">{{$Brand->title}}</span>
                                    </a>
                                </li>
                                @empty

                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-5 trends">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="sect-title"><span>Latest Trends</span></h2>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <a href="{{route('products' , ['brand' , 'chanel'])}}">
                                    <img class="w-100 max-auto mb-lg-0 mb-3" src="{{url('public/images')}}/homepage/chanel-latest-trends.jpg">
                                </a>
                            </div>
                            <div class="col-lg-4 col-12">
                                <a href="{{route('products' , ['brand' , 'prada'])}}">
                                    <img class="w-100 max-auto mb-lg-0 mb-3" src="{{url('public/images')}}/homepage/prada-latest-trends.jpg">
                                </a>
                            </div>
                            <div class="col-lg-4 col-12">
                                <a href="{{route('products' , ['category' , 'handbags'])}}">
                                    <img class="w-100 h-100 max-auto mb-lg-0 mb-3" src="{{url('public/images')}}/homepage/go-yard-latest-trends.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="sect-title"><span>New Arrivals</span></h2>
                        <ul class="owl-carousel" id="homepage-new-arrivals-slider">
                            @forelse ($NewArrivals as $NProduct)
                                @if($NProduct == null)
                                @else
                                    <li>
                                        <a href="{{route('product.single' , [$NProduct->slug,$NProduct->id])}}">
                                            <img src="{{$NProduct->Thumb}}"
                                                alt="{{$NProduct->title}}">
                                            <span class="slide-name">{{$NProduct->title}}</span>
                                        </a>
                                    </li>
                                @endif
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="sect-title"><span>Most Wanted</span></h2>
                        <ul class="owl-carousel" id="homepage-most-wanted-slider">
                            @forelse ($FeaturedProducts as $Product)
                                @if($Product == null)
                                @else
                                    <li>
                                        <a href="{{route('product.single' , [$Product->slug , $Product->id])}}">
                                            <img src="{{$Product->Thumb}}" alt="{{$Product->title}}">
                                            <span class="slide-name">{{$Product->title}}</span>
                                        </a>
                                    </li>
                                @endif
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-5 sell-item">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="{{route('sell.howToSellWithUs')}}" class="web">
                            <img src="{{url('public/images')}}/homepage/SellYourItem.jpg" class="sell-banner" alt="sell your item en"></a>
                        <a href="{{route('sell.howToSellWithUs')}}" class="mobile"><img src="{{url('public/images')}}/homepage/SellYourItemMobile.png" class="sell-banner" alt="sell your item en"></a>
                    </div>
                </div>
            </div>
        </section>
        @include('components.newsletter')
        @include('layout.footer')
        @include('layout.scripts')
    </body>
</html>
