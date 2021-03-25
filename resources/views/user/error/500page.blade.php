@include('layout.header')

<body>
    @include('layout.navbar')

    <section class="container p-5 404-page" >
        <div class="row">
            <div class="col-lg-12">
            <img src="{{url('public/images')}}/error/500.jpg" style="width:inherit" />

            </div>
        </div>

    </section>
    <section class="container" id="500-page">
        <h2 class="text-center">You Can Go To</h2>
    <div class="row  justify-content-between">
            <div class="col-lg-6 col-md-12 d-flex justify-content-between flex-column">
                <a class="btn btn-warning font-weight-bold mt-3" href="{{route('home')}}" target="_blank"> Main Page</a>
                <a class="btn btn-warning font-weight-bold mt-3" href="{{route('products')}}" target="_blank"> Our Products</a>
                <a class="btn btn-warning font-weight-bold mt-3" href="{{route('products')}}" target="_blank"> Contact Us</a>
            </div>
            <div class="col-lg-6 col-md-12 d-flex justify-content-between flex-column">
                <a class="btn btn-warning font-weight-bold mt-3" href="{{route('sell.howToSellWithUs')}}" target="_blank"> How To Sell With Us</a>
                <a class="btn btn-warning font-weight-bold mt-3" href="{{route('static.faqs')}}" target="_blank"> FAQs</a>
                <a class="btn btn-warning font-weight-bold mt-3" href="{{route('static.whoWeAre')}}" target="_blank"> Who We Are</a>

            </div>
        </div>
    </section>


    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>
