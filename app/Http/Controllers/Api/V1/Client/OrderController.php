<?php

namespace App\Http\Controllers\Api\V1\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Client\OrderRequest;
use App\Http\Resources\V1\OrderReceiptResource;
use App\Models\Order;
use App\Repositories\V1\OrderRepository;
use App\Services\V1\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class OrderController extends Controller
{
    public function __construct(
        private Logger $logger,
        private OrderService $orderService,
        private OrderRepository $orderRepository,
    )                                   
    {}

    public function placeOrder(OrderRequest $request, Order $order): JsonResponse
    {   
        Gate::authorize('create', $order);

        $validated = $request->validated();

        $payable = $this->orderService->computeAmountPayable($validated);

        $order = $this->orderService->placeOrder($validated, $payable);
        $order = new OrderReceiptResource($order);

        $this->logger->info("Order placed successfully", [
            'user_id' => $request->user()->id,
            'order_id' => $order->id,
        ]);

        return Response::success("Order Placed Successfully", $order);
    }

    public function processOrder(Order $order): JsonResponse
    {          
        Gate::authorize('assign', $order);

        $this->orderRepository->processOrder($order);        
        $order = new OrderReceiptResource($order);

        $this->logger->info("Order process successfully", [
            'employee_id' => JWTAuth::user()->id,
            'order_id' => $order->id,
            'user_id' => $order->user_id,
        ]);

        return Response::success("Order Processed Successfully", $order);
    }


    
}
