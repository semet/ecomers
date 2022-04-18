<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductReviewMedia extends Model
{
    use HasFactory;

    protected $fillable = ['product_review_id', 'media'];

    public function review(): BelongsTo
    {
        return $this->belongsTo(ProductReview::class);
    }
}
