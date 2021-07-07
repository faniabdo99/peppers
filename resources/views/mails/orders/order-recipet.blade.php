@component('mail::message')
# Your Order at Peppers Luxury Closet
Hello there, {{$EmailData->name}},<br>
Here is your receipt:
<p>
    <b>Total:</b> {{$EmailData->FinalTotal}}$
    <br>
    <b>Items:</b> {{$EmailData->Items->count()}}
</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
