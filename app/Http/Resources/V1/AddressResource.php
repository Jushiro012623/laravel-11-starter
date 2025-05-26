<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            "country" => $this->country,
            "region" => $this->region,
            "province" => $this->province,
            "city" => $this->city,
            "barangay" => $this->barangay,
            "detail" => $this->detail,

            $this->mergeWhen($request->routeIs("address.show"), function() {
                return [
                    "created_at" => $this->created_at,
                    "updated_ad" => $this->updated_ad,
                ];
            }),
        ];
    }
}
