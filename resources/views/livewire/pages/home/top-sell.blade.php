<section class="topsell__area light-bg-s pt-15">
    <div class="container custom-conatiner">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__head d-flex justify-content-between mb-30">
                    <div class="section__title section__title-2">
                        <h5 class="st-titile-d st-titile-d-2">Top Deals Of The Day</h5>
                    </div>
                    <div class="offer-time">
                        <span class="offer-title d-none d-sm-block">Hurry Up! Offer ends in:</span>
                        <div class="countdown">
                            <div class="countdown-inner b-radius-2" data-countdown="" data-date="Mar 02 2022 20:20:22">
                                <ul class="text-center">
                                    <li><span data-days="">32</span> Days</li>
                                    <li><span data-hours="">5</span> Hours</li>
                                    <li><span data-minutes="">32</span> Mins</li>
                                    <li><span data-seconds="">27</span> Secs</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-xl-6 col-lg-12">
                <div class="single-features-item single-features-item-d single-features-item-d-2 b-radius-2 mb-20">
                    <div class="row g-0 align-items-center">
                        <div class="col-lg-6">
                            <div class="features-thum">
                                <div class="features-product-image w-img">
                                    <a href="product-details.html">
                                        <img src="{{ $product->images->first()->name }}" class="rounded-2" width="330" height="330" alt="{{ $product->slug }}">
                                    </a>
                                </div>
                                <div class="product__offer">
                                    <span class="discount">-{{ $product->discounted_amount }}%</span>
                                </div>
                                <div class="product-action product-action-2">
                                    <a href="#" class="icon-box icon-box-1" data-bs-toggle="modal" data-bs-target="#productModalId">
                                        <i class="fal fa-eye"></i>
                                        <i class="fal fa-eye"></i>
                                    </a>
                                    <a href="#" class="icon-box icon-box-1">
                                        <i class="fal fa-layer-group"></i>
                                        <i class="fal fa-layer-group"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product__content product__content-d product__content-d-2 ms-2">
                                <h6><a href="product-details.html">{{ $product->name }}</a></h6>
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
                                <div class="price mb-10">
                                    <span>Rp.{{ $product->latest_price }} <del>Rp.{{ $product->old_price }}</del></span>
                                </div>
                                <div class="features-des mb-20">
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="progress mb-5">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $product->sold / ($product->amount + $product->sold) * 100 }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress-rate mb-15">
                                    <span>Sold:{{ $product->sold }}/{{ $product->amount + $product->sold }}</span>
                                </div>
                                <div class="cart-option">
                                    <button class="cart-btn-4 w-100" wire:click.prevent="addToCart('{{ $product->id }}')">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
