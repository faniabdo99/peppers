@include('layout.header')
<body>
    @include('layout.navbar')
    <div class="container user-profile">
        <div class="row">
            @include('user.sidebar')
            <div class="col-9">
                <form class="edit-profile-form" action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Full Name *</label>
                    <input class="mb-3" type="text" name="name" id="name" placeholder="Please enter your name" value="{{auth()->user()->name}}" required >
                    <label for="phone_number">Phone Number</label>
                    <input class="mb-3" type="text" name="phone_number" id="phone_number" placeholder="Please enter your phone number" value="{{auth()->user()->phone_number}}">
                    <label for="country">Country</label>
                    <select class="mb-3" name="country" id="country">
                        <option value="">Please Choose Your Country</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>