<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCartByOrder($order_id)
    {
        $cart = Cart::where('order_id', $order_id)->latest()->get();
        return $this->response(['message' => 'success', 'data' => CartResource::collection($cart)]);
    }
}
