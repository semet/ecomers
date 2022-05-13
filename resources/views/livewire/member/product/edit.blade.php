@section('title', 'Product: ' . $product->name)
@section('subtitle', 'Edit Product')

<main>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header">Product Details</h4>
                <div class="card-body">
                    <livewire:member.product.edit-product-detail :product="$product" />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header">Product Description</h4>
                <div class="card-body">
                    <livewire:member.product.edit-product-description :product="$product" />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <h4 class="card-header">Product Images</h4>
                <div class="card-body">
                    <livewire:member.product.edit-product-image :product="$product" />
                </div>
            </div>
        </div>
    </div>
</main>
