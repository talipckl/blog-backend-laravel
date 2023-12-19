<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'category' => $this->category->name,
            'user' => [
                'id' => $this->user?->id,
                'name' => $this->user?->name,
            ],
            'title' => $this->title,
            'img' => $this->img,
            'description' => $this->description,
            'release_date' => $this->release_date,
        ];
    }
}
