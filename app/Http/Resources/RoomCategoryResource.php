<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class RoomCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'media_url' => $this->media_url,
            'title' => $this->getTranslation('title', App::getLocale()),
            'description' => $this->getTranslation('description', App::getLocale()),
            'media_alt' => $this->getTranslation('media_alt', App::getLocale())
        ];
    }
}
