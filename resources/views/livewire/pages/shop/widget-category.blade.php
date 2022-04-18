<div class="product-widget mb-30">
    <h5 class="pt-title">Product categories</h5>
    <div class="widget-category-list mt-20">
        <form action="#">
            @foreach ($categories as $category)
                <div class="single-widget-category">
                    <a href="{{ url('/shop/category/' . $category->slug) }}">
                        <span>{{ ucfirst($category->name) }}</span>
                        <span class="text-sm">({{ $category->products_count }})</span>
                    </a>
                </div>
            @endforeach
        </form>
    </div>
</div>
