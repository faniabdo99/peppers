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
                            <a href="{{route('cart.get')}}" rel="nofollow" class="login-link"><i class="fas fa-shopping-cart"></i> Shopping cart ({{userCartCount(auth()->user()->id)}})</a>
                        </li>
                        <li>
                            <a href="{{route('profile')}}" rel="nofollow" class="login-link"><i class="fas fa-user"></i> Welcome, {{auth()->user()->name}}</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{route('home')}}"><img src="{{url('public/images/logo.png')}}" alt="Pepper's Luxury Closet" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link mega-menu-trigger" href="javascript:;">WOMEN <i class="fas fa-chevron-down"></i></a>
                <div class="mega-menu">
                    <h2 class="mb-4 font-weight-bold">Women Category</h2>
                    <ul class="row">
                        <li class="col-3">
                            <a class="main-title" href="https://peppersluxury.com/women/bags.html">
                                <span>Bags</span>
                            </a>
                            <ul class="sub-items-list">
                                <li>
                                    <a href="https://peppersluxury.com/women/bags/all-bags.html">
                                        <span>All Bags</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://peppersluxury.com/women/bags/cross-body.html">
                                        <span>Cross Body</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://peppersluxury.com/women/bags/evening-bags.html">
                                        <span>Evening Bags</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://peppersluxury.com/women/bags/everyday-bags.html">
                                        <span>Everyday Bags</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-2-9 exotic-bags2-2-10">
                                    <a href="https://peppersluxury.com/women/bags/exotic-bags.html">
                                        <span>Exotic Bags</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-2-11 hobos2-2-12">
                                    <a href="https://peppersluxury.com/women/bags/hobos.html">
                                        <span>Hobos</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-2-13 shoulder-bags2-2-14">
                                    <a href="https://peppersluxury.com/women/bags/shoulder-bags.html">
                                        <span>Shoulder Bags</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-2-15 totes2-2-16">
                                    <a href="https://peppersluxury.com/women/bags/totes.html">
                                        <span>Totes</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-2-17 wallets2-2-18 last">
                                    <a href="https://peppersluxury.com/women/bags/wallets-37.html">
                                        <span>Wallets</span>
                                    </a>
                                </li>
                            </ul>
                            <a class="main-title" href="https://peppersluxury.com/women/bags.html">
                                <span>Clothing</span>
                            </a>
                            <ul class="sub-items-list">
                                <li class="level2 nav-2-4-19 all-clothing2-4-20 first">
                                    <a href="https://peppersluxury.com/women/clothing/all-clothing.html">
                                        <span>All Clothing</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-4-21 fur-jackets2-4-22">
                                    <a href="https://peppersluxury.com/women/clothing/jackets.html">
                                        <span>Fur Jackets</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-4-23 designer-jackets2-4-24 last">
                                    <a href="https://peppersluxury.com/women/clothing/designer-jackets.html">
                                        <span>Designer Jackets</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="col-3">
                            <a class="main-title" href="https://peppersluxury.com/women/travel.html">
                                <span>Travel</span>
                            </a>
                            <ul class="sub-items-list">
                                <li class="level2 nav-2-8-37 all-travel2-8-38 first">
                                    <a href="https://peppersluxury.com/women/travel/all-travel.html">
                                        <span>All Travel</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-8-39 backpacks2-8-40">
                                    <a href="https://peppersluxury.com/women/travel/backpacks.html">
                                        <span>Backpacks</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-8-41 suitcases2-8-42">
                                    <a href="https://peppersluxury.com/women/travel/suitcases.html">
                                        <span>Suitcases</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-8-43 travel-accessories2-8-44 last">
                                    <a href="https://peppersluxury.com/women/travel/travel-accessories.html">
                                        <span>Travel Accessories</span>
                                    </a>
                                </li>
                            </ul>
                            <a class="main-title" href="https://peppersluxury.com/women/fine-jewelry.html">
                                <span>Fine Jewelry</span>
                            </a>
                            <ul class="sub-items-list">
                                <li class="level2 nav-2-10-45 all-fine-jewelry2-10-46 first">
                                    <a href="https://peppersluxury.com/women/fine-jewelry/all-fine-jewelry.html">
                                        <span>All Fine Jewelry</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-10-47 bracelets2-10-48">
                                    <a href="https://peppersluxury.com/women/fine-jewelry/bracelets.html">
                                        <span>Bracelets</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-10-49 earrings2-10-50">
                                    <a href="https://peppersluxury.com/women/fine-jewelry/earrings-45.html">
                                        <span>Earrings</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-10-51 necklaces2-10-52">
                                    <a href="https://peppersluxury.com/women/fine-jewelry/necklaces.html">
                                        <span>Necklaces</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-10-53 rings2-10-54 last">
                                    <a href="https://peppersluxury.com/women/fine-jewelry/rings-99.html">
                                        <span>Rings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="col-3">
                            <a class="main-title" href="https://peppersluxury.com/women/shoes-82.html">
                                <span>Shoes</span>
                            </a>
                            <ul class="sub-items-list">
                                <li class="level2 nav-2-6-25 all-shoes2-6-26 first">
                                    <a href="https://peppersluxury.com/women/shoes-82/all-shoes.html">
                                        <span>All Shoes</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-6-27 flats2-6-28">
                                    <a href="https://peppersluxury.com/women/shoes-82/flats-91.html">
                                        <span>Flats</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-6-29 pumps2-6-30">
                                    <a href="https://peppersluxury.com/women/shoes-82/pumps-56.html">
                                        <span>Pumps</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-6-31 sandals2-6-32">
                                    <a href="https://peppersluxury.com/women/shoes-82/sandals-59.html">
                                        <span>Sandals</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-6-33 sneakers2-6-34">
                                    <a href="https://peppersluxury.com/women/shoes-82/sneakers.html">
                                        <span>Sneakers</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-6-35 boots2-6-36 last">
                                    <a href="https://peppersluxury.com/women/shoes-82/boots-75.html">
                                        <span>Boots</span>
                                    </a>
                                </li>
                            </ul>
                            <a class="main-title" href="https://peppersluxury.com/women/watches-45.html">
                                <span>Watches</span>
                            </a>
                            <ul class="sub-items-list">
                                <li>
                                    <a href="https://peppersluxury.com/women/watches-45/all-watches.html">
                                        <span>All Watches</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://peppersluxury.com/women/watches-45/cartier-89.html">
                                        <span>Cartier</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-12-59 rolex2-12-60">
                                    <a href="https://peppersluxury.com/women/watches-45/rolex-10.html">
                                        <span>Rolex</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-12-61 omega2-12-62 last">
                                    <a href="https://peppersluxury.com/women/watches-45/omega.html">
                                        <span>Omega</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="col-3">
                            <a class="main-title" href="https://peppersluxury.com/women/accessories.html">
                                <span>Accessories</span>
                            </a>
                            <ul class="sub-items-list">
                                <li class="level2 nav-2-14-63 all-accessories2-14-64 first">
                                    <a href="https://peppersluxury.com/women/accessories/all-accessories.html">
                                        <span>All Accessories</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-14-65 belts2-14-66">
                                    <a href="https://peppersluxury.com/women/accessories/belts-67.html">
                                        <span>Belts</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-14-67 fashion-&amp;-silver-jewelry2-14-68">
                                    <a href="https://peppersluxury.com/women/accessories/fashion-silver-jewelry.html">
                                        <span>Fashion &amp; Silver Jewelry</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-14-69 scarves2-14-70">
                                    <a href="https://peppersluxury.com/women/accessories/scarves.html">
                                        <span>Scarves</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-14-71 sunglasses2-14-72">
                                    <a href="https://peppersluxury.com/women/accessories/sunglasses-48.html">
                                        <span>Sunglasses</span>
                                    </a>
                                </li>
                                <li class="level2 nav-2-14-73 tech-accessories2-14-74 last">
                                    <a href="https://peppersluxury.com/women/accessories/tech-accessories.html">
                                        <span>Tech Accessories</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link mega-menu-trigger" href="#">MEN <i class="fas fa-chevron-down"></i></a>
                <div class="mega-menu">
                    <h2 class="mb-4 font-weight-bold">Men</h2>
                    <ul class="row">
                        <li class="col-4">
                            <a class="main-title" href="https://peppersluxury.com/men/watches-48.html">
                                <span>Watches</span>
                            </a>
                            <ul class="sub-items-list">
                                <li class="level2 nav-4-2-1 all-watches4-2-2 first">
                                    <a href="https://peppersluxury.com/men/watches-48/all-watches-59.html">
                                        <span>All Watches</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-3 rolex4-2-4">
                                    <a href="https://peppersluxury.com/men/watches-48/rolex-19.html">
                                        <span>Rolex</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-5 cartier4-2-6">
                                    <a href="https://peppersluxury.com/men/watches-48/cartier-88.html">
                                        <span>Cartier</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-7 omega4-2-8">
                                    <a href="https://peppersluxury.com/men/watches-48/omega-91.html">
                                        <span>Omega</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-9 tag-heuer4-2-10">
                                    <a href="https://peppersluxury.com/men/watches-48/tag-heuer.html">
                                        <span>Tag Heuer</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-11 baume-&-mercier4-2-12">
                                    <a href="https://peppersluxury.com/men/watches-48/baume-mercier.html">
                                        <span>Baume &amp; Mercier</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-13 breitling4-2-14">
                                    <a href="https://peppersluxury.com/men/watches-48/breitling.html">
                                        <span>Breitling</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-15 audemars-piguet4-2-16">
                                    <a href="https://peppersluxury.com/men/watches-48/audemars-piguet.html">
                                        <span>Audemars Piguet</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-17 bvlgari4-2-18">
                                    <a href="https://peppersluxury.com/men/watches-48/bvlgari-35.html">
                                        <span>Bvlgari</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-19 girard-perregaux4-2-20">
                                    <a href="https://peppersluxury.com/men/watches-48/girard-perregaux.html">
                                        <span>Girard Perregaux</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-21 jaeger-lecoultre4-2-22">
                                    <a href="https://peppersluxury.com/men/watches-48/jaeger-lecoultre.html">
                                        <span>Jaeger Lecoultre</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-23 hublot4-2-24">
                                    <a href="https://peppersluxury.com/men/watches-48/hublot.html">
                                        <span>Hublot</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-25 parmigiani4-2-26">
                                    <a href="https://peppersluxury.com/men/watches-48/parmigiani.html">
                                        <span>Parmigiani</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-27 patek-philippe4-2-28">
                                    <a href="https://peppersluxury.com/men/watches-48/patek-philippe.html">
                                        <span>Patek Philippe</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-2-29 ulysse-nardin4-2-30 last">
                                    <a href="https://peppersluxury.com/men/watches-48/ulysse-nardin.html">
                                        <span>Ulysse Nardin</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="col-4">
                            <a class="main-title" href="https://peppersluxury.com/men/accessories-23.html">
                                <span>Accessories</span>
                            </a>
                            <ul class="sub-items-list">
                                <li class="level2 nav-4-4-31 all-accessories4-4-32 first">
                                    <a href="https://peppersluxury.com/men/accessories-23/all-accessories-65.html">
                                        <span>All Accessories</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-4-33 belts4-4-34">
                                    <a href="https://peppersluxury.com/men/accessories-23/belts-74.html">
                                        <span>Belts</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-4-35 cufflinks4-4-36">
                                    <a href="https://peppersluxury.com/men/accessories-23/cufflinks.html">
                                        <span>Cufflinks</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-4-37 pens4-4-38">
                                    <a href="https://peppersluxury.com/men/accessories-23/pens.html">
                                        <span>Pens</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-4-39 sunglasses4-4-40">
                                    <a href="https://peppersluxury.com/men/accessories-23/sunglasses-66.html">
                                        <span>Sunglasses</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-4-41 ties4-4-42">
                                    <a href="https://peppersluxury.com/men/accessories-23/ties.html">
                                        <span>Ties</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-4-43 tech-accessories4-4-44 last">
                                    <a href="https://peppersluxury.com/men/accessories-23/tech-accessories-45.html">
                                        <span>Tech Accessories</span>
                                    </a>
                                </li>
                            </ul>
                            <a class="main-title" href="https://peppersluxury.com/men/bags-30.html">
                                <span>Bags</span>
                            </a>
                            <ul class="sub-items-list">
                                <li class="level2 nav-4-6-45 clothing4-6-46 first">
                                    <a href="https://peppersluxury.com/men/bags-30/clothing-76.html">
                                        <span>Clothing</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-6-47 all-clothing4-6-48">
                                    <a href="https://peppersluxury.com/men/bags-30/all-clothing-11.html">
                                        <span>All Clothing</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-6-49 jackets4-6-50">
                                    <a href="https://peppersluxury.com/men/bags-30/jackets-93.html">
                                        <span>Jackets</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-6-51 shirts4-6-52 last">
                                    <a href="https://peppersluxury.com/men/bags-30/shirts.html">
                                        <span>Shirts</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="col-4">
                            <a class="main-title" href="https://peppersluxury.com/men/travel-92.html">
                                <span>Travel</span>
                            </a>
                            <ul class="sub-items-list">
                                <li class="level2 nav-4-8-53 shoes4-8-54 first">
                                    <a href="https://peppersluxury.com/men/travel-92/shoes-52.html">
                                        <span>Shoes</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-8-55 all-shoes4-8-56">
                                    <a href="https://peppersluxury.com/men/travel-92/all-shoes-93.html">
                                        <span>All Shoes</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-8-57 loafers-&-moccasins4-8-58">
                                    <a href="https://peppersluxury.com/men/travel-92/loafers-moccasins.html">
                                        <span>Loafers &amp; Moccasins</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-8-59 oxfords4-8-60">
                                    <a href="https://peppersluxury.com/men/travel-92/oxfords.html">
                                        <span>Oxfords</span>
                                    </a>
                                </li>
                                <li class="level2 nav-4-8-61 sneakers4-8-62 last">
                                    <a href="https://peppersluxury.com/men/travel-92/sneakers-64.html">
                                        <span>Sneakers</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">SALE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mega-menu-trigger" href="#">DESIGNERS <i class="fas fa-chevron-down"></i></a>
                <div class="mega-menu">
                    <h2 class="mb-4 font-weight-bold">Designers</h2>
                    <ul class="row">
                        <li class="col-3">
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
                        <li class="col-3">
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
                        <li class="col-3">
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
                        <li class="col-3">
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
            <li class="nav-item"><a class="nav-link" href="#">WHAT'S NEW</a></li>
            <li class="nav-item"><a class="nav-link btn btn-brand" href="#">SELL NOW</a></li>
        </ul>
        {{-- <form class="navbar-search form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Store Here" aria-label="Search">
            <button class="btn btn-brand my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
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
    <div class="notification error-notification">
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