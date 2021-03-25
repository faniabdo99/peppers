@include('layout.header')
<body>
    @include('layout.navbar')
    <div class="container p-5">
        <div class="row">
    <div class="col-lg-12">
        <div class="pyramid" style="width:inherit">
            <img src="{{url('public/images')}}/error/403.jpg" usemap="#Map" style="width:inherit" />

            <map name="Map" id="Map">

                <area href="{{route('home')}}" shape="poly" class="brick 2" coords="399,269,681,268,673,468,227,455" target="_blank" />


            </map>
        </div>
    </div>
        </div>
    </div>
    <section class="container" id="403-page">
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
