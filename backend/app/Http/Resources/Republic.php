<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Republic extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'value' => $this->value,
            'city'=>$this->city,
            'state'=>$this->state,
            'neighborhood'=>$this->neighborhood,
            'address'=>$this->address,
            'bathrooms'=>$this->bathrooms,
            'allowedTo'=>$this->allowedTo,
            'rating'=>$this->rating,
            'comments' => $this->comments,
        ];
    }
}
