<div class="container" id="footer">
    <div class="row">
        <div class="col-12">
            <footer class="footer">
                <div class="footer_data">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <ul class="footer-address">
                                <li><a href="https://g.page/PeppersLuxuryCloset?share" target="_blank"><i class="fas fa-map-marker-alt"></i> 45 Mohamed Mazhar, Cairo, Egypt</a></li>
                                <li><a href="https://goo.gl/maps/pyfTsVBKmxe63U7W7" target="_blank"><i class="fas fa-map-marker-alt"></i> KARMA 1 Sheikh Zayed, Giza, Egypt</a></li>
                                <li><a href="https://goo.gl/maps/bDvKK9d37km8Zxqe9" target="_blank"><i class="fas fa-map-marker-alt"></i> Mirage Outlet Mall, close to English School, 1st settlement. Moustafa Kamel Axis, Suez Rd</a></li>
                                <li><a href="https://wa.me/00201155436626" target="_blank"><i class="fas fa-phone"></i> +201155436626</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul>
                                <li><a href="{{route('static.returns')}}">Delivery & returns</a></li>
                                <li><a href="{{route('static.shipping')}}">Shipping and Delivery</a></li>
                                <li><a href="{{route('sell.howToSellWithUs')}}">Sell With Us</a></li>
                                <li><a href="{{route('static.consignmentForm')}}">Our Consignment Form</a></li>
                                <li><a href="{{route('static.howItWorks')}}">How It Works</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul>
                                <li><a href="{{route('static.whoWeAre')}}">Who We Are</a></li>
                                <li><a href="{{route('static.privacy')}}">Privacy Policy</a></li>
                                <li><a href="{{route('static.careers')}}">Careers</a></li>
                                <li><a href="{{route('static.faqs')}}">FAQs</a></li>
                                <li><a href="{{route('static.paymentOptions')}}">Payment Methods</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <p>Payment Methods</p>
                            <div class="payment_card_images mb-3"><i class="master-card"></i><i class="visa-card"></i><i class="cash-card"></i><i class="bank-card"></i></div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <p>Delivery Partners</p><img class="mr-2" src="{{url('public/images')}}/layout/FedEx.png" height="27">
                            <img class="mr-2" src="{{url('public/images')}}/layout/dhl.svg" height="27">
                            <img class="mr-2" src="{{url('public/images')}}/layout/aramex.jpg" height="27">
                            <img src="{{url('public/images')}}/layout/ups.jpg" height="27">
                        </div>
                    </div>
                </div>
                <div class="footer-social-media">
                    <a href="https://www.facebook.com/PeppersLuxuryCloset/" rel="nofollow" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/peppers_luxury_closet/" rel="nofollow" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="footer_text">&copy; 2018 Copyrights Pepper's Luxury Closet. All Rights Reserved. ALL THE BRANDS PRESENTED BELONG TO THEIR OWNERS.</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
<div class="pre-order-modal">
    <h5>Pre Order <span id="pre-order-item-title">Item Title</span></h5>
    <p>Pre ordering an item may take 10-15 days, we require 60% down payment to start the process</p>
    <form action="#" id="pre-order-form">
        <label for="item_title">Item</label>
        <input class="form-control mb-3" id="pre-order-item-input" name="item" type="url" placeholder="Enter item link here" required>
        <label for="item_title">Your name</label>
        <input class="form-control mb-3" id="pre-order-item-name" name="name" type="text" placeholder="Enter your name here" required>
        <label for="item_title">Message</label>
        <textarea class="form-control mb-3" id="pre-order-message" name="messag" rows="4" placeholder="Additional Information"></textarea>
        <button type="submit" class="btn btn-brand mb-3" id="submit-pre-order-form">Submit</button>
        <p>By clicking submit, you agree to our <a href="{{route('static.privacy')}}" target="_blank">Privacy Policy</a></p>
    </form>
</div>