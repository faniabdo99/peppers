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
                                    <h4 class="card-title ">Category Management</h4>
                                    <a href="{{ route('admin.categories.create') }}" class="btn btn-success"> Create New
                                        Category</a>
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
                                                    Type
                                                </th>
                                                <th>
                                                    Gender
                                                </th>
                                                <th>
                                                    Image
                                                </th>
                                                <th>
                                                    Management
                                                </th>
                                            </thead>
                                            <tbody>
                                                @foreach ($AllCategories as $Single)
                                                    <tr>
                                                        <td>{{ $Single->id }}</td>
                                                        <td>{{ $Single->title }}</td>
                                                        <td>{{ $Single->slug }}</td>
                                                        <td>{{ $Single->type }}</td>
                                                        <td>{{ $Single->gender }}</td>
                                                        <td>{{ $Single->image }}</td>
                                                        <td class="">
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Edit
                                                                </button>
                                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                                    <li><a class="dropdown-item" href="{{ route('admin.categories.getEdit', $Single->id) }}">Edit</a></li>
                                                                    <li><a class="dropdown-item" href="{{ route('admin.categories.delete', $Single->id) }}">Delete</a></li>
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
