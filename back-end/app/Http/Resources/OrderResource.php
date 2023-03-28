<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user_id' => $this->user_id,
            'user' => $this->user ? new UserResource($this->user) : null,
            'product_id' => $this->product_id,
            'product' => $this->product_id ? new ProductResource($this->product) : null,
            'voucher' => $this->voucher ? new VoucherResource($this->voucher) : null,
            'cart' => $this->cart ? new VoucherResource($this->cart) : null,
            'quantity' => $this->quantity,
            'size' => $this->size,
            'status' => $this->status,
            'actual_price' => $this->actual_price,
            'total_price' => $this->total_price,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ];
    }
}
