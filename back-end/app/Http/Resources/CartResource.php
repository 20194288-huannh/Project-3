<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'user' => $this->user ? new UserResource($this->user) : null,
            'total_price' => $this->total_price,
            'payment' => $this->payment ?? null,
            'orders' => $this->orders ? OrderResource::collection($this->orders) : null,
            'payment_method' => $this->payment->paymentMethod->name ?? null
        ];
    }
}
