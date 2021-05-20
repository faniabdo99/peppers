@include('layout.header' , [
    'PageTitle' => 'All Products'
])
<body>
    @include('layout.navbar')
   <div class="p-5">
    <table class="table table-bordered table-striped" id="myTable">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Sku</th>
            <th scope="col">Brand</th>
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Condition</th>
            <th scope="col">Size</th>
            <th scope="col">price</th>
            <th scope="col">Width</th>
            <th scope="col">Height</th>
            <th scope="col">Depth</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($productList as $i => $item)
            <tr>
                <td>{{$item->sku}}</td>
                <td>{{$item->Brand->title}}</td>
                <td> <a href="{{route('product.single',$item->slug)}}" target="_blank">{{$item->title}}</a></td>
                <td>{{$item->status}}</td>
                <td><img src="{{$item->Thumb}}" alt="Product Image" height="150" width="150"> </td>
                <td>{{$item->description}}</td>
                <td>{{$item->condition}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->width}}</td>
                <td>{{$item->height}}</td>
                <td>{{$item->depth}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   </div>
   
    @include('layout.footer')
    @include('layout.scripts')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>
