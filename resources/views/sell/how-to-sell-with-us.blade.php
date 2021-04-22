@include('layout.header' , [
    'PageTitle' => 'Sell with us'
])
@include('layout.navbar')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<body>
    <section class="static-page shipping-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="main-title">Selling and Consignment</h1>
                    <p>
                        We, Peppers Luxury Closet believe that every item deserves a second chance. If you have fallen
                        out of love with
                        one of your designer items, give it another chance to be preloved by selling it or consigning it
                        at Peppers.
                        Through the use of our website, you can now do it from the comfort of your home by simply
                        following those steps.
                    </p>
                    <h2 class="static-title">1. GET A QUOTE</h2>
                    <p>In order to get a quote, you will be required to answer simple questions about the item you wish
                        to sell or
                        consign in order to help us determine its value. Also, you will need to upload a couple of
                        photos of the items
                        so we can check its condition.</p>
                    <h2 class="static-title">2. SHIP TO US</h2>
                    <p>
                        Within 7-10 working days after submitting your item, you will receive a custom quote with two
                        estimates for each
                        item.
                    </p>
                    <h2 class="static-title">DIRECT PURCHASE ESTIMATE</h2>
                    <p>This is the fastest way to get cash for your item with payment sent within 10 working days upon
                        receiving your
                        item.</p>
                    <h2 class="static-title">CONSIGNMENT ESTIMATE.</h2>
                    <p>This is your estimated payment after we have sold your item (net amount you get in your hands,
                        and not including
                        our consignment service fee, which varies from one item to another). <br>
                        After you've reviewed your quote and decide whether you wish to sell your item directly to us or
                        have us consign
                        it for you. The next step is to package your item well, print and attach our CONSIGNMENT
                        AGREEMENT FORM and drop
                        your package off at our nearest store or send it via courier to: <br>
                        Pepper’s Luxury Closet <br>
                        Karma 1 Mall, Sheikh Zayed City, 6 of October, Giza, Egypt <br>
                        PO BOX 12411 <br>
                        Email: info@peppersluxury.com <br>
                        Phone: 00201155436626</p>
                    <h2 class="static-title">3. REVIEW OUR OFFER</h2>
                    <p>Once we receive your item, we will inspect it and verify its authenticity*. After that we notify
                        you by email
                        with our final offer. If you chose to consign with us, we will photograph and merchandise your
                        item for listing
                        on our website and notify you when it's sold. <br>

                        If you have a change of heart or not satisfied with our actual offer, we will return the item to
                        you at our
                        expense. <br>

                        * Please be sure to only send us authentic items. If we receive and item and it is determined to
                        not be
                        authentic by our in-house experts, it will be returned at the seller's expense.</p>
                    <h2 class="static-title">4. GET PAID</h2>
                    <p>If you choose to sell your item directly to us, we will send you your payment via check or PayPal
                        within two working days. If you chose to consign with us, we will send your payment within two
                        working days after selling your item.</p>
                    <br>
                    <form class="sell-form" action="{{route('sell.postHowToSellWithUs')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Submit Your Item</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{old('title') ?? '' }}" placeholder="Add item description here eg. Prada Medium Classic Flap Sling Bag" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="gender">Select Gender</label>
                                    <select class="form-control" name="gender" id="gender" required>
                                        <option @if(old('gender') == 'male') selected @endif value="male">Male</option>
                                        <option @if(old('gender') == 'female') selected @endif value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <select class="form-control select-search" name="category" id="category" required>
                                        @forelse (getCategories() as $Category)
                                            <option @if(old('category') == $Category->title ) selected @endif value="{{$Category->title}}">{{$Category->title}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-group">
                                    <label for="brand">Select Brand</label>
                                    <select class="form-control select-search" name="brand" id="brand" required>
                                        @forelse (getAllBrands() as $Brand)
                                            <option @if(old('brand') == $Brand->title ) selected @endif value="{{$Brand->title}}">{{$Brand->title}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="" for="images">Choose file(s)</label>
                                    <input type="file" class="form-control" name="images[]" id="images" multiple required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Enter Your Phone Number</label>
                                    <input class="form-control" name="phone" value="{{ old('phone') ?? ''}}" type="tel" placeholder="+2010000000" id="phone" required>
                                    <div class="form-check mt-3">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="toc" type="checkbox" required>I agree to The Pepper's Closet's <a href="{{route('static.privacy')}}">Terms & Conditions</a>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-brand mt-3 d-block">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @include('layout.footer')
    @include('layout.scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".select-search").select2();

    </script>
</body>

</html>
