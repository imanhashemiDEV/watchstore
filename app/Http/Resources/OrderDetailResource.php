<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'id'=>$this->id,
            'product'=>$this->product->title,
            'count'=>$this->count,
            'price'=>$this->price,
            'discount'=>$this->discount,
            'discount_price'=>$this->discount_price,
            'status'=>$this->status
        ];
    }
}
