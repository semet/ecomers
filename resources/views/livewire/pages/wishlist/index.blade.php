@section('title', 'Wishlists')

<div>
    <livewire:pages.wishlist.banner/>

    <!-- cart-area-start -->
    <section class="cart-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card-body rounded shadow-sm">
                        @if($wishlists->isNotEmpty())
                        <div class="table-content table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-subtotal">Availability</th>
                                    <th class="product-remove">Remove</th>
                                    <th class="product-remove">Add To Cart</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlists as $wishlist)
                                    <tr >
                                        <td class="product-thumbnail">
                                            <a href="shop-details.html"><img src="{{ asset('assets/img/cart/shop-p-10.jpg') }}" alt=""></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="shop-details.html">{{ $wishlist->product->name }}</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">Rp.{{ $wishlist->product->latest_price }}</span>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">{{ $wishlist->product->amount }} unit</span>
                                        </td>
                                        <td class="product-remove">
                                            <button wire:click.prevent="handleRemove('{{ $wishlist->product->id }}')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                        <td class="product-remove">
                                            <button wire:click.prevent="handleAddToCart('{{ $wishlist->product->id }}')">
                                                <i class="fa fa-cart-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <div class="text-center">
                                <h1 class="text-black-50">No Item in wishlist</h1>
                                {{--TODO: Redirect customer to the Event or Popular products--}}
                                <a href="{{ route('home') }}" class="tp-in-btn w-25">Add item</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- cart-area-end -->
</div>
