@include('layout.header' , [
    'PageTitle' => 'How it works'
])
<body>
    @include('layout.navbar')
    <section class="static-page shipping-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="main-title">How It Works</h1>
                    <p>Pepper’s Luxury Closet is your one-stop destination for Buying, Selling, or Trading 100% Authenticated Luxury Fashion.</p>
                    <h2 class="static-title">How does it work?</h2>
                    <p>
                        <b>Buying:</b>
                        <br>
                        Here is your chance to buy 100% Authenticated luxury goods with discounts up to 70% off their retail value.
                        <br><br>
                        Our buying options include:
                        <ul class="ml-3 mb-3">
                            <li>- Paying for your purchase upfront and receiving <b>CASH DISCOUNT</b></li>
                            <li>- Paying on installments through the store: 40-60% down payment and the rest on 2-3 installments</li>
                            <li>- Paying through financing affiliates such as ValU or Contact</li>
                        </ul>
                    </p>
                    <p>
                        <b>Selling:</b>
                        <br>
                        Selling your luxury items has never been easier:
                        <br>
                        Upload your items on the website and get an instant quote, or bring them to one of our branches.
                        <br><br>
                        We can offer one or more of the following options:
                        <ul class="ml-3 mb-3">
                            <li>- Buy your item on the spot for cash</li>
                            <li>- Selling on your behalf / Consignment: You get paid once the item gets sold</li>
                            <li>- Trading your item in for store credit.</li>
                        </ul>
                    </p>
                    <p>
                        <b>Trade-in:</b>
                        <br>
                        We offer an infinity program where you can bring the item you bought from us and trade it in for store credit and get another item that can you use and then bring it back again….Infinity!
                        <br>
                        You can also trade-in items that were not initially bought from Pepper’s and get the highest value for your item.
                        <br>
                        For more details about the above programs please call us on <a href="tel:00201155436626">01155436626</a>, or send us an email at <a href="mailto:info@peppersluxury.com">info@peppersluxury.com</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    @include('components.newsletter')
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>