<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends ApiController
{
    public function index()
    {

    }

    public function show($id)
    {
        $product = ProductDetail::with('productDetail')->find($id);
        return $this->response(['success' => true, 'data' => new ProductResource($product)]);
    }
}
