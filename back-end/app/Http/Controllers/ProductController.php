<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $product = Product::create([
            'author' => $request->author,
            'description' => $request->description,
            'image' => $request->image ?? null,
            'name' => $request->name ?? null,
            'price' => $request->price ?? null,
            'quantity' => $request->quantity,
            'sale' => $request->sale,
            'shipping_cost' => 14,
            'shipping_time' => "14-16 Business Days",
            'status' => 1,
        ]);
        $product->productDetail()->create([
            'binding' => $request->binding,
            'height' => $request->height,
            'isbn_10' => $request->isbn_10,
            'isbn_13' => $request->isbn_13,
            'language' => $request->language ?? null,
            'no_of_pages' => $request->no_of_pages,
            'publisher' => $request->publisher,
            'publisher_date' => $request->publisher_date ?? null,
            'returnable' => $request->returnable,
            'spine_width' => $request->spine_width,
            'weight' => $request->weight,
            'width' => $request->weight
        ]);
        return $this->response(['success' => true, 'data' => new ProductResource($product)]);
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
        $product = Product::with('productDetail')->findOrFail($id);
        $product->categories()->sync($request->category);
        $product->update([
            'author' => $request->author,
            'description' => $request->description,
            'image' => $request->image ?? null,
            'name' => $request->name ?? null,
            'price' => $request->price ?? null,
            'sale' => $request->sale,
            'shipping_cost' => 14,
            'shipping_time' => "14-16 Business Days",
            'status' => 1,
        ]);
        $product->productDetail()->update([
            'binding' => $request->product_detail['binding'],
            'height' => $request->product_detail['height'],
            'isbn_10' => $request->product_detail['isbn_10'],
            'isbn_13' => $request->product_detail['isbn_13'],
            'language' => $request->product_detail['language'] ?? null,
            'no_of_pages' => $request->product_detail['no_of_pages'],
            'publisher' => $request->product_detail['publisher'],
            'publisher_date' => $request->product_detail['publisher_date'] ?? null,
            'returnable' => $request->product_detail['returnable'],
            'spine_width' => $request->product_detail['spine_width'],
            'weight' => $request->product_detail['weight'],
            'width' => $request->product_detail['width']
        ]);
        return $this->response(['success' => true, 'data' => new ProductResource($product)]);
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
    public function getProductBySearch(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->keyword . '%')->orderBy('name', 'ASC')->paginate();
        return $this->response(['success' => true, 'data' => ProductResource::collection($products)]);
    }

    public function getNewArrivals(Request $request)
    {
        $query = Product::where('status', Product::STATUS_NEW);
        $query = $query->orderBy('sold', 'DESC');
        if ($request->has('min_price') && $request->has('max_price') && $request->has('min_discount') && $request->has('max_discount')) {
            $query
            ->whereBetween('price', [$request->min_price, $request->max_price])
            ->whereBetween('sale', [$request->min_discount, $request->max_discount]);
        }
        if ($request->binding == 'other') {
            $query->whereHas('productDetail', function ($q) use ($request) {
                $q->where(DB::raw('lower(binding)'), '!=', 'paperback')->where('binding', '!=', 'hardback');
            });
        } else if ($request->has('binding')) {
            $query->whereHas('productDetail', function ($q) use ($request) {
                $q->where(DB::raw('lower(binding)'), strtolower($request->binding));
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
        $query = Product::orderBy('sold', 'DESC');
        if ($request->has('min_price') && $request->has('max_price') && $request->has('min_discount') && $request->has('max_discount')) {
            $query
            ->whereBetween('price', [$request->min_price, $request->max_price])
            ->whereBetween('sale', [$request->min_discount, $request->max_discount]);
        }
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
        $products = $query->paginate();
        return $this->response(['success' => true, 'data' => new ProductCollection($products)]);
    }
    public function getAwardWinner(Request $request)
    {
        $query = Product::where('is_award_winner', 1);
        if ($request->has('min_price') && $request->has('max_price') && $request->has('min_discount') && $request->has('max_discount')) {
            $query
            ->whereBetween('price', [$request->min_price, $request->max_price])
            ->whereBetween('sale', [$request->min_discount, $request->max_discount]);
        }
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
        $products = $query->paginate();
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
        $data = auth()->user()->wish()->attach($request->product_id);
        return $this->response(['success' => true, 'data' => $data]);
    }
    public function destroyLikedProduct($id)
    {
        $data = auth()->user()->wish()->detach([$id]);
        return $this->response(['success' => true, 'data' => $data]);
    }

    public function getTrendingProduct(Request $request) {
        $products = Product::inRandomOrder()
            ->limit(24)
            ->get()
            ->toArray();
        $chunks = array_chunk($products, 6);
        $data = collect($chunks);
        return $this->response(['success' => true, 'data' => $data]);
    }

    public function getMinimumFortyPercentDiscount() {
        $products = Product::where('sale', '>=', 40)->orderBy('sale')->get();
        return $this->response(['success' => true, 'data' => $products]);
    }

}
