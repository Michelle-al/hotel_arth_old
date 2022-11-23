<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'url' => $this->media_url,
            'title' => $this->getTranslations('title', [App::getLocale()]),
            'description' => $this->getTranslations('description', [App::getLocale()])
        ];
    }


}
