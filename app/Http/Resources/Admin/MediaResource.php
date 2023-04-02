<?php

namespace App\Http\Resources\Admin;

use App\Traits\PaginatedJsonResourceTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'url' => $this->absolute_url,
            'name' => $this->name,
            'alt' => $this->alt,
            'title' => $this->title,
        ];
    }
}
