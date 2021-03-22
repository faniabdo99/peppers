@component('mail::message')
# You have new item to buy
Hello May, Someone has submitted an item for sell, Please take a look.
# Item Data:
<p><b>Title</b> {{$EmailData['title']}}</p>
<p><b>Phone</b> {{$EmailData['phone']}}</p>
<p><b>For Gender</b> {{$EmailData['gender']}}</p>
<p><b>In Category</b> {{$EmailData['category']}}</p>
<p><b>In Brand</b> {{$EmailData['brand']}}</p>

@forelse ($EmailData['images'] as $key => $item)
    <div style="padding:10px;background-color:#f7f7f7;">
        <img src="{{url('storage/app/sell/'.$item)}}" alt="">
        <a href="{{url('storage/app/sell/'.$item)}}">Image {{$key+1}} : {{url('storage/app/sell/'.$item)}}</a>
        <hr>
    </div>
@empty
@endforelse

Thanks,<br>
{{ config('app.name') }}
@endcomponent
