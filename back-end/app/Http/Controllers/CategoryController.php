<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    public function index()
    {
        $categories = Category::paginate();
        return $this->response(['message' => 'success', 'data' => CategoryResource::collection($categories)]);
    }
}
