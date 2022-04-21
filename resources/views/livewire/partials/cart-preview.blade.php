<div class="block-cart action">
    <a class="icon-link icon-link-2" href="cart.html">
        <i class="flaticon-shopping-bag"></i>
        <span class="count count-2">{{ $totalItems }}</span>
        <span class="text mt-1">
            <span class="sub">Your Cart:</span>
            Rp.{{ $totalPrice }} </span>
    </a>
    <div class="cart">
        <div class="cart__mini">
            <ul>
                <li>
                    <div class="cart__title">
                        <h4>Your Cart</h4>
                        <span>({{ $totalItems }} Item in Cart)</span>
                    </div>
                </li>
                @if($items !== null)
                    @foreach($items as $item)
                    <li>
                        <div class="cart__item d-flex justify-content-between align-items-center">
                            <div class="cart__inner d-flex">
                                <div class="cart__thumb">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/img/cart/20.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="cart__details">
                                    <h6><a href="product-details.html">{{ $item['name'] }}</a></h6>
                                    <div class="cart__price">
                                        <span>Rp.{{ $item['price'] }}</span> x <span class="text-black-50">{{ $item['quantity'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="cart__del">
                                <button  wire:click.prevent="removeItem('{{ $item['id'] }}')"><i class="fal fa-times"></i></button>
                            </div>
                        </div>
                    </li>
                    @endforeach
                @endif
                <li>
                    <div class="cart__sub d-flex justify-content-between align-items-center">
                        <h6>Subtotal</h6>
                        <span class="cart__sub-total">Rp.{{ $totalPrice }}</span>
                    </div>
                </li>
                <li>
                    <a href="{{ route('account.cart') }}" class="wc-cart mb-10">View cart</a>
                    <a href="checkout.html" class="wc-checkout">Checkout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
