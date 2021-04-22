@include('layout.header' , [
    'PageTitle' => 'Error 403 Access Forbidden'
])
<body>
    @include('layout.navbar')
    <section class="container p-5 error-page">
        <div class="row">
            <div class="col-lg-8">
                <h1>Error <span>403</span></h1>
                <p class="mb-5">
                    <b>Access Forbidden</b><br>
                    You are not allowed to access this page! Please check your account permissions or contact the website support, This can happened due lack of permissions, or you may have followed a wrong link.
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
                    <img class="w-100" src="{{url('public/icons/forbidden.svg')}}" alt="Access Forbidden">
                </div>
            </div>
    </section>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>