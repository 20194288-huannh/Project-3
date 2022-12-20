<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class CartController extends ApiController
{
    public function index()
    {
        $carts = Cart::paginate();
        return $this->response(['message' => 'success', 'data' => CartResource::collection($carts)]);
    }
    public function getCartByOrder($order_id)
    {
        $carts = Cart::where('order_id', $order_id)->latest()->get();
        return $this->response(['message' => 'success', 'data' => CartResource::collection($carts)]);
    }
}
