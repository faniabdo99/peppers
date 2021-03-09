@component('mail::message')
# Welcome the Peppers! <b>{{$EmailData->name}}</b>
Hello There, You have successfully signed up to new account to Peppers' Closet, Please confirm your email address by clicking the link below
@component('mail::button', ['url' => ''])
Confirm Email Address
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
