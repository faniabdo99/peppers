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
                                    <h4 class="card-title ">Blog Management</h4>
                                </div>
                                @include('admin.layout.noto')
                                <form class="p-3" action="{{ route('admin.blog.postCreate') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label">Title</label>
                                        <input class="form-control" name="title" type="text"
                                        value="{{old('title') ?? '' }}"
                                            placeholder="Please Enter Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Slug</label>
                                        <input class="form-control" name="slug" type="text"
                                        value="{{old('slug') ?? '' }}"
                                            placeholder="Please Enter slug" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Description</label>
                                        <input class="form-control" name="description" type="text"
                                        value="{{old('description') ?? '' }}"
                                            placeholder="Please Enter Description" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Content</label>
                                        <input class="form-control" name="content" type="text"
                                        value="{{old('content') ?? '' }}"
                                            placeholder="Please Enter Content" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Category</label>
                                        <input class="form-control" name="category" type="text"
                                        value="{{old('category') ?? '' }}"
                                            placeholder="Please Enter Category" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Keywords</label>
                                        <input class="form-control" name="keywords" type="text"
                                        value="{{old('keywords') ?? '' }}"
                                            placeholder="Please Enter Blog Keywords" >
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">image</label>
                                        <input class="form-control" name="image" type="file" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Active</label>
                                        <select name="active" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Allow Comments</label>
                                        <select name="allow_comments" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add New Blog</button>
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
