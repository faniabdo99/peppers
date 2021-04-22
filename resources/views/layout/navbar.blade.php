<div class="dark-overlay"></div>
<div class="upper-nav">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul>
                    <li>
                        <a href="{{route('currency.switch' , ['USD' ,'$'])}}" title="Switch Currency to USD"><i class="fas fa-dollar-sign"></i> USD |</a>
                        <a href="{{route('currency.switch' , ['EGP' ,'£'])}}" title="Switch Currency to EGP"><i class="fas fa-pound-sign"></i> EGP</a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/PeppersLuxuryCloset/" rel="nofollow" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.instagram.com/peppers_luxury_closet/" rel="nofollow" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/00201155436626" rel="nofollow" target="_blank"><i class="fas fa-phone"></i> +201155436626</a>
                    </li>
                    <li><a href="{{route('static.authenticity')}}"><i class="fas fa-lock"></i> Authenticity Guaranteed</a></li>
                    <li><a href="{{route('static.returns')}}"><i class="fas fa-truck"></i> International Shipping</a></li>
                    @guest
                        <li>
                            <a href="{{route('user.getLogin')}}" rel="nofollow" class="login-link"><i class="fas fa-user"></i> Login | </a>
                            <a href="{{route('user.getSignup')}}" rel="nofollow" class="register-link">Register</a>
                        </li>
                    @endguest
                    @auth
                        <li>
                            <a href="{{route('profile')}}" rel="nofollow" class="login-link"><i class="fas fa-user"></i> Welcome, {{auth()->user()->name}}</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="navbar-main-header">
    <div class="container-fluid">
        <div class="col-12">
            <a href="{{route('home')}}"><img class="navbar-brand" src="{{url('public/images/logo.png')}}" alt="Pepper's Luxury Closet" /></a>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{route('home')}}"><img src="{{url('public/images/logo.png')}}" alt="Pepper's Luxury Closet" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link mega-menu-trigger" href="javascript:;">WOMEN <i class="fas fa-chevron-down"></i></a>
                <div class="mega-menu">
                    <h2 class="mb-4 font-weight-bold">Women Category</h2>
                    <ul class="row">
                        @forelse(getMainCategories('women') as $Category)
                            <li class="col-lg-4 col-12">
                                <a class="main-title" href="{{route('products' , ['category' , $Category->slug])}}">
                                    <span>{{$Category->title}}</span>
                                </a>
                                <ul class="sub-items-list">
                                    <li class="level2 nav-4-2-1 all-watches4-2-2 first">
                                        <a href="{{route('products' , ['category' , $Category->slug])}}">
                                            <span>All {{$Category->title}}</span>
                                        </a>
                                    </li>
                                    @forelse($Category->Children as $ChildCategory)
                                        <li class="level2 nav-4-2-1 all-watches4-2-2 first">
                                            <a href="{{route('products' , ['category' , $ChildCategory->slug])}}">
                                                <span>{{$ChildCategory->title}}</span>
                                            </a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </li>
                        @empty
                            <p>There is no categories in the system just yet!</p>
                        @endforelse
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link mega-menu-trigger" href="#">MEN <i class="fas fa-chevron-down"></i></a>
                <div class="mega-menu">
                    <h2 class="mb-4 font-weight-bold">Men</h2>
                    <ul class="row">
                        @forelse(getMainCategories('men') as $Category)
                            <li class="col-lg-4 col-12">
                                <a class="main-title" href="{{route('products' , ['category' , $Category->slug])}}">
                                    <span>{{$Category->title}}</span>
                                </a>
                                <ul class="sub-items-list">
                                    <li class="level2 nav-4-2-1 all-watches4-2-2 first">
                                        <a href="{{route('products' , ['category' , $Category->slug])}}">
                                            <span>All {{$Category->title}}</span>
                                        </a>
                                    </li>
                                    @forelse($Category->Children as $ChildCategory)
                                        <li class="level2 nav-4-2-1 all-watches4-2-2 first">
                                            <a href="{{route('products' , ['category' , $ChildCategory->slug])}}">
                                                <span>{{$ChildCategory->title}}</span>
                                            </a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </li>
                        @empty
                            <p>There is no categories in the system just yet!</p>
                        @endforelse
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('products' , ['sale'])}}">SALE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mega-menu-trigger" href="#">DESIGNERS <i class="fas fa-chevron-down"></i></a>
                <div class="mega-menu">
                    <h2 class="mb-4 font-weight-bold">Designers</h2>
                    <ul class="row">
                        <li class="col-lg-3 col-12">
                            <a class="main-title" href="https://peppersluxury.com/designers/most-popular.html">
                                <span>MOST POPULAR</span>
                            </a>
                            <ul class="sub-items-list">
                                @forelse (getBrands(1) as $FBrand)
                                <li class="level2 nav-8-2-1 celine8-2-2 first">
                                    <a href="{{route('products' , ['brand' , $FBrand->slug])}}">
                                        <span>{{$FBrand->title}}</span>
                                    </a>
                                </li>
                                @empty
                                    
                                @endforelse
                            </ul>
                        </li>
                        <li class="col-lg-3 col-12">
                            <a class="main-title" href="https://peppersluxury.com/designers/all-brands.html">
                                <span>ALL BRANDS</span>
                            </a>
                            <ul class="sub-items-list">
                                @forelse (getBrands(2) as $Brand)
                                <li class="level2 nav-8-2-1 celine8-2-2 first">
                                    <a href="{{route('products' , ['brand' , $Brand->slug])}}">
                                        <span>{{$Brand->title}}</span>
                                    </a>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </li>
                        <li class="col-lg-3 col-12">
                            <ul class="sub-items-list">
                                @forelse (getBrands(3) as $Brand)
                                <li class="level2 nav-8-2-1 celine8-2-2 first">
                                    <a href="{{route('products' , ['brand' , $Brand->slug])}}">
                                        <span>{{$Brand->title}}</span>
                                    </a>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </li>
                        <li class="col-lg-3 col-12">
                            <ul class="sub-items-list">
                                @forelse (getBrands(4) as $Brand)
                                <li class="level2 nav-8-2-1 celine8-2-2 first">
                                    <a href="{{route('products' , ['brand' , $Brand->slug])}}">
                                        <span>{{$Brand->title}}</span>
                                    </a>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{route('products' , 'new')}}">WHAT'S NEW</a></li>
            <li class="nav-item"><a class="nav-link btn btn-brand" href="{{route('sell.howToSellWithUs')}}">SELL WITH US</a></li>
            @auth
                <li class="nav-item"><a class="nav-link" href="{{route('cart.get')}}"><i class="fas fa-shopping-cart"></i> {{userCartCount(auth()->user()->id)}}</a></li>
            @endauth
        </ul>
    </div>
