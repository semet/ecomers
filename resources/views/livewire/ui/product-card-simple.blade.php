<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
    <div class="product__item product__item-2 b-radius-2 mb-20">
        <div class="product__thumb fix">
            <div class="product-image w-img">
                <a href="product-details.html">
                    <img src="{{ $product->images->first()->name }}" class="rounded" alt="product">
                </a>
            </div>
            @if($product->discounted)
                <div class="product__offer">
                    <span class="discount">-{{ $product->discounted_amount }}%</span>
                </div>
            @endif
            <div class="product-action product-action-2">
                <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                    <i class="fal fa-eye"></i>
                    <i class="fal fa-eye"></i>
                </a>
                <a href="#" class="icon-box icon-box-1">
                    <i class="fal fa-heart"></i>
                    <i class="fal fa-heart"></i>
                </a>
                <a href="#" class="icon-box icon-box-1">
                    <i class="fal fa-layer-group"></i>
                    <i class="fal fa-layer-group"></i>
                </a>
            </div>
        </div>
        <div class="product__content product__content-2 mt-2">
            <h6><a href="product-details.html">{{ $product->name }}</a></h6>
            <div class="rating mb-5 mt-10">
                <ul>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                </ul>
                <span>({{ $product->reviews_count }} review)</span>
            </div>
            <div class="price">
                <span>Rp.{{ $product->latest_price }}</span>
            </div>
        </div>
        <div class="product__add-cart text-center">
            <button type="button" class="cart-btn-3 product-modal-sidebar-open-btn d-flex align-items-center justify-content-center w-100" wire:click.prevent="addToCart('{{ $product->id }}')">
                Add to Cart
            </button>
        </div>
    </div>
</div>
