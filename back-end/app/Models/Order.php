<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }
    public function voucher_shipping()
    {
        return $this->belongsTo(Voucher::class, 'voucher_shipping_id');
    }
    public function topping()
    {
        return $this->belongsToMany(Topping::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
