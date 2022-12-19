<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
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
            'code' => $this->code,
            'type' => $this->type,
            'minimum_amount' => $this->minimum_amount,
            'value' => $this->value,
            'description' => $this->description,
            'expiry_date' => $this->expiry_date,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at
        ];
    }
}
