@if (session()->has('success'))
<div class="container alert alert-success mb-5 mt-3">
    <b>Success</b>
    <p class="mb-0">{{ session('success') }}</p>
</div>
@endif
@if ($errors->any())
<div class="container alert alert-danger mb-5 mt-3">
    <b>Error</b>
    @foreach ($errors->all() as $error)
        <p class="mb-0">{{ $error }}</p>
    @endforeach
</div>
@endif
