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
                                @if (session()->has('success'))
                                    <div class="container alert alert-success mb-5 mt-3">
                                        <b>Success</b>
                                        <p class="mb-0">{{ session('success') }}</p>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="container alert alert-danger mb-5 mt-3">
                                        <b>Error</b>
                                        @foreach ($errors->all() as $error)
                                            <p class="mb-0">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
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
                                        <input class="form-control" name="slug" type="text"
                                            placeholder="Please Enter Category Slug">
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" name="type">
                                            <option value="">Category Type</option>
                                            <option value="main">Main</option>
                                            <option value="sub">Sub</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="gender">
                                            <option value="">Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input name="image" type="file" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add New Category</button>
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