</nav>
@guest
<section class="afterNav">
    <div class="container">
        <p class="mb-0">SIGN UP AND GET AN <span class="offer"> $50 off </span>ON YOUR FIRST ORDER
            <a href="{{route('user.getSignup')}}" class="btn">Sign Up</a>
        </p>
    </div>
</section>
@endguest
@if(session()->has('success'))
    <div class="notification success-notification">
        <div class="notification-icon">
            <i class="fas fa-check"></i>
        </div>
        <div class="notification-content">
            <b>Success</b>
            <p>{{session('success')}}</p>
        </div>
    </div>
@endif
@if ($errors->any())
    <div class="notification danger-notification">
        <div class="notification-icon">
            <i class="fas fa-times"></i>
        </div>
        <div class="notification-content">
            <b>Error</b>
            @foreach ($errors->all() as $error)
              <p>{{$error}}</p>
            @endforeach
        </div>
    </div>
@endif
<div id="added-to-cart-success">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="col-10">
                <h4> Item Added to Cart</h4>
                <p>This item has been added to your shopping cart</p>
                <ul class="mb-0">
                    <li><a href="javascript:;" id="close-added-to-cart" class="btn btn-brand">Continue Shopping</a></li>
                    <li><a href="{{route('cart.get')}}" class="btn btn-brand">Go to Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>