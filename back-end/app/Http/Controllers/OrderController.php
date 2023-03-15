<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Category;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function getTotalOrderRecentYear()
    {
        $months = 12; // Lấy năm gần nhất
        $results = DB::table('carts')
            ->join('payments', 'payments.id', '=', 'carts.payment_id')
            ->select(DB::raw('MONTH(payments.payment_date) as month'), DB::raw('SUM(total_price) as total'))
            ->whereBetween(DB::raw('payments.payment_date'), [Carbon::now()->subMonths($months), Carbon::now()])
            ->groupBy(DB::raw('MONTH(payments.payment_date)'))
            ->orderBy(DB::raw('MAX(payments.payment_date)'), 'asc')
            ->get();
        info($results);
        return $this->responseOk($results);
    }
    public function getTotalBookRecentYear()
    {
        $result = [];
        $highest_categories = Category::whereNull('parent_id')->get();
        foreach ($highest_categories as $highest_category) {
            $total_quantity = 0;
            $subCategories = $this->getAllSubCategories($highest_category);
            $categoryIds = array_column($subCategories, 'id');
            $total_quantity += DB::table('orders')
                ->join('carts', 'orders.cart_id', '=', 'carts.id')
                ->join('payments', 'payments.id', '=', 'carts.payment_id')
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->join('category_products', 'category_products.product_id', '=', 'products.id')
                ->whereBetween(DB::raw('payments.payment_date'), [Carbon::now()->subMonths(12), Carbon::now()])
                ->whereIn('category_products.category_id', $categoryIds)
                ->sum('orders.quantity');
            array_push($result, [
                'category' => $highest_category->name,
                'total' => $total_quantity
            ]);
        }
        return $this->responseOk($result);
    }
    function getAllSubCategories($category) {
        $subCategories = [];
    
        foreach ($category->children as $child) {
            $subCategories[] = $child;
            $subCategories = array_merge($subCategories, $this->getAllSubCategories($child));
        }
    
        return $subCategories;
    }
}
