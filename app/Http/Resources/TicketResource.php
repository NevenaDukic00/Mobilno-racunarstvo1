<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'id'=>$this->resource->id,
           'price'=>$this->resource->price,
           'user'=>new UserResource($this->resource->user),
           'movie'=>new MovieResource($this->resource->movie),
           'seat_number'=>$this->resource->seat_number
            ];
    }
}
