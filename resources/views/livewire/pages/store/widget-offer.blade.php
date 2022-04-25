<div class="product-widget mb-30">
    <h5 class="pt-title">On The Spot from this store</h5>
    <div class="product__sm mt-20">
        <ul>
            @foreach($products as $product)
                <li class="product__sm-item d-flex align-items-center">
                    <div class="product__sm-thumb mr-20">
                        <a href="product-details.html">
                            <img src="{{ asset('assets/img/product/sm-1.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="product__sm-content">
                        <h5 class="product__sm-title">
                            <a href="product-details.html">{{ $product->name }}</a>
                        </h5>
                        <div class="product__sm-price">
                            <span class="price">Rp.{{ $product->latest_price }}</span>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
</div>
