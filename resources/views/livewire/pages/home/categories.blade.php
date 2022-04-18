<section class="categories__area light-bg-s pt-20 pb-10">
    <div class="container custom-conatiner">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__head d-flex justify-content-between mb-30">
                    <div class="section__title section__title-2">
                        <h5 class="st-titile">Popular Categories</h5>
                    </div>
                    <div class="button-wrap button-wrap-2">
                        <a href="product.html">See All Product <i class="fal fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-xl-2 col-lg-3 col-md-4">
                <div class="categories__item p-relative w-img mb-30">
                    <div class="categories__img b-radius-2">
                        <a href="product-details.html">
                            <img src="{{ $category->photo }}" alt="">
                        </a>
                    </div>
                    <div class="categories__content">
                        <h6><a href="product-details.html">{{ $category->name }}</a></h6>
                        <p>({{ $category->products_count }} Products)</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
