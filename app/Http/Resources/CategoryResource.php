<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    #[ArrayShape(['slug' => "string", 'category' => "string"])]
    public function toArray($request)
    {
        return [
            'slug' => $this->slug,
            'category' => $this->category,
        ];
    }
}
