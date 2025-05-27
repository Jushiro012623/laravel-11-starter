<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResources extends JsonResource
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
            "email" => $this->email,
            "username" => $this->username,
            "verified" => $this->hasVerifiedEmail(),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
