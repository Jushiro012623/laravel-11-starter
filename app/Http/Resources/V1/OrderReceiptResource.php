<?php

namespace App\Http\Resources\V1;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderReceiptResource extends JsonResource
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
            "user_id" => $this->user_id,
            "reference_no" => $this->reference_no,
            "delivery_address" => new AddressResource($this->user->address->firstWhere("status", 1)),
            "order_item" => new Collection($this->items->select("name", "price")),
            "amount" => $this->amount,
            "sub_total" => $this->sub_total,
            "grand_total" => $this->grand_total,
            "employee_assigned" => new UserResources($this->pocessedBy),
            "created_at" => $this->created_at->format("Y:m:d H:i:s"),
            'discount' => $this->discount,
            "name" => $this->user->profile->first_name . " " . $this->user->profile->last_name,
            "email" => $this->user->email,
            "status" => $this->status,
        ];
    }
}
