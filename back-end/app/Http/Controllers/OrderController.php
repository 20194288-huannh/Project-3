<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends ApiController
{
    public function index()
    {
        $orders = Order::paginate();
        return $this->response(['message' => 'success', 'data' => OrderResource::collection($orders)]);
    }
}
