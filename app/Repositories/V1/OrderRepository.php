<?php

namespace App\Repositories\V1;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class OrderRepository
 * 
 * Handles business logic and database interactions related to Orders.
 */
class OrderRepository
{
    private const PENDING = 1;
    private const PREPARING = 2;
    private const ON_BOARD = 3;
    private const DELIVERED = 4;
    private const CANCEL = 5;


    /**
     * Create a new order.
     *
     * @param array $validatedData  Validated data for the order.
     * @param array $amount         Amount-related data (e.g. total amount, tax, etc.).
     * @return Order
     */
    public function createOrder($validatedData, $amount): Order
    {
        $user = request()->user();
        $referenceNo = Str::upper('REF' . Carbon::now('Asia/Manila')->format('YmdHis') . Str::random(6));
        
        $orderData = array_merge($validatedData, $amount, [
            'reference_no' => $referenceNo,
            'user_id'      => $user->id,
            'employee_id'  => null,
            'status'       => self::PENDING,
            'address_id'   => $user->activeAddress()->id,
        ]);

        $order = Order::create($orderData);

        return $order;
    }
    
    /**
     * Sync order items to an order.
     *
     * @param Order $order
     * @param array $validated Must contain 'item_id' => array of item IDs.
     * @return void
     */
    public function syncOrderItems(Order $order, array $validated): void
    {
        $order->items()->sync($validated["item_id"]);
    }

    /**
     * Mark the order as being prepared.
     *
     * @param Order $order
     * @return void
     */
    public function updateOrder(Order $order, $validated): void
    {
        $status = $validated['status'];

        $order->status = $status;

        if($status == 3){
            $order->rider_id = request()->user()->id;
        }
        
        $order->save;
    }

    
}
