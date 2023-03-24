<?php

namespace App\Http\Resources;

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
            'id'=>$this->id,
            'title'=>$this->title,
            'title_en'=>$this->title_en,
            'slug'=>$this->slug,
            'price'=>$this->price,
            'review'=>$this->review,
            'count'=>$this->count,
            'sold'=>$this->sold,
            'image'=>url('admin/products/big/'.$this->image),
            'guaranty'=>$this->guaranty,
            'discount'=>$this->discount,
            'description'=>$this->description,
            'is_special'=>$this->is_special,
            'special_expiration'=>$this->special_expiration,
            'status'=>$this->status,
            'category_id'=>$this->category_id,
            'category'=>$this->category->title,
            'brand_id'=>$this->brand_id,
            'brand'=>$this->brand->title,
        ];
    }
}
