<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    const STATUS_AVAILABLE = 1;
    const STATUS_INTERNATIONAL_EDITION = 1;

    const TYPE_PAPER_BACK = 1;
    const TYPE_HARD_COVER = 2;
    const TYPE_HARD_BACK = 3;
    const TYPE_CALENDAR = 4;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
