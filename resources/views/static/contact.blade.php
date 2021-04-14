@include('layout.header' , [
    'PageTitle' => 'Contact Us'
])
<body>
    @include('layout.navbar')
    <div class="container contact-us-page">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="mb-4">Contact Us</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('contact.post')}}" method="post">
                    @csrf
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Your name" required>
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Your email" required>
                    <label>Message</label>
                    <textarea name="message" placeholder="Enter your message" rows="8" required></textarea>
                    <button class="btn btn-brand">SEND MESSAGE</button>
                </form>
            </div>
            <div class="col-lg-4 contact-info">
                <h2>Contact Information</h2>
                <p>Our team is on 24/7 alert to responed to all your questions and requests</p>
                <ul>
                    <li><a href="https://wa.me/00201155436626" target="_blank"><i class="fas fa-phone"></i> +201155436626</a></li>
                    <li><a href="mailto:info@peppersluxury.com"><i class="fas fa-envelope"></i> info@peppersluxury.com</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
@include('layout.scripts')
</body>
</html>
