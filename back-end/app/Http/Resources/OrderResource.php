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
            'user' => $this->user ? new UserResource($this->user) : null,
            'voucher' => $this->voucher ? new VoucherResource($this->voucher) : null,
            'total_price' => $this->total_price,
            'voucher_shipping' => $this->voucher_shipping ? new VoucherResource($this->voucher_shipping) : null,
            'status' => $this->status,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at
        ];
    }
}
