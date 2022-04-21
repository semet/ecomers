@section('title', 'Shopping Cart')

<section>
    <!-- page-banner-area-start -->
    <livewire:pages.cart.banner/>
    <!-- page-banner-area-end -->

    <!-- cart-area-start -->
    <section class="cart-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if($items != null)
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Images</th>
                                <th class="cart-product-name">Product</th>
                                <th class="product-price">Unit Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr >
                                    <td class="product-thumbnail">
                                        <a href="shop-details.html"><img src="{{ asset('assets/img/cart/shop-p-10.jpg') }}" alt=""></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="shop-details.html">{{ $item['name'] }}</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">Rp.{{ $item['price'] }}</span>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="cart-plus-minus">
                                            <input type="text" value="{{ $item['quantity'] }}"/>
                                            <button class="dec qtybutton" wire:click="decrementItem('{{ $item['id'] }}')">-</button>
                                            <button class="inc qtybutton" wire:click="incrementItem('{{ $item['id'] }}')">+</button>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">Rp.{{ $item['price'] * $item['quantity'] }}</span>
                                    </td>
                                    <td class="product-remove">
                                        <button wire:click.prevent="removeItem('{{ $item['id'] }}')"><i class="fa fa-times"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                {{--                                    <div class="coupon">--}}
                                {{--                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">--}}
                                {{--                                        <button class="tp-btn-h1" name="apply_coupon" type="submit">Apply--}}
                                {{--                                            coupon</button>--}}
                                {{--                                    </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul class="mb-20">
                                    <li>Subtotal <span>Rp.{{ $totalPrice }}</span></li>
                                    <li>Total <span>Rp.{{ $totalPrice }}</span></li>
                                </ul>
                                <a class="tp-btn-h1" href="{{ route('account.checkout') }}">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card card-body text-center">
                        <h1 class="text-black-50">No Items in cart</h1>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- cart-area-end -->
</section>

@push('script')
    <script>

    </script>
@endpush
