<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class CartController extends ApiController
{
    public function index()
    {
        $carts = Cart::latest()->paginate();
        foreach ($carts as $cart) {
            $cart->orders = $cart->orders->map(function ($order) {
                $order->actual_price = $order->product->price * (100 - $order->product->sale) / 100;
                $order->total_price = $order->actual_price * $order->quantity;
                return $order;
            });
        }
        return $this->response(['message' => 'success', 'data' => CartResource::collection($carts)]);
    }
    public function getCartByOrder($order_id)
    {
        $carts = Cart::where('order_id', $order_id)->latest()->get();
        return $this->response(['message' => 'success', 'data' => CartResource::collection($carts)]);
    }
    public function getCartByUser($user_id)
    {
        $carts = Cart::where('user_id', $user_id)->latest()->get();
        foreach ($carts as $cart) {
            $cart->orders = $cart->orders->map(function ($order) {
                $order->actual_price = $order->product->price * (100 - $order->product->sale) / 100;
                $order->total_price = $order->actual_price * $order->quantity;
                return $order;
            });
        }
        return $this->response(['message' => 'success', 'data' => CartResource::collection($carts)]);
    }
    public function store(Request $request)
    {
        $orders = Order::where('user_id', auth()->user()->id)->whereNull('cart_id')->latest()->get();
        $orders = $orders->map(function ($order) {
            $order->actual_price = $order->product->price * (100 - $order->product->sale) / 100;
            $order->total_price = $order->actual_price * $order->quantity;
            return $order;
        });
        $total_gross = array_sum($orders->pluck('total_price')->toArray());
        $payment = Payment::create([
            'payment_method_id' => $request->payment_method_id,
            'payment_amount' => $total_gross,
            'payment_date' => Carbon::now(),
            'credit_card_number' => $request->credit_card_number ?? null
        ]);
        $cart = Cart::create([
            'payment_id' => $payment->id,
            'user_id' => auth()->user()->id,
            'total_price' => $total_gross
        ]);
        $orders = Order::where('user_id', auth()->user()->id)->whereNull('cart_id')->latest()->get();
        $orders->each(function ($item) use ($cart) {
            $item->update(['cart_id' => $cart->id]);
        });
        return $this->response(['message' => 'success', 'data' => CartResource::collection($cart)]);
    }
}
