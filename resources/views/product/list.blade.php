@include('layout.header' , [
    'PageTitle' => 'All Products'
])
<body>
    @include('layout.navbar')
   <div class="p-5">
    <table class="table table-bordered table-striped" id="myTable">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Sku</th>
            <th >Brand</th>
            <th scope="col">Category</th>
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
                <td>{{$item->id}}</td>
                <td>{{$item->sku}}</td>
                <td>{{$item->Brand->title}}</td>
                <td>
                    <select class="category_select" data-id="{{$item->id}}" data-action="{{route('admin.product.updateCategory')}}">
                        @forelse($AllCategories as $Category)
                            <option value="{{$Category->id}}" @if($item->category_id == $Category->id) selected @endif>{{$Category->title}}</option>
                        @empty
                            <option value="1">No Categories in System</option>
                        @endforelse
                    </select>
                </td>
                <td> <a href="{{route('product.single',[$item->slug , $item->id])}}" target="_blank">{{$item->title}}</a></td>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
        //Ajax Request to update the category
        $('.category_select').change(function(){
            var ProductId = $(this).data('id');
            var CategoryId = $(this).val();
            var ActionRoute = $(this).data('action');
            $.ajax({
                method: 'post',
                url: ActionRoute,
                data: {
                    'product_id': ProductId,
                    'category_id': CategoryId
                },
                success: function(response){
                    alert(response);
                },
                error: function(response){
                    alert(response);
                }
            })
        });
    </script>
</body>
</html>
