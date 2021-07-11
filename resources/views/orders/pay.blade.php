@include('layout.header' , [
    'PageTitle' => 'Payment'
])
<iframe src="https://accept.paymob.com/api/acceptance/iframes/13703?payment_token={{$PaymentID}}" style="width:100vw;height:100vh;" frameborder="0"></iframe>
