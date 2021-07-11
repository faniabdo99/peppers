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
                                    <h4 class="card-title ">Discount Management</h4>
                                </div>
                                                            @include('admin.layout.noto')
                                <form class="p-3" action="{{ route('admin.discount.postCreate') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label">Title</label>
                                        <input class="form-control" name="title" type="text"
                                        value="{{old('title') ?? '' }}"
                                            placeholder="Please Enter Title" >
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Value</label>
                                        <input class="form-control" name="value" type="number"
                                        value="{{old('value') ?? '' }}"
                                            placeholder="Please Enter Discount Value" >
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="type">
                                            <option value="">Discount Type</option>
                                            <option value="USD">USD</option>
                                            <option value="%">%</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Expire</label>
                                        <input class="form-control" name="expire" type="date"
                                        value="{{old('expire') ?? '' }}"
                                            placeholder="Please Add Expire Time" >
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add New Discount</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @include('admin.layout.scripts')

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
