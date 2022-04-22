<div class="product__desc-info">
    <ul>
        <li>
            <h6>Weight</h6>
            <span>{{ $product->weight/1000 }} Gr</span>
        </li>
        <li>
            <h6>Dimensions</h6>
            <span>12 × 16 × 19 in</span>
        </li>
        <li>
            <h6>Product</h6>
            <span>Purchase this product on rag-bone.com</span>
        </li>
        <li>
            <h6>Color</h6>
            <span>{{ $product->color_family }}</span>
        </li>
        <li>
            <h6>Shipping</h6>
            <span>POS/Western Union, JNE, JNT</span>
        </li>
        <li>
            <h6>Brand</h6>
            <span>{{ $product->brand }}</span>
        </li>
    </ul>
</div>
