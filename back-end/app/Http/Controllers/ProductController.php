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
    public function index(Request $request)
    {
        $products = Product::latest();
        if ($request->has('category')) {
            $categories_ids = $this->categoryRepo->getSubcategoriesIds(Category::with('subcategories')->where('id', $request->category)->first());
            $products = Product::whereHas('categories', function ($q) use ($categories_ids) {
                $q->whereIn('categories.id', $categories_ids);
            })->orderBy('name', 'ASC');
        }
        if ($request->has('keyword')) {

        }
        $products = $products->paginate();
        return $this->response(['success' => true, 'data' => new ProductCollection($products)]);
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

    public function getProductByCategory(int $category_id)
    {
        $categories_ids = $this->categoryRepo->getSubcategoriesIds(Category::with('subcategories')->where('id', $category_id)->first());
        $products = Product::whereHas('categories', function ($q) use ($categories_ids) {
            $q->whereIn('categories.id', $categories_ids);
        })->orderBy('name', 'ASC')->paginate();
        return $this->response(['success' => true, 'data' => ProductResource::collection($products)]);
    }

    public function getNewArrivals(Request $request)
    {
        $query = Product::where('status', Product::STATUS_NEW)
            ->whereBetween('price', [$request->min_price, $request->max_price])
            ->whereBetween('sale', [$request->min_discount, $request->max_discount]);
        if ($request->has('binding') == 'other') {
            $query->whereHas('productDetail', function ($q) use ($request) {
                $q->where('binding', '!=', 'Paperback')->where('binding', '!=', 'Hardback');
            });
        } else if ($request->has('binding')) {
            $query->whereHas('productDetail', function ($q) use ($request) {
                $q->where('binding', $request->binding);
            });
        }
        if ($request->has('language')) {
            $query->whereHas('productDetail', function ($q) use ($request) {
                $q->where('language', $request->language);
            });
        }
        $products = $query->latest()->paginate();
        return $this->response(['success' => true, 'data' => new ProductCollection($products)]);
    }

    public function getFictionBook(Request $request)
    {
        $categories_ids = $this->categoryRepo->getSubcategoriesIds(Category::with('subcategories')->where('id', 151)->first());
        $query = Product::whereHas('categories', function ($query) use ($categories_ids){
            $query->whereIn('categories.id', $categories_ids);
        })->whereBetween('price', [$request->min_price, $request->max_price])
            ->whereBetween('sale', [$request->min_discount, $request->max_discount]);
        if ($request->has('binding') == 'other') {
            $query->whereHas('productDetail', function ($q) use ($request) {
                $q->where('binding', '!=', 'Paperback')->where('binding', '!=', 'Hardback');
            });
        } else if ($request->has('binding')) {
            $query->whereHas('productDetail', function ($q) use ($request) {
                $q->where('binding', $request->binding);
            });
        }
        if ($request->has('language')) {
            $query->whereHas('productDetail', function ($q) use ($request) {
                $q->where('language', $request->language);
            });
        }
        $products = $query->latest()->paginate();
        return $this->response(['success' => true, 'data' => new ProductCollection($products)]);
    }

    public function getBestSellers(Request $request)
    {
        $query = Product::whereBetween('price', [$request->min_price, $request->max_price])
            ->whereBetween('sale', [$request->min_discount, $request->max_discount]);
        if ($request->has('binding') == 'other') {
            $query->whereHas('productDetail', function ($q) use ($request) {
                $q->where('binding', '!=', 'Paperback')->where('binding', '!=', 'Hardback');
            });
        } else if ($request->has('binding')) {
            $query->whereHas('productDetail', function ($q) use ($request) {
                $q->where('binding', $request->binding);
            });
        }
        if ($request->has('language')) {
            $query->whereHas('productDetail', function ($q) use ($request) {
                $q->where('language', $request->language);
            });
        }
        $products = $query->orderBy('sold', 'DESC')->paginate();
        return $this->response(['success' => true, 'data' => new ProductCollection($products)]);
    }

    public function getWishList()
    {
        // $products = Product::whereHas('likedBy', function ($q) {
        //     $q->where('id', auth()->user()->id);
        // });
        $products = auth()->user()->wish()->latest()->paginate();
        return $this->response(['success' => true, 'data' => new ProductCollection($products)]);
    }

    public function likedProduct(Request $request)
    {
        $data = auth()->user()->wish()->attach([$request->product_id]);
        return $this->response(['success' => true, 'data' => $data]);
    }
    public function destroyLikedProduct($id)
    {
        $data = auth()->user()->wish()->detach([$id]);
        return $this->response(['success' => true, 'data' => $data]);
    }

}
