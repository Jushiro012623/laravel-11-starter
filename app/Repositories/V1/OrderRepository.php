<?php

namespace App\Repositories\V1;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class OrderRepository
{
    private const PENDING = 1;
    private const ON_BOARD = 2;


    private function authUser() {
        return Auth::user();
    }
    

    public function createOrder($validatedData, $amount): Order
    {
        $referenceNumber = Str::upper("REF".Carbon::now("asia/manila")->format("YmdHis").Str::random(6));
        $order = Order::create(array_merge( $validatedData, $amount, [
                "reference_no" => $referenceNumber,
                "user_id" => $this->authUser()->id,
                "employee_id" => null,
                "status" => self::PENDING,
                "address_id" =>  $this->authUser()->activeAddress()->id
            ])
        );
        return $order;
    }

    public function syncOrderItems(Order $order, array $validated): void 
    {
        $order->items()->sync($validated["item_id"]);
    }

    public function processOrder(Order $order): void
    {
        $order->update([
            "employee_id" => Auth::id(),
            "status" => 2
        ]);
    }
    
    public function getCustomerOrder($order) {
        return Order::where('id', $order)->firstOrFail();
    }
    
}
