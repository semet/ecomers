@section('title', 'Store: '.$store->name)

<section>
    <!-- breadcrumb__area-start -->
    <livewire:pages.store.breadcrumb/>
    <!-- breadcrumb__area-end -->

    <!-- shop-area-start -->
    <div class="shop-area mb-20">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <livewire:pages.store.widget-category/>
                    <livewire:pages.shop.widget-filter-price/>
                    <livewire:pages.shop.widget-color/>
                    <livewire:pages.store.widget-offer :store="$store"/>

                </div>
                <div class="col-xl-9 col-lg-8">
                    <livewire:pages.store.banner />
                    <div class="product-lists-top">
                        <div class="product__filter-wrap">
                            <div class="row align-items-center">
                                <livewire:pages.store.filter />
                                <livewire:pages.store.product-sort />

                            </div>
                        </div>
                    </div>
                    <div class="tp-wrapper">
                        <div class="row g-0">
                            @foreach ($products as $product)
                                <livewire:ui.product-card :product="$product" wire:key="{{ $product->id }}" />
                            @endforeach
                        </div>
                    </div>
                    <div class="tp-pagination text-center">
                        <div class="row">
                            <div class="col-xl-12">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop-area-end -->


</section>
