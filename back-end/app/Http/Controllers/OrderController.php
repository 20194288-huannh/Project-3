<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends ApiController
{
    public function index()
    {
        $orders = Order::latest()->paginate();
        $orders = $orders->map(function ($order) {
            $order->total_price = $order->product->price * $order->quantity;
            return $order;
        });
        return $this->response(['message' => 'success', 'data' => new OrderCollection($orders)]);
    }
    public function store(Request $request)
    {
        $order = Order::where('user_id', auth()->user()->id)->where('product_id', $request->product_id)->first();
        if ($order) {
            return $this->responseOk($order);
        }
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'voucher_id' => $request->voucher_id,
            'cart_id' => $request->cart_id,
            'quantity' => 1,
            'status' => 1,
        ]);
        return $this->responseOk(new OrderResource($order));
    }
    public function update(Request $request)
    {
        $order = Order::updateOrCreate([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
        ], [
            'voucher_id' => $request->voucher_id,
            'cart_id' => $request->cart_id,
            'quantity' => 1,
            'status' => 1,
        ]);
        return $this->responseOk(new OrderResource($order));
    }
    public function destroy(int $id)
    {
        $data = Order::find($id)->delete();
        return $this->response(['success' => true, 'data' => $data]);
    }
    public function getOrderByUser()
    {
        $orders = Order::where('user_id', auth()->user()->id)->latest()->paginate();
        $orders = $orders->map(function ($order) {
            $order->total_price = $order->product->price * $order->quantity;
            return $order;
        });
        $total_gross = array_sum($orders->pluck('total_price')->toArray());
        $responseData = [
            'data' => OrderResource::collection($orders)->toArray(request()),
            'total_gross' => $total_gross
        ];
        return $this->responseOk($responseData);
    }
}
