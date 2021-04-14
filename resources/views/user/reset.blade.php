@include('layout.header' , [
    'PageTitle' => 'Reset your password'
])
<body>
    @include('layout.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="users-system" id="signup">
                    <div class="peppers-form my-5">
                        <h1 class="main-title">Reset Your Password</h1>
                        <form action="{{route('user.postReset')}}" method="post">
                            @csrf
                            <label for="email">Email</label>
                            <input class="mb-4" type="email" id="email" name="email" placeholder="Please enter your email" required>
                            <button class="submit-btn mb-5">Send Reset Email</button>
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