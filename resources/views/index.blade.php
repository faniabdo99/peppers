@include('layout.header')
    <body>
        @include('layout.navbar')
        <section class="mb-5 homepage">
            <div class="container-fluid">
                <div class="row first-section-slider">
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div class="owl-carousel" id="homeage-hero-slider">
                            <img src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/slider1.png" class="img-responsive" alt="">
                            <img src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/slider2.png" class="img-responsive" alt="">
                            <img src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/slider3.png" class="img-responsive" alt="">
                            <img src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/slider4.png" class="img-responsive" alt="">
                            <img src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/slider5.png" class="img-responsive" alt="">
                        </div>                                               
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <a href="https://peppersluxury.com/how-to-sell-with-us"><img src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/side-1.png" class="w-100 h-auto mb-2" alt=""></a>
                        <a href="https://peppersluxury.com/designers/all-brands/rolex.html"><img src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/side-2.png" class="w-100 h-auto mb-2" alt=""></a>
                        <a href="https://peppersluxury.com/accessories.html"><img src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/side-3.png" class="w-100 h-auto mb-2" alt=""></a>
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
                                        <img src="https://peppersluxury.com/media/catalog/category/4.jpg"
                                            alt="{{$Brand->title}}">
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
                                    <a href="{{route('products' , ['brand' , 'saint-laurent-paris'])}}">
                                    <img class="w-100 max-auto mb-lg-0 mb-3" src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/SaintLaurentParisLatestTrendsEN1529959065.png">
                                </a>
                            </div>
                            <div class="col-lg-4 col-12">
                                <a href="{{route('products' , ['brand' , 'chloe'])}}">
                                    <img class="w-100 max-auto mb-lg-0 mb-3" src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/ChloeEdit_LatesTrends_EN.png">
                                </a>
                            </div>
                            <div class="col-lg-4 col-12">
                                <a href="{{route('products' , ['brand' , 'cartier'])}}">
                                    <img class="w-100 max-auto mb-lg-0 mb-3" src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/Cartier_LatestTrends_EN.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-5 most-wanted">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="sect-title"><span>Most Wanted</span></h2>
                        <ul class="owl-carousel" id="homepage-most-wanted-slider">
                            @forelse ($FeaturedProducts as $Product)
                                <li>
                                    <a href="{{route('product.single' , $Product->slug)}}">
                                        <img src="{{$Product->Thumb}}"
                                            alt="{{$Product->title}}">
                                        <span class="slide-name">{{$Product->title}}</span>
                                    </a>
                                </li>    
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
                        <a href="https://peppersluxury.com/how-to-sell-with-us" class="web">
                            <img src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/SellYourItem.jpg"
                            class="sell-banner" alt="sell your item en"></a>
                        <a href="https://peppersluxury.com/how-to-sell-with-us" class="mobile"><img
                            src="https://peppersluxury.com/media/wysiwyg/decostore/homePage/SellYourItemMobile.png"
                            class="sell-banner" alt="sell your item en"></a>
                    </div>
                </div>
            </div>
        </section>
        @include('components.newsletter')
        @include('layout.footer')
        @include('layout.scripts')
    </body>
</html>
