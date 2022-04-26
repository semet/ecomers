<?php

namespace App\Services;

use App\Models\Store;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class StoreProductSorting
{
    public function byFeatured(Store $store, Collection $priceRange): LengthAwarePaginator
    {
         if($priceRange->isEmpty())
         {
             return $store->products()->orderBy('sold')
                 ->orderBy('view')
                 ->withCount('reviews')
                 ->paginate(20);
         }else{
             return $store->products()->orderBy('sold')
                 ->orderBy('view')
                 ->withCount('reviews')
                 ->whereBetween('latest_price', $priceRange->flatten())
                 ->paginate(20);
         }
    }

    public function byLatest(Store $store, Collection $priceRange): LengthAwarePaginator
    {
         if($priceRange->isEmpty())
         {
             return $store->products()
                 ->latest()
                 ->withCount('reviews')
                 ->paginate(20);
         }else{
             return $store->products()
                 ->latest()
                 ->withCount('reviews')
                 ->whereBetween('latest_price', $priceRange->flatten())
                 ->paginate(20);
         }


    }

    public function byPriceLowToHigh(Store $store, Collection $priceRange): LengthAwarePaginator
    {
        if($priceRange->isEmpty())
        {
            return $store->products()
                ->orderBy('latest_price')
                ->withCount('reviews')
                ->paginate(20);
        }else{
            return $store->products()
                ->orderBy('latest_price')
                ->withCount('reviews')
                ->whereBetween('latest_price', $priceRange->flatten())
                ->paginate(20);
        }
    }

    public function byPriceHighToLow(Store $store, Collection $priceRange): LengthAwarePaginator
    {
        if($priceRange->isEmpty())
        {
            return $store->products()
                ->orderByDesc('latest_price')
                ->withCount('reviews')
                ->paginate(20);
        }else{
            return $store->products()
                ->orderByDesc('latest_price')
                ->withCount('reviews')
                ->whereBetween('latest_price', $priceRange->flatten())
                ->paginate(20);
        }
    }
}
