<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'gender', 'birth_date', 'birth_place', 'specialist',
        'biography', 'active'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
