@include('layout.header' , [
    'PageTitle' => 'Update your password'
])
<body>
    @include('layout.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="users-system" id="signup">
                    <div class="peppers-form my-5">
                        <h1 class="main-title">Update Your Password</h1>
                        <form action="{{route('reset.choosePassword.post')}}" method="post">
                            @csrf
                            <input hidden type="number" name="user_id" value="{{$TheUser->id}}">
                            <input hidden type="text" name="user_code" value="{{md5($TheUser->code)}}">
                            <label for="password">Password</label>
                            <input class="mb-4" type="password" id="password" name="password" placeholder="Please enter your password" required>
                            <label for="password">Password Confirmation</label>
                            <input type="password" id="password_confirmation" placeholder="Please confirm your password" name="password_confirmation" required>
                            <button class="submit-btn mb-5">Change Your Password</button>
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