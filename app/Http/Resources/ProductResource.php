<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return [
        "product_id"=> $this->id,
        "name"=>$this->name,
        "price"=>$this->price,
        "quantity"=>$this->quantity,
        "desc"=>$this->desc,
        "product_image"=>asset("storage"."/".$this->image),

       ];
    }
}
