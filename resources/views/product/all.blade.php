@include('layout.header')
<body>
    @include('layout.navbar')
    <div class="container all-products-page">
        <div class="row mt-5">
            <div class="col-lg-3 col-12">
                <div class="sidebar">
                    <form action="#" method="get">
                        <div class="block block-layered-nav">
                            <div class="block-content">
                                <div id="narrow-by-list">
                                    <div class="shop-by-color">
                                        <div class="filter-section">
                                            <h2><i class="fas fa-palette"></i> Color</h2>
                                        </div>
                                        <ul class="filter-list-items">
                                            <li><input type="checkbox" name="color" value="Black"> Black</li>
                                            <li><input type="checkbox" name="color" value="Red"> Red</li>
                                            <li><input type="checkbox" name="color" value="Blue"> Blue</li>
                                        </ul>
                                    </div>
                                    <div class="shop-by-color">
                                        <div class="filter-section">
                                            <h2><i class="fas fa-ruler-combined"></i> Size</h2>
                                        </div>
                                        <ul class="filter-list-items">
                                            <li><input type="checkbox" name="color" value="Black"> Large</li>
                                            <li><input type="checkbox" name="color" value="Red"> Medium</li>
                                            <li><input type="checkbox" name="color" value="Blue"> Small</li>
                                        </ul>
                                    </div>
                                    <div class="shop-by-condition">
                                        <div class="filter-section">
                                            <h2><i class="fas fa-sun"></i> Condition</h2>
                                        </div>
                                        <ul class="filter-list-items">
                                            <li><input type="checkbox" name="color" value="Black"> New</li>
                                            <li><input type="checkbox" name="color" value="Red"> Preowned</li>
                                        </ul>
                                    </div>
                                    <div class="shop-by-price">
                                        <div class="filter-section">
                                            <h2><i class="fas fa-dollar-sign"></i> Price</h2>
                                        </div>
                                        <ul class="filter-list-items">
                                            <li><input type="number" name="price_from" placeholder="From"></li>
                                            <li><input type="number" name="price_to" placeholder="T"></li>
                                        </ul>
                                        <button class="btn btn-brand d-block w-100" type="submit"><i class="fas fa-filter"></i> Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <h1 class="mb-4">All Bags (50)</h1>
                <div class="category-products">
                    <ul class="products-grid">
                        <li class="item">
                            <a href="https://peppersluxury.com/women/bags/all-bags/black-zucca-monogram-shouder-bag.html"
                                title="Black Zucca Monogram Shouder Bag " class="product-image"><img
                                    src="https://peppersluxury.com/media/catalog/product/cache/1/small_image/220x/9df78eab33525d08d6e5fb8d27136e95/Z/9/Z94_A_2.jpg"
                                    width="220" height="220" alt="Black Zucca Monogram Shouder Bag " /></a>
                            <div id="productimgover960" style="display: none;"><img
                                    src="https://peppersluxury.com/media/catalog/product/cache/1/small_image/64x/9df78eab33525d08d6e5fb8d27136e95/Z/9/Z94_A_2.jpg"
                                    width="64" height="64" alt="Black Zucca Monogram Shouder Bag " /></div>
                            <div class="moreinfo">
                                <h4><a href="https://peppersluxury.com/catalogsearch/result/index/q/FENDI/">FENDI</a>
                                </h4>
                                <h2 class="product-name"><a
                                        href="https://peppersluxury.com/women/bags/all-bags/black-zucca-monogram-shouder-bag.html"
                                        title="Black Zucca Monogram Shouder Bag ">Black Zucca Monogram Shouder Bag </a>
                                </h2>
                                <div id='productname960' style='display:none'>Black Zucca Monogram Shouder Bag </div>
                                <div class="price-box">
                                    <span class="regular-price" id="product-price-960">
                                        <span class="price">US$ 200٫00</span> </span>
                                </div>
                                <p><button type="button" title="Add to Cart" class="button btn-cart"
                                        onclick="setLocationAjax('https://peppersluxury.com/checkout/cart/add/uenc/aHR0cHM6Ly9wZXBwZXJzbHV4dXJ5LmNvbS93b21lbi9iYWdzL2FsbC1iYWdzLmh0bWw,/product/960/form_key/pkoDHu1yBsK2wz5u/','960')"><span><span>Add
                                                to Cart</span></span></button>
                                </p>
                                <div class="clear"></div>
                                <div class="clear"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @include('layout.footer')
    @include('layout.scripts')
</body>

</html>
