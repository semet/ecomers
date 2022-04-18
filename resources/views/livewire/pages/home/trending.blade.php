<section class="trending-product-area light-bg-s pt-25 pb-15">
    <div class="container custom-conatiner">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__head d-flex justify-content-between mb-30">
                    <div class="section__title section__title-2">
                        <h5 class="st-titile">Hot Trending Products</h5>
                    </div>
                    <div class="button-wrap button-wrap-2">
                        <a href="product.html">See All Product <i class="fal fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($products as $product)
                <livewire:ui.product-card-simple :product="$product"/>
            @endforeach

        </div>
    </div>
</section>
