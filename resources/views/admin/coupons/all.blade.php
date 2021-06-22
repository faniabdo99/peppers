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
                                    <h4 class="card-title ">Coupon Management</h4>
                                    <a href="{{ route('admin.coupons.create') }}" class="btn btn-success"> Create New
                                        Coupon</a>
                                </div>
                                @if (session()->has('success'))
                                    <div class="alert alert-success mb-5 mt-5">
                                        <b>Success</b>
                                        <p class="mb-0">{{ session('success') }}</p>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger mb-5 mt-5">
                                        <b>Error</b>
                                        @foreach ($errors->all() as $error)
                                            <p class="mb-0">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="card-body ">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="mytable">
                                            <thead class=" text-primary">

                                                <th>
                                                    ID
                                                </th>
                                                <th>
                                                    Title
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Value
                                                </th>
                                                <th>
                                                    Type
                                                </th>
                                                <th>
                                                    Amount
                                                </th>

                                            </thead>
                                            <tbody>
                                                @foreach ($AllCoupons as $Single)
                                                    <tr>
                                                        <td>{{ $Single->id }}</td>
                                                        <td>{{ $Single->title }}</td>
                                                        <td>{{ $Single->status }}</td>
                                                        <td>{{ $Single->value }}</td>
                                                        <td>{{ $Single->type }}</td>
                                                        <td>{{ $Single->amount }}</td>
                                                        <td class="">
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Edit
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                                    <li><a class="dropdown-item" href="{{ route('admin.coupons.getEdit', $Single->id) }}">Edit</a></li>
                                                                    <li><a class="dropdown-item dropdown-item-delete" href="{{ route('admin.coupons.delete', $Single->id) }}">Delete</a></li>
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
