@section('title', 'Product: ' . ucfirst($product->name))

<section>
    <!-- breadcrumb__area-start -->
    <livewire:pages.product.breadcrumb :product="$product"/>
    <!-- breadcrumb__area-end -->

    <!-- product-details-start -->
    <livewire:pages.product.details :product="$product"/>
    <!-- product-details-end -->

    <!-- product-details-des-start -->
    <livewire:pages.product.description :product="$product"/>
    <!-- product-details-des-end -->
</section>

