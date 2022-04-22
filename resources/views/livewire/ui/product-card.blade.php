<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
    <div class="product__item product__item-d">
        <div class="product__thumb fix">
            <div class="product-image w-img">
                <a href="product-details.html">
                    <img src="{{ asset('assets/img/product/tp-2.jpg') }}" class="rounded-3" alt="product">
                </a>
            </div>
            <div class="product-action">
                <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId" wire:click="handlePreview('{{ $product->id }}')">
                    <i class="fal fa-eye"></i>
                    <i class="fal fa-eye"></i>
                </a>
                <a href="#" class="icon-box icon-box-1" wire:click.prevent="handleAddToWishlist('{{ $product->id }}')">
                    <i class="fal fa-heart"></i>
                    <i class="fal fa-heart"></i>
                </a>
                <button class="icon-box icon-box-1" wire:click.prevent="addToCart('{{ $product->id }}')">
                    <i class="fal fa-shopping-cart"></i>
                    <i class="fal fa-shopping-cart"></i>
                </button>
            </div>
        </div>
        <div class="product__content-3 mt-2" wire:ignore>
            <h6><a href="{{ url('/shop/product/'.$product->slug) }}">{{ $product->name }}</a></h6>
            <div class="rating mb-5">
                <ul>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                    <li><a href="#"><i class="fal fa-star"></i></a></li>
                </ul>
                <span>({{ $product->reviews_count }} review)</span>
            </div>
            <div class="price mb-10">
                <span>Rp.{{ $product->latest_price }}</span></span>
            </div>
        </div>
        <div class="product__add-cart-s text-center" wire:ignore>
            <button class="cart-btn d-flex mb-10 align-items-center justify-content-center w-100 rounded-3" wire:click.prevent="addToCart('{{ $product->id }}')">
                Add to Cart
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('pleaseLogin', () => {
            $('#loginModal').modal('show')
        });
    </script>
@endpush
