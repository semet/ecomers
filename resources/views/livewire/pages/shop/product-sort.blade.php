<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
    <div class="product__filter-right d-flex align-items-center justify-content-md-end">
        <div class="product__sorting product__show-position ml-20">
            <select class="form-control" wire:model.debounce.500ms="filterTypes">
                <option value="featured">Featured</option>
                <option value="latest">Latest</option>
                <option value="price-low-to-high">Price Low to High</option>
                <option value="price-high-to-low">Price High to Low</option>
            </select>
        </div>
    </div>
</div>
