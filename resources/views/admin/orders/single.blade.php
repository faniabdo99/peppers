@include('admin.layout.header')
<body>
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
                                    <h4 class="card-title ">Products Management</h4>
                                </div>
                                @include('admin.layout.noto')
                                <form class="p-3" action="{{ route('admin.products.postCreate') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label">Title</label>
                                        <input class="form-control" name="title" type="text"
                                            value="{{old('title') ?? '' }}" placeholder="Please Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Value</label>
                                        <input class="form-control" name="value" type="number"
                                            value="{{old('value') ?? '' }}" placeholder="Please Enter Discount Value">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="gender">
                                            <option value="">Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="size">
                                            <option value="">Size</option>
                                            <option value="Small">Small</option>
                                            <option value="Medium">Medium</option>
                                            <option value="Large">Large</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="condition">
                                            <option value="">Condition</option>
                                            <option value="Preowned">Preowned</option>
                                            <option value="New">New</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Height</label>
                                        <input class="form-control" name="height" type="number"
                                            value="{{old('height') ?? '' }}" placeholder="Please Enter Height ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Width</label>
                                        <input class="form-control" name="width" type="number"
                                            value="{{old('width') ?? '' }}" placeholder="Please Enter Width ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Depth</label>
                                        <input class="form-control" name="depth" type="number"
                                            value="{{old('depth') ?? '' }}" placeholder="Please Enter Depth ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Sku</label>
                                        <input class="form-control" name="sku" type="text" value="{{old('sku') ?? '' }}"
                                            placeholder="Please Enter Sku">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"> Buy Price</label>
                                        <input class="form-control" name=" Buy Price" type="number"
                                            value="{{old(' buy_price') ?? '' }}" placeholder="Please Enter  Buy Price ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Price</label>
                                        <input class="form-control" name="price" type="number"
                                            value="{{old('price') ?? '' }}" placeholder="Please Enter Price ">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Qty</label>
                                        <input class="form-control" name="qty" type="number"
                                            value="{{old('qty') ?? '' }}" placeholder="Please Enter Qty ">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="in_stock">
                                            <option value="">In Stock</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="store_location">
                                            <option value="">Store Location</option>
                                            <option value="Cairo">Cairo</option>
                                            <option value="Giza">Giza</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Comment</label>
                                        <input class="form-control" name="comments" type="text"
                                            value="{{old('comments') ?? '' }}" placeholder="Please Enter Comment">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Image</label>
                                        <input class="form-control" name="image" type="file"
                                            value="{{old('image') ?? '' }}">
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
</body>
</html>
