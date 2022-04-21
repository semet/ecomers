<div>
    <livewire:pages.wishlist.banner/>

    <!-- cart-area-start -->
    <section class="cart-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="product-price">Unit Price</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr >
                                        <td class="product-thumbnail">
                                            <a href="shop-details.html"><img src="{{ asset('assets/img/cart/shop-p-10.jpg') }}" alt=""></a>
                                        </td>
                                        <td class="product-name">
                                            <a href="shop-details.html">Name</a>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">Rp.00</span>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">Rp.amount</span>
                                        </td>
                                        <td class="product-remove">
                                            <button><i class="fa fa-times"></i> </button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </section>
    <!-- cart-area-end -->
</div>
