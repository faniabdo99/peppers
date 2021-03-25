@include('layout.header')

<body>
    @include('layout.navbar')

    <section class="container p-5 404-page">
        <img src="{{url('public/images')}}/error/404-pages.jpg" alt="" style="width:inherit">

    </section>
    <section class="container">
            <div class="row">
            <div class="col-lg-12 d-flex justify-content-between">
                <a href="{{route('home')}}" target="_blank"> Main Page</a>
                <a href="{{route('products')}}" target="_blank"> Our Products</a>
                <a href="{{route('sell.howToSellWithUs')}}" target="_blank"> How To Sell With Us</a>
                <a href="{{route('static.faqs')}}" target="_blank"> FAQs</a>
                <a href="{{route('static.whoWeAre')}}" target="_blank"> Who We Are</a>
            </div>
            </div>
    </section>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>
