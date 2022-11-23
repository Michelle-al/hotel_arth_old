<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'body' => $this->body,
            'is_displayed' => $this->is_displayed,
            'rating' => $this->rating,
            'title' => $this->title,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'customer' => CustomerResource::make($this->customer) // Utilise CustomerResource pour associer les
            // champs de la table customer.
        ];
    }
}
