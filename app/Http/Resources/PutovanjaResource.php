<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PutovanjaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->resource->id,
            'title'=>$this->resource->title,
            'body'=>$this->resource->body,
            'category'=>$this->resource->category,
            'user' => new UserResource($this->resource->author)
        ];
    }
}
