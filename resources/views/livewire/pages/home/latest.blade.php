<section class="featured light-bg pt-50 pb-40">
    <div class="container custom-conatiner">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__head d-flex justify-content-between mb-30">
                    <div class="section__title section__title-2">
                        <h5 class="st-titile">Latest Products</h5>
                    </div>
                    <div class="button-wrap button-wrap-2">
                        <a href="product.html">See All Product <i class="fal fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-6 col-lg-12">
                <div class="single-features-item single-features-item-d b-radius-2 mb-20">
                    <div class="row  g-0 align-items-center">
                        <div class="col-md-6">
                            <div class="features-thum">
                                <div class="features-product-image w-img">
                                    <a href="product-details.html">
                                        <img src="{{ $products->first()->images->first()->name }}" class="rounded-2" width="280" height="280" alt="{{ $products->first()->slug }}">
                                    </a>
                                </div>
                                @if($products->first()->discounted)
                                    <div class="product__offer">
                                        <span class="discount">-{{ $products->first()->discounted_amount }}%</span>
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
                        </div>
                        <div class="col-md-6">
                            <div class="product__content product__content-d product__content-d-2 ms-3">
                                <h6><a href="product-details.html">{{ $products->first()->name }}</a></h6>
                                <div class="rating mb-5">
                                    <ul class="rating-d">
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                        <li><a href="#"><i class="fal fa-star"></i></a></li>
                                    </ul>
                                    <span>(01 review)</span>
                                </div>
                                <div class="price d-price mb-10">
                                    <span>Rp.{{ $products->first()->latest_price }} <del>Rp.{{ $products->first()->old_price }}</del></span>
                                </div>
                                <div class="features-des mb-25">
                                    <p>{{ $products->first()->description }}</p>
                                </div>
                                <div class="cart-option">
                                    <button class="cart-btn-4 w-100 mr-10" wire:click.prevent="addToCart('{{ $products->first()->id }}')">Add to Cart</button>
                                    <button class="transperant-btn-2"><i class="fal fa-heart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-lg-12">
                <div class="row">
                    @foreach($products->skip(1)->take(4) as $product)
                    <div class="col-md-6">
                        <div class="single-features-item b-radius-2 mb-20">
                            <div class="row  g-0 align-items-center">
                                <div class="col-6">
                                    <div class="features-thum">
                                        <div class="features-product-image w-img">
                                            <a href="product-details.html">
                                                <img src="{{ $product->images->first()->name }}" class="rounded-2" width="123" height="123" alt="{{ $product->slug }}">
                                            </a>
                                        </div>
                                        @if($product->discounted)
                                            <div class="product__offer">
                                                <span class="discount">-{{ $product->discounted_amount }}%</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="product__content product__content-d product__content-d-2 ms-2">
                                        <h6><a href="product-details.html">{{ $product->name }}</a></h6>
                                        <div class="rating mb-5">
                                            <ul>
                                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                <li><a href="#"><i class="fal fa-star"></i></a></li>
                                            </ul>
                                            <span>(01 review)</span>
                                        </div>
                                        <div class="price d-price">
                                            <span>Rp.{{ $product->latest_price }} <del>Rp.{{ $product->old_price }}</del></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</section>
