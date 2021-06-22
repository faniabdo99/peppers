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
                                <form class="p-3" action="{{ route('admin.blog.postEdit' , $AllBlogs->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-control-label">Title</label>
                                    <input class="form-control" name="title" type="text"
                                    value="{{old('title') ?? $AllBlogs->title }}"
                                        placeholder="Please Enter Title" >
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Slug</label>
                                    <input class="form-control" name="slug" type="text"
                                    value="{{old('slug') ?? $AllBlogs->slug }}"
                                        placeholder="Please Enter slug" >
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Description</label>
                                    <input class="form-control" name="description" type="text"
                                    value="{{old('description') ?? $AllBlogs->description }}"
                                        placeholder="Please Enter Description" >
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">content</label>
                                    <input class="form-control" name="content" type="text"
                                    value="{{old('content') ?? $AllBlogs->content }}"
                                        placeholder="Please Enter Content" >
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Category</label>
                                    <input class="form-control" name="category" type="text"
                                    value="{{old('category') ?? $AllBlogs->category }}"
                                        placeholder="Please Enter Category" >
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Keywords</label>
                                    <input class="form-control" name="keywords" type="text"
                                    value="{{old('keywords') ?? $AllBlogs->keywords }}"
                                        placeholder="Please Enter Blog Keywords" >
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
