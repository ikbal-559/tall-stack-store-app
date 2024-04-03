<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'featured_image',
        'product_type',
        'price_before_discount',
        'price',
        'brand_id',
        'category_id',
        'in_stock',
        'status'
    ];

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

    public function brand (): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category (): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getUnitPriceAttribute($value) : float
    {
        return number_format($value, 2);
    }

}
