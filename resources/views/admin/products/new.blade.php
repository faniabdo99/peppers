@include('admin.layout.header')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 py-5">
                @if(session()->has('success'))
                <div class="notification success-notification">
                    <div class="notification-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="notification-content">
                        <b>Success</b>
                        <p>{{session('success')}}</p>
                    </div>
                </div>
                @endif
                @if ($errors->any())
                <div class="notification error-notification">
                    <div class="notification-icon">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="notification-content">
                        <b>Error</b>
                        @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                        @endforeach
                    </div>
                </div>
                @endif
                    <h1>Add New Product</h1>
                    <form class="admin-form" action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <h3>Main Data</h3>
                            <label for="title">Title</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{old('title') ?? ''}}" placeholder="Enter the product title here" required>
                            <label for="slug">Slug</label>
                            <input class="form-control" type="text" name="slug" id="slug" value="{{old('slug') ?? ''}}" placeholder="Enter the product slug here" required>
                            <label for="category">Category</label>
                            <select class="form-control" name="category_id" id="category" required>
                                @forelse ($Categories as $Category)
                                    <optgroup label="{{$Category->title}}">
                                        @forelse ($Category->Children as $SubCategory)
                                          <option value="{{$SubCategory->id}}">{{$SubCategory->title}}</option>
                                        @empty
                                        @endforelse
                                    </optgroup>
                                @empty
                                @endforelse
                            </select>
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="">Select Option</option>
                                <option value="Available">Available</option>
                                <option value="Sold">Sold</option>
                                <option value="Hidden">Hidden</option>
                            </select>
                            <label for="image">Main Image</label>
                            <input class="form-control" type="file" name="image" id="image" required>
                            <label for="gallery">Gallery</label>
                            <input class="form-control" type="file" name="gallery[]" id="gallery" multiple required>
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter quick description about the product" required>{{old('description') ?? ''}}</textarea>
                            <label for="editor">Content</label>
                            <textarea class="form-control" name="content" id="editor" placeholder="Enter quick content about the product">{{old('content') ?? ''}}</textarea>
                            <br>
                            <input type="checkbox" name="is_featured" value="1">
                            <label for="is_featured">Featured Product?</label>
                        </div>
                        <div class="form-group">
                            <h3>Meta Data</h3>
                            <label for="brand_id">Brand</label>
                            <select class="form-control" name="brand_id" id="brand_id" required>
                                <option value="">Select Option</option>
                                @forelse ($Brands as $Brand)
                                    <option value="{{$Brand->id}}">{{$Brand->title}}</option>
                                @empty
                                @endforelse
                            </select>
                            <label for="color">Color</label>
                            <input class="form-control"  type="text" name="color" id="color" value="{{old('color') ?? ''}}" placeholder="Enter the product color" required>
                            <label for="size">Size</label>
                            <input class="form-control"  type="text" name="size" id="size" value="{{old('size') ?? ''}}" placeholder="Enter the product size" required>
                            <label for="condition">Condition</label>
                            <select class="form-control" name="condition" id="condition" required>
                                <option value="">Select Option</option>
                                <option value="New">New</option>
                                <option value="Pre Owned">Pre Owned</option>
                            </select>
                            <label for="for_gender">Gender</label>
                            <select class="form-control" name="for_gender" id="for_gender" required>
                                <option value="">Select Option</option>
                                <option value="Men">Men</option>
                                <option value="Women">Women</option>
                            </select>
                            <label for="height">Height</label>
                            <input class="form-control" type="number" step="0.1" name="height" id="height" value="{{old('height') ?? ''}}" placeholder="Enter the product height" required>
                            <label for="width">Width</label>
                            <input class="form-control" type="number" step="0.1" name="width" id="width" value="{{old('width') ?? ''}}" placeholder="Enter the product width" required>
                            <label for="depth">Depth</label>
                            <input class="form-control" type="number" step="0.1" name="depth" id="depth" value="{{old('depth') ?? ''}}" placeholder="Enter the product depth" required>
                        </div>
                        <div class="form-group">
                            <h3>Stock & Finance</h3>
                            <label for="sku">SKU</label>
                            <input class="form-control" type="text" name="sku" id="sku" value="{{old('sku') ?? ''}}" placeholder="Enter the product SKU here" required>
                            <label for="buy_price">Buy Price</label>
                            <input class="form-control" type="number" step="0.1" name="buy_price" id="buy_price" value="{{old('buy_price') ?? ''}}" placeholder="Enter the product buy price">
                            <label for="price">Price</label>
                            <input class="form-control" type="number" step="0.1" name="price" id="price" value="{{old('price') ?? ''}}" placeholder="Enter the product price" required>
                            <label for="qty">Amount Available in Stock</label>
                            <input class="form-control" type="number" step="1" name="qty" id="qty" value="{{old('qty') ?? ''}}" placeholder="Enter the product qty" required>
                            <label for="store_location">Store Location</label>
                            <select class="form-control" name="store_location" id="store_location" required>
                                <option value="">Select Option</option>
                                <option value="Cairo">Cairo</option>
                                <option value="Zayed">Zayed</option>
                                <option value="5th Settlement">5th Settlement</option>
                            </select>
                        </div>
                        <button class="btn btn-success d-block w-100 mt-5" type="submit">Submit Product</button>
                    </form>
                </div>
            </div>
        </div>
        @include('admin.layout.scripts')
        <script>
            //Auto Create Clean Slug...
            var SlugValue;
            $('input[name="title"]').keyup(function(){
                SlugValue = $(this).val().replace(/\s+/g, '-').replace(/[^a-zA-Z ]/g, "-").toLowerCase();
                //Assign the value to the input
                $('input[name="slug"]').val(SlugValue);
            });
        </script>
    </body>
</html>