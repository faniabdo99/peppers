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
                                    <h4 class="card-title ">Category Management</h4>
                                </div>
                                                            @include('admin.layout.noto')
                                <form class="p-3" action="{{ route('admin.categories.postCreate') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Title</label>
                                    <input class="form-control" name="title" type="text"
                                        placeholder="Please Enter Title">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Slug</label>
                                    <input class="form-control" name="slug" type="number"
                                        placeholder="Please Enter Category Slug">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Catrgory Type</label>
                                    <input class="form-control" name="type" type="text"
                                        placeholder="Please Enter Category Type">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="gender">
                                        <option value="">Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Image</label>
                                    <input class="form-control" name="image" type="file"
                                        placeholder="Please Add Category Image">
                                </div>
                                <button type="submit" class="btn btn-primary">Add New Category</button>
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
