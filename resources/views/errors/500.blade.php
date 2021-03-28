@include('layout.header')
<body>
    @include('layout.navbar')
    <section class="container p-5 error-page">
        <div class="row">
            <div class="col-lg-8">
                <h1>Error <span>500</span></h1>
                <p class="mb-5">
                    <b>Server Error</b><br>
                    Our server having problems to proccess this request right now, Our developers are working to get the issue solved ASAP ,if the problem perceeds please contact us at <a href="mailto:info@peppersluxury.com">info@peppersluxury.com</a>
                </p>
                <h3>You can go to</h3>
                <div class="d-flex ">
                        <ul class="quick-links-list mr-5">
                            <li class="mt-3"><a href="{{route('home')}}">Homepage</a></li>
                            <li class="mt-3"><a href="{{route('products')}}">Products</a></li>
                            <li class="mt-3"><a href="{{route('products')}}">Contact Us</a></li>
                        </ul>
                        <ul class="quick-links-list">
                            <li class="mt-3"><a href="{{route('sell.howToSellWithUs')}}">How To Sell With Us</a></li>
                            <li class="mt-3"><a href="{{route('static.faqs')}}">FAQs</a></li>
                            <li class="mt-3"><a href="{{route('static.whoWeAre')}}">Who We Are</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <img class="w-100" src="{{url('public/icons/server-error.svg')}}" alt="Server Error">
                </div>
            </div>
    </section>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>