@include('layout.header' , [
    'PageTitle' => 'Payment Options'
])

<body>
    @include('layout.navbar')
    <section class="static-page shipping-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="main-title">Payment Methods</h1>
                    <h2 class="static-title">What Payment Methods Can I Use?</h2>
                    <p>You can pay in a variety of ways, including PayPal, cheque, cash on delivery, wire transfer, and credit card via PayPal (for none Paypal clients)</p>
                    <h2 class="static-title">Wire Transfers/Direct Payment to Savvy Enterpreneurs FZ LLC's Beneficiary&nbsp;Bank:</h2>
                    <p>CITI BANK N.A.<br />
                        IBAN:AE080210000001102070814<br />
                        CITI BANK<br />
                        Bank Address:&nbsp;MAIN BRANCH<br />
                        Swift code: CITIAEAD</p>
                    <h2 class="static-title">Credit Card Payments via Paypal for non Clients</h2>
                    <p>If this is the case, the seller will contact you notifying you as well as giving alternative payment options. Please be sure to respond to the email and make payment or your order will be cancelled.</p>
                    <h2 class="static-title">PayPal Payments:</h2>
                    <p>If you selected Paypal to pay for your order, and if the seller included the shipping cost, you will be redirected to Paypal immediately after placing your order. If this did not occur, the seller will contact you soon and send you a Paypal payment request. Be sure to pay the PayPal payment request immediately or your order may be cancelled due to non-payment.</p>
                    <h2 class="static-title">Cash on Delivery:</h2>
                    <p>We also have Cash on Delivery within Egypt.</p>
                </div>
            </div>
        </div>
    </section>
    @include('components.newsletter')
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>
