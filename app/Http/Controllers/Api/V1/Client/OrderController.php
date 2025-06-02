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

    /**
     * Place a new order for the authenticated user.
     *
     * @param OrderRequest $request
     * @return JsonResponse
     */
    public function placeOrder(OrderRequest $request): JsonResponse
    {   
        Gate::authorize('create', Order::class);

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

    /**
     * Mark an order as prepared by an employee.
     *
     * @param Order $order
     * @return JsonResponse
     */
    public function prepareOrder(Order $order): JsonResponse
    {   
        Gate::authorize('assign', $order);
        
        $this->orderRepository->prepareOrder($order);        
        $order = new OrderReceiptResource($order);

        $this->logger->info("Order processed successfully", [
            'employee_id' => JWTAuth::user()->id,
            'order_id' => $order->id,
            'user_id' => $order->user_id,
        ]);
        
        return Response::success("Order Processed Successfully", $order);
    }

    /**
     * Mark an order as shipped by an employee.
     *
     * @param Order $order
     * @return JsonResponse
     */
    public function shipOrder(Order $order): JsonResponse
    {
        Gate::authorize('assign', $order);

        $this->orderRepository->shipOrder($order);        
        $order = new OrderReceiptResource($order);

        $this->logger->info("Order shipped successfully", [
            'employee_id' => JWTAuth::user()->id,
            'order_id' => $order->id,
            'user_id' => $order->user_id,
        ]);

        return Response::success("Order Shipped Successfully", $order);
    }
    


    
}
