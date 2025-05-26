<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "status" => $this->status,
            "image" => $this->image,
            "price" => $this->price,
            "description" => $this->description,
            $this->mergeWhen( $request->routeIs("client.items.show"),[
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
            ])
        ];
    }
}
