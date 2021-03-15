@component('mail::message')
# Reset Your Password
Hello {{$EmailData->name}}, You have requested a password reset<br>
Please click the link below to update your password

@component('mail::button', ['url' => route('reset.choosePassword.get' , [$EmailData->email, md5($EmailData->code)])])
Reset Password
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
