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
            $this->mergeWhen($request->routeIs('register'), function () {
                return [
                    "first_name" => $this->profile->first_name,
                    "last_name" => $this->profile->last_name,
                    "middle_name" => $this->profile->middle_name,
                    "suffix" => $this->profile->suffix,
                    "avatar" => $this->profile->avatar,
                    "mobile" => $this->profile->mobile,
                    $this->merge(new AddressResource($this->activeAddress()))
                ];
            }),
            $this->mergeWhen($request->routeIs('user.show'), function() {
                return [
                    "created_at" => $this->created_at,
                    "updated_at" => $this->updated_at,
                ];
            })
        ];
    }
}
