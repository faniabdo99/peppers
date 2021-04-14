@include('layout.header' , [
    'PageTitle' => 'How it works'
])
<body>
    @include('layout.navbar')
    <section class="static-page shipping-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="main-title">Coming Soon</h1>
                </div>
            </div>
        </div>
    </section>
    @include('components.newsletter')
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>