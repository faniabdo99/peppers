<section class="homepage-section" id="newslatter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Subscribe to Our Newsletter</h2>
                <p>EXCLUSIVE ACCESS TO SALES, DISCOUNTS, NOTIFICATIONS & THE LATEST TRENDS! </p>
                <div id="newsletter2">
                    <form>
                        <input type="text" name="email" id="newsletter" placeholder="ENTER YOUR EMAIL HERE" class="input-text required-entry validate-email" />
                        <button class="next-btn" id="submit-newsletter" type="submit" data-action="{{route('newsletter.post')}}">Sign Up</button>
                    </form>
                    <div id="show-message"></div>
                </div>
            </div>
        </div>
    </div>
</section>
