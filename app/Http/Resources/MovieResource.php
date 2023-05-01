<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            'id' =>$this->resource->id,
            'title'=>$this->resource->title,
            'description'=>$this->resource->description,
            'price'=>$this->resource->price,
            'date'=>$this->resource->date,
            'duration'=>$this->resource->duration,
            'image'=>$this->resource->image,
            'rating'=>$this->resource->rating,
            'amount'=>$this->resource->amount,
            'genre'=>new GenreResource($this->resource->genre)
          
        ];
    }
}
