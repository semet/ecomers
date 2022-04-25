<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ProductFilter
{
    public function byFeatured(int $categoryId, Collection $priceRange): LengthAwarePaginator
    {
       if ($priceRange->isEmpty()){
           return Product::where('category_id', $categoryId)
               ->orderBy('sold')
               ->orderBy('view')
               ->withCount('reviews')
               ->paginate(20);
       }else{
           return Product::where('category_id', $categoryId)
               ->orderBy('sold')
               ->orderBy('view')
               ->whereBetween('latest_price', $priceRange->flatten())
               ->withCount('reviews')
               ->paginate(20);
       }
    }

    public function byLatest(int $categoryId, Collection $priceRange): LengthAwarePaginator
    {
        if ($priceRange->isEmpty()){
            return Product::where('category_id', $categoryId)
                ->latest()
                ->withCount('reviews')
                ->paginate(20);
        }else{
            return Product::where('category_id', $categoryId)
                ->latest()
                ->withCount('reviews')
                ->whereBetween('latest_price', $priceRange->flatten())
                ->paginate(20);
        }

    }

    public function byPriceLowToHigh(int $categoryId, Collection $priceRange): LengthAwarePaginator
    {
        if ($priceRange->isEmpty()){
            return Product::where('category_id', $categoryId)
                ->orderBy('latest_price')
                ->withCount('reviews')
                ->paginate(20);
        }else{
            return Product::where('category_id', $categoryId)
                ->orderBy('latest_price')
                ->withCount('reviews')
                ->whereBetween('latest_price', $priceRange->flatten())
                ->paginate(20);
        }

    }

    public function byPriceHighToLow(int $categoryId, Collection $priceRange): LengthAwarePaginator
    {
        if ($priceRange->isEmpty()){
            return Product::where('category_id', $categoryId)
                ->orderByDesc('latest_price')
                ->withCount('reviews')
                ->paginate(20);
        }else{
            return Product::where('category_id', $categoryId)
                ->orderByDesc('latest_price')
                ->withCount('reviews')
                ->whereBetween('latest_price', $priceRange->flatten())
                ->paginate(20);
        }

    }
}
