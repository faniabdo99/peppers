@include('layout.header')
<body>
    @include('layout.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="users-system" id="signup">
                    <div class="peppers-form my-5">
                        <h1 class="main-title">Create an Account</h1>
                        <form action="{{route('user.postSignup')}}" method="post">
                            @csrf
                            <label for="name">Full Name</label>
                            <input class="mb-4" type="text" id="name" name="name" placeholder="Please enter your full name" required>
                            <label for="email">Email</label>
                            <input class="mb-4" type="email" id="email" name="email" placeholder="Please enter your email" required>
                            <label for="password">Password</label>
                            <input class="mb-4" type="password" id="password" name="password" placeholder="Please enter your password" required>
                            <label for="password_confirmation">Password Confirmation</label>
                            <input class="mb-4" type="password" id="password_confirmation" name="password_confirmation" placeholder="Please enter your password again" required>
                            <button class="submit-btn mb-5">Signup</button>
                            <p class="account-form-notice">Already Have an Account? <a class="">Login</a></p>
                            <ul class="social-media-icons">
                                <li class="facebook"><a href="#"><i class="fab fa-facebook"></i> Login By Facebook</a></li>
                                <li class="google"><a href="#"><i class="fab fa-google"></i> Login By Google</a></li>
                                <li class="twitter"><a href="#"><i class="fab fa-twitter"></i> Login By Twitter</a></li>
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