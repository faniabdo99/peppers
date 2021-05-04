@include('layout.header' , [
    'PageTitle' => 'Your Personal Shopper'
])
@include('layout.navbar')
<body>
    <section class="static-page shipping-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="main-title">How to Order</h1>
                    <ul>
                        <li>1- Send Link to item from Brand official website, preferably online store (for example http://us.louisvuitton.com) where price of the item is stated. This helps with transparency</li>
                        <li>2- We add 350€ to any order under 3500€ ( to cover: shipping+customs, handling+delivery+our small store %)</li>
                        <li>3- Any orders above 3500€ we charge 12.5% - 20% per order (Depends on availability & whether we pay a premium to get it)</li>
                        <li>4- 50% down payment required, renaming upon receiving the item, or install!</li>
                    </ul>
                    <br>
                    <form class="sell-form" action="{{route('sell.postPersonalShopper')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="link">The Item Link*:</label>
                            <input type="text" class="form-control" name="link" id="link" value="{{old('link') ?? '' }}" placeholder="Add item link here from official website" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Your Name*:</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name') ?? ''}}" placeholder="Please enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Your Phone Number*:</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone') ?? ''}}" placeholder="Please enter your phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="notes">Additional Notes:</label>
                            <textarea class="form-control" name="notes" id="notes" placeholder="Do you have any additional notes?" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-brand">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>