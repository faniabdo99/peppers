@include('admin.layout.header')

<body class="">
    <div class="wrapper ">
        @include('admin.layout.sidebar')
        <div class="main-panel">
            <!-- Navbar -->
            @include('admin.layout.navbar')
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Coupons Management</h4>
                                </div>
                                                            @include('admin.layout.noto')
                                <form class="p-3" action="{{ route('admin.coupons.postEdit' , $AllCoupons->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Title</label>
                                    <input class="form-control" name="title" type="text"
                                    value="{{old('title') ??  $AllCoupons->title }}"
                                        placeholder="Please Enter Title" >
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="status">
                                        <option value="">Status</option>
                                        <option value="active">Active</option>
                                        <option value="not active">Not Active</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Value</label>
                                    <input class="form-control" name="value" type="number"
                                    value="{{old('value') ??  $AllCoupons->value }}"
                                        placeholder="Please Enter Value" >
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="type">
                                        <option value="">Coupon Type</option>
                                        <option value="USD">USD</option>
                                        <option value="%">%</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Amount</label>
                                    <input class="form-control" name="amount" type="number"
                                    value="{{old('amount') ??  $AllCoupons->amount }}"
                                        placeholder="Please Add Amount Time" >
                                </div>
                                <button type="submit" class="btn btn-primary">Add New Coupon</button>
                            </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @include('admin.layout.footer')

        </div>
    </div>

    @include('admin.layout.scripts')
    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });

    </script>
</body>

</html>
