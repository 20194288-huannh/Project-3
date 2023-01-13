<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
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
            'isbn_13' => $this->isbn_13,
            'isbn_10' => $this->isbn_10,
            'publisher' => $this->publisher,
            'publisher_date' => $this->publisher_date,
            'binding' => $this->binding,
            'height' => $this->height,
            'language' => $this->language,
            'no_of_pages' => $this->no_of_pages,
            'returnable' => $this->returnable,
            'spine_width' => $this->spine_width,
            'weight' => $this->weight,
            'width' => $this->width
        ];
    }
}
