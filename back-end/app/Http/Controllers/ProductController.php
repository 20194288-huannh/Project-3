<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    private $categoryRepo;
    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::latest()->paginate();
        return $this->response(['success' => true, 'data' => new ProductCollection($product)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('productDetail')->find($id);
        return $this->response(['success' => true, 'data' => new ProductResource($product)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $product->update($request->only(['name', 'category_id', 'image', 'author', 'type', 'price', 'sale', 'description_title', 'description', 'shipping_time', 'shipping_cost']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $data = $product->delete();
        return $this->response(['success' => true, 'data' => $data]);
    }

    public function getProductByCategory(int $category_id) {
        $categories_ids = $this->categoryRepo->getSubcategoriesIds(Category::with('subcategories')->where('id', $category_id)->first());
        $products = Product::whereHas('categories', function ($q) use ($categories_ids){
            $q->whereIn('categories.id', $categories_ids);
        })->orderBy('name', 'ASC')->paginate();
        return $this->response(['success' => true, 'data' => ProductResource::collection($products)]);
    }
}
