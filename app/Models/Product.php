<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'category_id', 'artist_id', 'store_id', 'code_number',
        'slug', 'brand', 'name', 'description', 'details', 'old_price',
        'latest_price', 'amount', 'weight', 'length', 'width', 'high',
        'color_family', 'view', 'like', 'sold', 'discounted', 'discounted_amount', 'size'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews():HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    public function wishlist(): HasMany
    {
         return $this->hasMany(Wishlist::class);
    }

    public function ratings(): HasMany
    {
         return $this->hasMany(ProductRating::class);
    }

    public function getAvarageRatingsAttribute()
    {
        $sumRating = $this->ratings()->sum('value');
        $ratingsCount = $this->ratings()->count();

//        return ($ratingsCount * 5) > 0 ? $sumRating / (($ratingsCount * 5) / 100) : 0;
        return $ratingsCount > 0 ? round($sumRating / $ratingsCount, 2) : 0;
    }

}
