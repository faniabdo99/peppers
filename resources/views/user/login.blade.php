@include('layout.header')
<body>
    @include('layout.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="users-system" id="signup">
                    <div class="peppers-form my-5">
                        <h1 class="main-title">Login to Your Account</h1>
                        <form action="{{route('user.postLogin')}}" method="post">
                            @csrf
                            <label for="email">Email</label>
                            <input class="mb-4" type="email" id="email" name="email" placeholder="Please enter your email" required>
                            <label for="password">Password</label>
                            <input class="mb-4" type="password" id="password" name="password" placeholder="Please enter your password" required>
                            <button class="submit-btn mb-5">Login</button>
                            <p class="account-form-notice">Forgot Your Password? <a class="">Click Here</a></p>
                            <ul class="social-media-icons">
                                <li class="facebook"><a href="{{route('login.social' , 'facebook')}}"><i class="fab fa-facebook"></i> Login By Facebook</a></li>
                                <li class="google"><a href="{{route('login.social' , 'google')}}"><i class="fab fa-google"></i> Login By Google</a></li>
                                <li class="twitter"><a href="{{route('login.social' , 'twitter')}}"><i class="fab fa-twitter"></i> Login By Twitter</a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>