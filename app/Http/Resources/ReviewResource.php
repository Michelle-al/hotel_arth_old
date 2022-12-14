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
            'created_at' => $this->created_at,
            'user' => UserResource::make($this->user) // Utilise UserResource pour associer les
            // champs de la table user.
        ];
    }
}
