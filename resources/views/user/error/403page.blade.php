@include('layout.header')

<body>
    @include('layout.navbar')



<div class="container p-5">

  <div class="pyramid" style="width:inherit">
    <img src="{{url('public/images')}}/error/403.jpg" usemap="#Map" style="width:inherit"/>

    <map name="Map" id="Map">

        <area href="{{route('home')}}" shape="poly" class="brick 2" coords="399,269,681,268,673,468,227,455" target="_blank"/>


    </map>
  </div>

</div>

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
