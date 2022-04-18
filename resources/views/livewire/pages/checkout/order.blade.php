<div class="col-lg-6">
    <div class="your-order mb-30 ">
        <h3>Your order</h3>
        <div class="your-order-table table-responsive">
            <table>
                <thead>
                <tr>
                    <th class="product-name">Product</th>
                    <th class="product-total">Total</th>
                </tr>
                </thead>
                <tbody>
                <tr class="cart_item">
                    <td class="product-name">
                        Vestibulum suscipit <strong class="product-quantity"> × 1</strong>
                    </td>
                    <td class="product-total">
                        <span class="amount">$165.00</span>
                    </td>
                </tr>
                <tr class="cart_item">
                    <td class="product-name">
                        Vestibulum dictum magna <strong class="product-quantity"> × 1</strong>
                    </td>
                    <td class="product-total">
                        <span class="amount">$50.00</span>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr class="cart-subtotal">
                    <th>Cart Subtotal</th>
                    <td><span class="amount">$215.00</span></td>
                </tr>
                <tr class="shipping">
                    <th>Shipping</th>
                    <td>
                        <ul>
                            <li>
                                <input type="radio" name="shipping">
                                <label>
                                    Flat Rate: <span class="amount">$7.00</span>
                                </label>
                            </li>
                            <li>
                                <input type="radio" name="shipping">
                                <label>Free Shipping:</label>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount">$215.00</span></strong>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="payment-method">
            <div class="accordion" id="checkoutAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="checkoutOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bankOne" aria-expanded="true" aria-controls="bankOne">
                            Direct Bank Transfer
                        </button>
                    </h2>
                    <div id="bankOne" class="accordion-collapse collapse show" aria-labelledby="checkoutOne" data-bs-parent="#checkoutAccordion">
                        <div class="accordion-body">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="paymentTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#payment" aria-expanded="false" aria-controls="payment">
                            Cheque Payment
                        </button>
                    </h2>
                    <div id="payment" class="accordion-collapse collapse" aria-labelledby="paymentTwo" data-bs-parent="#checkoutAccordion">
                        <div class="accordion-body">
                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="paypalThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paypal" aria-expanded="false" aria-controls="paypal">
                            PayPal
                        </button>
                    </h2>
                    <div id="paypal" class="accordion-collapse collapse" aria-labelledby="paypalThree" data-bs-parent="#checkoutAccordion">
                        <div class="accordion-body">
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                PayPal account.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-button-payment mt-20">
                <button type="submit" class="tp-btn-h1">Place order</button>
            </div>
        </div>
    </div>
</div>
