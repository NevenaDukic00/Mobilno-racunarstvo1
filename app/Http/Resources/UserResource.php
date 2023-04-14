<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->resource->id,
            'firstName' => $this->resource->firstName,
            'lastName' => $this->resource->lastName,
            'email' => $this->resource->email,
            'email_verified_at' => $this->resource->email_verified_at,
            'created_at' => $this->resource->created_at
        ];
    }
}
