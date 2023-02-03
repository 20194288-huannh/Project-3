<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    const STATUS_AVAILABLE = 1;
    const STATUS_INTERNATIONAL_EDITION = 1;

    const TYPE_PAPER_BACK = 1;
    const TYPE_HARD_COVER = 2;
    const TYPE_HARD_BACK = 3;
    const TYPE_CALENDAR = 4;
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
    public function productDetail()
    {
        return $this->hasOne(ProductDetail::class, 'product_id');
    }
}
