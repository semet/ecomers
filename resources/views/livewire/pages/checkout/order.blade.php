<div class="col-lg-6">
    @if($items->isNotEmpty())
    <div class="your-order mb-30 ">
        <h3>Your order</h3>
        <div class="your-order-table table-responsive">
            <table>
                <thead>
                <tr>
                    <th class="product-name">
                        <span class="text-uppercase">Product</span>
                    </th>
                    <th class="product-total">
                        <span class="text-uppercase">Total</span>
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach($items as $key => $item)
                    <tr class="cart_item">
                        <td class="product-name">
                            {{ $item['name'] }}
                            <strong class="product-quantity"> × {{ $item['quantity'] }}</strong>
                        </td>
                        <td class="product-total">
                            <span class="amount">Rp.{{ $item['price'] * $item['quantity'] }}</span>
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr class="cart-subtotal">
                    <th>Cart Subtotal</th>
                    <td><span class="amount">Rp.{{ $totalPrice }}</span></td>
                </tr>
                <tr class="shipping">
                    <th>Shipping</th>
                    <td>
                        <span class="amount">Rp.{{ $deliveryCost }}</span>
                    </td>
                </tr>
                <tr class="shipping">
                    <th>Donation</th>
                    <td>
                        <span class="amount">Rp.{{ $donation }}</span>
                    </td>
                </tr>
                <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount">Rp.{{ $grossAmount }}</span></strong>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="payment-method">
            <div class="payment-image text-center my-2">
                <a href="#"><img src="{{ asset('assets/img/payment/payment.png') }}" alt=""></a>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="order-button-payment mt-20 flex-grow-1">
                        <button type="submit" class="tp-btn-h1" wire:click.prevent="handlePayment">Complete Payment</button>
                    </div>
                </div>
                <div class="col-6">
                    <div class="order-button-payment mt-20 flex-sm-shrink-0">
                        <button type="submit" class="tp-btn-h1">Cash On Delivery (COD)</button>
                    </div>
                </div>
            </div>



            <div class="d-flex">
                <div class="order-button-payment mt-20">
                    <button class="tp-btn-h1">Donate</button>
                </div>
                <div class="pt-4 ms-4">
                    <input type="text" class="form-control mt-2" placeholder="Rp." wire:model.debounce.500ms="donation">
                </div>
            </div>
            <div class="">
                <p class="mt-2"><span class="text-danger">*</span>Donasi untuk bantuan sosial bla bla bla</p>

                <div>
                    <img src="{{ asset('assets/img/partners/act.svg') }}" class="" width="50" alt="">
{{--                    <img src="{{ asset('assets/img/partners/mri-logo.png') }}" class="" width="45" height="25" alt="">--}}
                </div>
            </div>

        </div>
    </div>
    @else
    <div class="your-order mb-30 ">
        <h3>No Items</h3>
    </div>
    @endif
</div>

@push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        window.addEventListener('snapTokenGenerated', (event) => {
            window.snap.pay(event.detail.snapToken, {
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    console.log(result);
                    @this.saveOrder(result, event.detail.snapToken)
                    // window.location.href = result.finish_redirect_url
                },
                onPending: function(result){
                    /* You may add your own implementation here */
                    console.log(result);
                    @this.saveOrder(result, event.detail.snapToken)
                    // window.location.href = result.finish_redirect_url
                },
                onError: function(result){
                    /* You may add your own implementation here */
                    console.log(result);
                    // window.location.href = result.finish_redirect_url
                },
                onClose: function(){
                    /* You may add your own implementation here */
                    window.location.reload();
                }
            })
        })
    </script>
@endpush
