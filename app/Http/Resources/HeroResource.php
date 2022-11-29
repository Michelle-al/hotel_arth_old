<?php

namespace App\Http\Resources;

use App\Models\Hero;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

/**
 * @mixin Hero
 */
class HeroResource extends JsonResource
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
            'subtitle' => $this->getTranslation('subtitle', App::getLocale()),
            'slug' => $this->slug
        ];
    }


}
