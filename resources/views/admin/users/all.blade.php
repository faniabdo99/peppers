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
                                <div
                                    class="card-header card-header-primary d-flex justify-content-between align-items-center">
                                    <h4 class="card-title ">Products Management</h4>
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-success"> Create New
                                        Product</a>
                                </div>
                                                           @include('admin.layout.noto')
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="mytable">
                                            <thead class=" text-primary">
                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Title
                                                </th>
                                                <th>
                                                    Slug
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Description
                                                </th>
                                                <th>
                                                    Content
                                                </th>
                                                <th>
                                                    Color
                                                </th>
                                                <th>
                                                    Gender
                                                </th>
                                                <th>
                                                    Size
                                                </th>
                                                <th>
                                                    Condition
                                                </th>
                                                <th>
                                                    Height
                                                </th>
                                                <th>
                                                    Width
                                                </th>
                                                <th>
                                                    Depth
                                                </th>
                                                <th>
                                                    Sku
                                                </th>
                                                <th>
                                                    Buy Price
                                                </th>
                                                <th>
                                                    Price
                                                </th>
                                                <th>
                                                    Qty
                                                </th>
                                                <th>
                                                    In Stock
                                                </th>
                                                <th>
                                                    Store Location
                                                </th>
                                                <th>
                                                    Comment
                                                </th>
                                                <th>
                                                    Image
                                                </th>
                                            </thead>
                                            <tbody>
                                                @foreach ($AllProducts as $Single)
                                                    <tr>
                                                        <td>{{ $Single->id }}</td>
                                                        <td>{{ $Single->title }}</td>
                                                        <td>{{ $Single->slug }}</td>
                                                        <td>{{ $Single->status }}</td>
                                                        <td>{{ $Single->description }}</td>
                                                        <td>{{ $Single->content }}</td>
                                                        <td>{{ $Single->color }}</td>
                                                        <td>{{ $Single->for_gender }}</td>
                                                        <td>{{ $Single->size }}</td>
                                                        <td>{{ $Single->condition }}</td>
                                                        <td>{{ $Single->height }}</td>
                                                        <td>{{ $Single->width }}</td>
                                                        <td>{{ $Single->depth }}</td>
                                                        <td>{{ $Single->sku }}</td>
                                                        <td>{{ $Single->buy_price }}</td>
                                                        <td>{{ $Single->price }}</td>
                                                        <td>{{ $Single->qty }}</td>
                                                        <td>{{ $Single->in_stock }}</td>
                                                        <td>{{ $Single->store_location }}</td>
                                                        <td>{{ $Single->comments }}</td>
                                                        <td>{{ $Single->image }}</td>
                                                        <td class="">
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Edit
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                                    <li><a class="dropdown-item" href="{{ route('admin.products.getEdit', $Single->id) }}">Edit</a></li>
                                                                    <li><a class="dropdown-item" href="{{ route('admin.products.delete', $Single->id) }}">Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
