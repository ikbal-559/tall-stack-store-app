<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'product_type'
    ];

    public function details (): HasOne
    {
        return $this->hasOne(ProductDetails::class, 'product_id', 'id');
    }


    public function metas (): HasMany
    {
        return $this->hasMany(ProductMeta::class, 'product_id', 'id');
    }



}
