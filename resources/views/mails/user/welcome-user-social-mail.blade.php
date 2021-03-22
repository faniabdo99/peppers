@component('mail::message')
# Welcome, {{$EmailData['name']}}
You have registered to Peppers' Closet using your social media account, All good.
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
