@component('mail::message')
# New "Sell to Us" Request
Hello There <br>
{{$EmailData['name']}} has submitted an item for sell, Please check it out.
# Item Data:
<p><b>Title</b> {{$EmailData['title']}}</p>
<p><b>Name</b> {{$EmailData['name']}}</p>
<p><b>Phone</b> {{$EmailData['phone']}}</p>
<p><b>For Gender</b> {{$EmailData['gender']}}</p>
<p><b>In Category</b> {{$EmailData['category']}}</p>
<p><b>In Brand</b> {{$EmailData['brand']}}</p>
<p>More info about the product in the Google Sheet <a href="https://docs.google.com/spreadsheets/d/1mjbpua5XUNX3WbFON2KPfNlbZhFRjhfMVhS17T_1_WY/edit#gid=1218997160">Click Here</a>.<br>
    This is an automated notification to the admin, Please don't respond to this email directly.</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
