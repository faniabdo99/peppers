@include('layout.header')

<body>
    @include('layout.navbar')
    <section class="static-page authenticity">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#check" data-toggle="tab">How we Check</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#team" data-toggle="tab">Meet our Team</a></li>
                        <li class="mb-0"><a href="{{route('static.faqs')}}">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-9">
                    <div class="authenticity-header"></div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active" id="check">
                            <h2 class="static-title">How we Check</h2>
                            <p>Leading our team of Certified Authenticators and dealers is our
                                very own Founder and Managing Director; Mrs. May Ezz Eldin.
                                With a diploma in Luxury leather goods from The High Institute of
                                Fashion, and other luxury courses, in addition to her vast
                                experience in this field, managing Pepper’s and authenticating
                                thousands of items over the years, we can safely say that our team
                                of experts is very well equipped to verify the authenticity and the
                                condition of the luxury products.
                                <br>
                                We ensure you that we only sell 100% authentic items; fairly
                                priced, and in great condition. Our evaluation process takes from
                                7-10 working days with a comprehensive check list for each brand.
                                We thoroughly check each item, and ensure that we verify the
                                authenticity and condition of the following:
                            </p>
                            <ul>
                                <li>- Leather look and feel and the other materials used</li>
                                <li>- Hardware</li>
                                <li>- Stitching</li>
                                <li>- Symmetry</li>
                                <li>- Craftsmanship</li>
                                <li>- Stamping</li>
                                <li>- Hologram Stickers</li>
                                <li>- Packaging</li>
                            </ul>
                            <p>
                                We also use our vast experience and awareness of the standard
                                brand’s specifications to check if the items have been modified or
                                amended (e.g., aftermarket diamonds, replaced batteries, repaired
                                bags, etc.)
                                Here are some of the important areas of our authentication process:
                            </p>
                            <div class="row">
                                <div class="col-lg-4 col-6 single-auth-item">
                                    <p>Date Code</p>
                                    <img class="w-100" src="{{url('public/images')}}/static-pages/data-code.jpg" alt="image">
                                </div>
                                <div class="col-lg-4 col-6 single-auth-item">
                                    <p>Hardware</p>
                                    <img class="w-100" src="{{url('public/images')}}/static-pages/hardware.jpg" alt="image">
                                </div>
                                <div class="col-lg-4 col-6 single-auth-item">
                                    <p>Hallmark Details</p>
                                    <img class="w-100" src="{{url('public/images')}}/static-pages/hallmark.jpg" alt="image">
                                </div>
                                <div class="col-lg-4 col-6 single-auth-item">
                                    <p>Soles</p>
                                    <img class="w-100" src="{{url('public/images')}}/static-pages/soles.jpg" alt="image">
                                </div>
                                <div class="col-lg-4 col-6 single-auth-item">
                                    <p>Authenticity Cards and Information Booklets</p>
                                    <img class="w-100" src="{{url('public/images')}}/static-pages/authenticity-card.jpg" alt="image">
                                </div>
                                <div class="col-lg-4 col-6 single-auth-item">
                                    <p>Gemstone Grading</p>
                                    <img class="w-100" src="{{url('public/images')}}/static-pages/gemstone-authenticity.jpg" alt="image">
                                    <div class="content-above">All mounted gemstone and diamond grading are
                                        performed without
                                        removing the setting. The grading is done in consistency with GIA standards,
                                        and all
                                        gemstone weights and measurements are approximate to industry standards.
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6 single-auth-item">
                                    <p>Watch Movement</p>
                                    <img class="w-100" src="{{url('public/images')}}/static-pages/watch-movement-1.jpg" alt="image">
                                </div>
                                <div class="col-lg-4 col-6 single-auth-item">
                                    <p>Brand, Care and Composition label</p>
                                    <img class="w-100" src="{{url('public/images')}}/static-pages/label.jpg" alt="image">
                                </div>
                                <div class="col-lg-4 col-6 single-auth-item">
                                    <p>Decoration Details</p>
                                    <img class="w-100" src="{{url('public/images')}}/static-pages/decoratives.jpg" alt="image">
                                </div>
                                <div class="col-lg-4 col-6 single-auth-item">
                                    <p>Amendments Made by Sellers</p>
                                    <img class="w-100" src="{{url('public/images')}}/static-pages/amendmants-made-by-seller.jpg" alt="image">
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="team">
                            <h2 class="static-title">Certified Experts</h2>
                            <p>
                                Mrs May Ezz Eldin<br>
                                Founder, MD and Head Authenticator
                                May has worked in the luxury business for over ten years and comes armed with an
                                extensive background in
                                luxury goods especially leather goods. She took extensive courses and trainings to make
                                sure she’s the
                                best at what she does. As the Head Authenticator, she manages the authentication process
                                with the help
                                of hand-selected team of certified dealers and buyers to thoroughly check every single
                                piece; be it a
                                luxury watch, fine jewelry, or a designer bag. She oversees the authentication process
                                with complete
                                adherence to the strict standards of authenticity.
                            </p>
                            <p>
                                Mr Ahmed Halaby<br>
                                Director of Operations and Managing Director
                                With more than 20 years of experience in Business Development and Strategic sales, Mr
                                Halaby helped take
                                Pepper’s to a whole new level, with an expansion plan that includes; opening new stores
                                all over Egypt
                                and soon expanding footprint in the region.
                            </p>
                            <p>
                                Mrs. Mayada Bekheit <br>
                                Director of Customer Relations
                                Mayada comes with years of experience in the Fashion retail industry and helped develop
                                a huge network
                                of Clients and merchants relations with Pepper’s over the years. Ms Bekheit also handles
                                the consignment
                                agreements and oversees customer satisfaction throughout the whole process.
                            </p>
                            <p>
                                Sales and Accounting teams <br>
                                Pepper’s well trained super friendly sales professionals and accountants always ensure
                                all transactions
                                are done in the most professional manner and that the client reaches the outmost
                                satisfaction throughout
                                their experience with Pepper’s Luxury Closet.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.newsletter')
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>
