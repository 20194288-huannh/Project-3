<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'category' => new CategoryResource($this->category),
            'status' => $this->status,
            'author' => $this->author,
            'type' => $this->type,
            'sale' => $this->sale,
            'description_title' => $this->description_title,
            'description' => $this->description,
            'shipping_time' => $this->shipping_time,
            'shipping_cost' => $this->shipping_cost,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'product_detail' => new ProductDetailResource($this->productDetail),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
