<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{
    public function index()
    {
        $categories = Category::all();
        return $this->response(['message' => 'success', 'data' => CategoryResource::collection($categories)]);
    }
    public function getCategoryLeaf()
    {
        $categories = Category::where('level', 3)->get();
        return $this->response(['message' => 'success', 'data' => CategoryResource::collection($categories)]);
    }
    public function show($category_id)
    {
        $category = Category::find($category_id);
        return $this->response(['message' => 'success', 'data' => new CategoryResource($category)]);
    }
    public function getHighestCategory()
    {
        $categories = Category::whereNull('parent_id')->get();
        return $this->response(['message' => 'success', 'data' => CategoryResource::collection($categories)]);
    }
    public function getChildCategory($category_id)
    {
        $categories = Category::where('parent_id', $category_id)->get();
        return $this->response(['message' => 'success', 'data' => CategoryResource::collection($categories)]);
    }
    public function getParentCategory($category_id)
    {
        $category = Category::find($category_id);
        $parents = [];
        $parent = $category;
        for ($i = 1; $i < $category->level; $i++) {
            $parent = Category::find($parent->parent_id);
            array_unshift($parents, $parent);
        }
        return $this->response(['message' => 'success', 'data' => $parents]);
    }

    public function store(Request $request)
    {
        try {
            $category = Category::create($request->only([
                'name', 'parent_id', 'level'
            ]));
            return $this->response(new CategoryResource($category));
        } catch (\Throwable $ex) {
            return $this->responseError($ex);
        }
    }
}
