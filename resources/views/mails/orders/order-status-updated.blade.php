@component('mail::message')
# Order Status Updated
Hello There, {{$EmailData->name}}, Your order status has been updated.
<br>
The new order status is: <b>{{$EmailData->status}}</b><br>
Thanks,<br>
Peppers Luxury Closet
@endcomponent
