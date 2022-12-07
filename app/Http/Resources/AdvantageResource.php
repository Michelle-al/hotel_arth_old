<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class AdvantageResource extends JsonResource
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
            'icon_url' => $this->icon_url,
            'title' => $this->getTranslation('title', App::getLocale()),
            'description' => $this->getTranslation('description', App::getLocale()),
            'icon_alt' => $this->getTranslation('icon_alt', App::getLocale())
        ];
    }
}
