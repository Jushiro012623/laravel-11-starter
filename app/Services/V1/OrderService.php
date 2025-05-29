<?php

namespace App\Services\V1;

use App\Models\Order;
use App\Repositories\V1\ItemRepository;
use App\Repositories\V1\OrderRepository;
use Carbon\Carbon;
use Illuminate\Support\Str;

class OrderService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private OrderRepository $orderRepository,
        private ItemRepository $itemRepository
    )
    {}
    
    
    public function placeOrder(array $validated, array $payable): Order {

        $order = $this->orderRepository->createOrder($validated, $payable);
    
        $this->orderRepository->syncOrderItems($order, $validated);
        return $order;
    }
    
    public function computeAmountPayable(array $validated): array {

        $items = $this->itemRepository->findItems($validated['item_id'])->toArray();

        $itemPrices = array_map(fn($item) => $item['price'], $items);

        $discount = $validated["discount"] / 100;

        $payable["amount"] = array_sum($itemPrices);
        $payable["sub_total"] = $payable["amount"] - ($payable["amount"] * $discount);
        $payable["grand_total"] = $payable["sub_total"];

        return $payable;

    }






    
}
