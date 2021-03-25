@include('layout.header')

<body>
    @include('layout.navbar')



    <div class="container p-5">
        <img src="{{url('public/images')}}/error/500.jpg" style="width:inherit" />

    </div>

    <section class="container p-5">
        <div class="row  justify-content-between">
            <div class="col-lg-6 col-md-12 d-flex justify-content-between">
                <a href="{{route('home')}}" target="_blank"> Main Page</a>
                <a href="{{route('products')}}" target="_blank"> Our Products</a>
                <a href="{{route('products')}}" target="_blank"> Contact Us</a>
            </div>
            <div class="col-lg-6 col-md-12 d-flex justify-content-between">
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
