@include('layout.header' , [
    'PageTitle' => 'Cart'
])
<body>
    @include('layout.navbar')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cart mt-5 mb-3">
                    <h1 class="mb-3">Shopping Cart</h1>
                    <form action="https://peppersluxury.com/checkout/cart/updatePost/" method="post">
                        <table id="shopping-cart-table" class="table table-striped table-responsive">
                            <thead>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Condition</th>
                                <th>Action</th>
                                <th>Subtotal</th>
                            </thead>
                            <tbody>
                                @forelse ($Cart as $CartItem)
                                <tr>
                                    <td>
                                        <a href="{{route('product.single' , $CartItem->Product->slug)}}" class="product-image">
                                            <img src="{{$CartItem->Product->Thumb}}" width="75" height="75" alt="{{$CartItem->Product->title}}" />
                                        </a>
                                    </td>
                                    <td>
                                        <h2 class="product-name">
                                            <a href="{{route('product.single' , $CartItem->Product->slug)}}">{{$CartItem->Product->title}}</a>
                                        </h2>
                                    </td>
                                    <td>{{$CartItem->Product->condition}}</td>
                                    <td class="cart-edit">
                                        {{-- <input value="1" size="4" maxlength="12" /> --}}
                                        <a href="{{route('cart.delete' , $CartItem->id)}}"><i class="fas fa-trash"></i></a>
                                    </td>
                                    <td>{{convertCurrency($CartItem->Product->price , 'USD' , getCurrency()['code']) . getCurrency()['symbole']}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td>There is no items in your cart</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                {{-- <form id="discount-coupon-form" action="https://peppersluxury.com/checkout/cart/couponPost/" method="post">
                            <div class="discount">
                                <h2>Discount Codes</h2>
                                <div class="discount-form">
                                    <label for="coupon_code">Enter your coupon code if you have one.</label>
                                    <input type="hidden" name="remove" id="remove-coupone" value="0" />
                                    <div class="input-box">
                                        <input class="input-text" id="coupon_code" name="coupon_code" value="" />
                                    </div>
                                    <div class="buttons-set">
                                        <a href="#" class="btn btn-brand">Apply Coupon</a>
                                    </div>
                                </div>
                            </div>
                        </form> --}}
            </div>
            <div class="col-lg-3">
                <label class="d-block" for="cart-country">Shipping Country</label>
                <select class="d-block w-100 p-2" name="country" id="cart-country">
                    <option value="">Select shipping country</option>
                    <option value="Egypt">Egypt</option>
                    <option value="Elsewhere">Elsewhere</option>
                </select>
                <input id="cart-total-hidden" hidden value="{{convertCurrency($Total , 'USD' , getCurrency()['code'])}}">
            </div>
            <div class="col-lg-3">
                <a href="{{route('products')}}" class="btn btn-brand d-block mb-2">Continue Shopping</a>
                {{-- <a href="#" class="btn btn-brand d-block mb-2">Update Shopping Cart</a> --}}
                <div class="totals">
                    <p><b>Total:</b> {{convertCurrency($Total , 'USD' , getCurrency()['code']) . getCurrency()['symbole']}}</p>
                    <p><b>Shipping Total:</b> <span id="shipping-cart">Choose country</span></p>
                    <p><b>Subtotal:</b> <span id="cart-total">{{convertCurrency($Total , 'USD' , getCurrency()['code'])}}</span>{{getCurrency()['symbole']}}</p>
                </div>
                <a href="{{route('checkout.get')}}" class="btn btn-brand d-block">Proceed to Checkout</a>
            </div>
        </div>
    </div>
    </div>
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>
