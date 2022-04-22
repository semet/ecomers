<div class="product-details-des mt-40 mb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="product__details-des-tab">
                    <ul class="nav nav-tabs" id="productDesTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="des-tab" data-bs-toggle="tab" data-bs-target="#des" type="button" role="tab" aria-controls="des" aria-selected="true">Description </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="aditional-tab" data-bs-toggle="tab" data-bs-target="#aditional" type="button" role="tab" aria-controls="aditional" aria-selected="false">Additional information</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">Reviews ({{ $product->reviews->count() }}) </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content" id="prodductDesTaContent">
            <div class="tab-pane fade active show" id="des" role="tabpanel" aria-labelledby="des-tab">
                <livewire:pages.product.main-description :product="$product"/>
            </div>
            <div class="tab-pane fade" id="aditional" role="tabpanel" aria-labelledby="aditional-tab">
                <livewire:pages.product.additional-info :product="$product"/>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <livewire:pages.product.review :product="$product"/>
            </div>
        </div>
    </div>
</div>
