<div class="product-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="product__details-nav d-sm-flex align-items-start">
                    <ul class="nav nav-tabs flex-sm-column justify-content-between" id="productThumbTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="thumbOne-tab" data-bs-toggle="tab" data-bs-target="#thumbOne" type="button" role="tab" aria-controls="thumbOne" aria-selected="true">
                                <img src="{{ asset('assets/img/product/nav/product-nav-1.jpg') }}" alt="">
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="thumbTwo-tab" data-bs-toggle="tab" data-bs-target="#thumbTwo" type="button" role="tab" aria-controls="thumbTwo" aria-selected="false">
                                <img src="{{ asset('assets/img/product/nav/product-nav-2.jpg') }}" alt="">
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="thumbThree-tab" data-bs-toggle="tab" data-bs-target="#thumbThree" type="button" role="tab" aria-controls="thumbThree" aria-selected="false">
                                <img src="{{ asset('assets/img/product/nav/product-nav-3.jpg') }}" alt="">
                            </button>
                        </li>
                    </ul>
                    <div class="product__details-thumb">
                        <div class="tab-content" id="productThumbContent">
                            <div class="tab-pane fade show active" id="thumbOne" role="tabpanel" aria-labelledby="thumbOne-tab">
                                <div class="product__details-nav-thumb w-img">
                                    <img src="{{ asset('assets/img/product/nav/product-nav-big-1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thumbTwo" role="tabpanel" aria-labelledby="thumbTwo-tab">
                                <div class="product__details-nav-thumb w-img">
                                    <img src="{{ asset('assets/img/product/nav/product-nav-big-3.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thumbThree" role="tabpanel" aria-labelledby="thumbThree-tab">
                                <div class="product__details-nav-thumb w-img">
                                    <img src="{{ asset('assets/img/product/nav/product-nav-big-2.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="product__details-content">
                    <h6>{{ ucwords($product->name) }}</h6>
                    <div class="pd-rating mb-10">
                        <ul class="rating">
                            <li>
                                <a href="#"><i class="fas fa-star"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-star"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-star"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-star"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-star"></i></a>
                            </li>
                        </ul>
                        <span class="text-danger">{{ $product->avarageRatings }}</span>
                        <span>({{ $product->reviews->count() }} review)</span>
                    </div>
                    <div class="price mb-10">
                        <span>Rp.{{ $product->latest_price }}</span>
                       @if($product->old_price !== null)
                            <del>Rp.{{ $product->old_price }}}</del>
                       @endif
                    </div>
                    <div class="features-des mb-20 mt-10">
                        {{ $product->description }}
                    </div>
                    <div class="product-stock mb-20">
                        <h5>Availability: <span> {{ $product->amount }} in stock</span></h5>
                    </div>
                    <div class="cart-option mb-15">
                        <div class="product-quantity mr-20">
                            <div class="cart-plus-minus p-relative">
                                <input type="text" wire:model="quantity" />
                                <button class="dec qtybutton @if($quantity === 0) text-black-50 @endif" wire:click.prevent="decrementItem" @if($quantity === 0) disabled @endif>-</button>
                                <button class="inc qtybutton" wire:click.prevent="incrementItem">+</button>
                            </div>
                        </div>
                        <a href="#" class="cart-btn" wire:click.prevent="handleAddToCart('{{ $product->id }}')">Add to Cart</a>
                    </div>
                    <div class="details-meta">
                        <div class="d-meta-left">
                            <div class="dm-item mr-20">
                                <a href="#"><i class="fal fa-heart"></i>Add to wishlist</a>
                            </div>
                        </div>
                        <div class="d-meta-left">
                            <div class="dm-item">
                                <a href="#"><i class="fal fa-share-alt"></i>Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-tag-area mt-15">
                        <div class="product_info">
                            <span class="sku_wrapper">
                                <span class="title">SKU:</span>
                                <span class="sku">DK1002</span>
                            </span>

                            <span class="posted_in">
                                <span class="title">Category:</span>
                                <a href="#">{{ $product->category->name }}</a>
                            </span>

                            <div class="h4 mt-2">
                                <span class="posted_in">
                                    <span class="title">Store:</span>
                                    <a href="#">{{ $product->store->name }}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
