<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
