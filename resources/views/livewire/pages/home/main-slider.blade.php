<div class="slider-area light-bg-s pt-60">
    <div class="container custom-conatiner">
        <div class="row">
            <div class="col-xl-7">
                <div class="swiper-container slider__active pb-30">
                    <div class="slider-wrapper swiper-wrapper">
                        @foreach ($mainSlider as $product)
                            <div class="single-slider swiper-slide b-radius-2 slider-height-2 d-flex align-items-center" data-background="{{ $product->images->first()->name }}">
                                <div class="slider-content slider-content-2">
                                    <h2 data-animation="fadeInLeft" data-delay="1.7s" class="pt-15 slider-title pb-5">{{ $product->name }}</h2>
                                    <p class="pr-20 slider_text" data-animation="fadeInLeft" data-delay="1.9s">Discount {{ $product->discounted_amount }}% On Products </p>
                                    <div class="slider-bottom-btn mt-65">
                                        <a data-animation="fadeInUp" data-delay="1.15s" href="shop.html" class="st-btn-border b-radius-2">Discover now</a>
                                    </div>
                                </div>
                            </div><!-- /single-slider -->
                        @endforeach

                        <div class="main-slider-paginations"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="row">

                    @foreach ($randomProducts as $product)
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="banner__item p-relative w-img mb-30">
                                <div class="banner__img b-radius-2">
                                    <a href="product-details.html">
                                        <img src="{{ $product->images->first()->name }}" alt="" width="350" height="200">
                                    </a>
                                </div>
                                <div class="banner__content banner__content-2">
                                    <h6><a href="product-details.html">{{ $product->name }}</a></h6>
                                    <p>{{ $product->category->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
