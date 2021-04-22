@include('layout.header' , [
    'PageTitle' => 'Error 404 Page Not Found'
])
<body>
    @include('layout.navbar')
    <section class="container p-5 error-page">
        <div class="row">
            <div class="col-lg-7">
                <h1>Error <span>404</span></h1>
                <p class="mb-5">
                    <b>Page not found</b><br>
                    The page you are looking for is not available on this url, This could happened by a broken link or deleted content
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
                <div class="col-lg-5 col-12">
                    <img class="w-100" src="{{url('public/icons/not-found.svg')}}" alt="Page Not Found">
                </div>
            </div>
    </section>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>