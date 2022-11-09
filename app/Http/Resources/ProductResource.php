<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'images' => $this->productImages()->where('product_id', $this->id)->pluck('image')->toArray(),
            'category' => new CategoryResource($this->category()->find($this->category_id)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'time' => date("d/m/Y", strtotime($this->created_at)),
        ];
    }
}
