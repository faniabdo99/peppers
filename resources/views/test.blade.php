<style>
    td ,tr , th{ 
        border: 1px solid #ccc;
        padding: 5px;
    }
</style>
<table>
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Status</th>
        <th>Image Link</th>
        <th>SKU</th>
        <th>Condition</th>
        <th>Description</th>
        <th>Price</th>
        <th>Content</th>
        <th>Size</th>
        <th>Height</th>
        <th>Width</th>
        <th>Depth</th>
        <th>Qty</th>
        <th>In Stock</th>
        <th>Store Location</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Featured ?</th>
        <th>New ?</th>
    </thead>
    <tbody>
        @forelse($AllProducts as $Product)
            <tr>
                <td>{{$Product->id}}</td>
                <td>{{$Product->title}}</td>
                <td>{{$Product->slug}}</td>
                <td>{{$Product->status}}</td>
                <td>{{url('storage/app/products/thumb/'.$Product->image)}}</td>
                <td>{{$Product->sku}}</td>
                <td>{{$Product->condition}}</td>
                <td>{{$Product->description}}</td>
                <td>{{$Product->price}}$</td>
                <td>{{$Product->content}}</td>
                <td>{{$Product->size}}</td>
                <td>{{$Product->height}}</td>
                <td>{{$Product->width}}</td>
                <td>{{$Product->depth}}</td>
                <td>{{$Product->qty}}</td>
                <td>{{$Product->in_stock}}</td>
                <td>{{$Product->store_location}}</td>
                <td>{{$Product->Brand->title}}</td>
                <td>{{$Product->Category->slug}}</td>
                <td>{{$Product->is_featured}}</td>
                <td>{{$Product->is_new}}</td>
            </tr>
        @empty
        @endforelse
    </tbody>
</table>