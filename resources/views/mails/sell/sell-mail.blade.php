@component('mail::message')
# You have new item to buy
Hello May, Someone has submitted an item for sell, Please take a look.
# Item Data:
<p><b>Title</b> {{$EmailData['title']}}</p>
<p><b>Phone</b> {{$EmailData['phone']}}</p>
<p><b>For Gender</b> {{$EmailData['gender']}}</p>
<p><b>In Category</b> {{$EmailData['category']}}</p>
<p><b>In Brand</b> {{$EmailData['brand']}}</p>
<p>More info about the product in the Google Sheets.<br>
    This is an automated notification to the admin, Please don't respond to this email directly.</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
