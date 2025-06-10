<?php

namespace App\Http\Controllers\Api\V1\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Client\OrderRequest;
use App\Http\Requests\Api\V1\Client\PlaceOrderRequest;
use App\Http\Requests\Api\V1\Client\UpdateOrderRequest;
use App\Http\Resources\V1\OrderReceiptResource;
use App\Http\Resources\V1\OrderResource;
use App\Models\Order;
use App\Repositories\V1\OrderRepository;
use App\Services\V1\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    public function __construct(
        private Logger $logger,
        private OrderService $orderService,
        private OrderRepository $orderRepository
    ) {}


    /**
     * Show all the authenticated user orders.
     *
     * @param Order $order
     * @return JsonResponse
     */
    public function index(Order $order)
    {   
        $order = $order->where('user_id', request()->user()->id)
            ->with(["user", "user.address", "user.profile", "deliveredBy", "items"])
            ->paginate(10);

        $order = OrderReceiptResource::collection($order);

        return Response::success("Orders Fetched Successfully",$order);
    }

    /**
     * Show the authenticated user specific order.
     *
     * @param Order $order
     * @return JsonResponse
     */
    public function show(Order $order)
    {
        Gate::authorize('show', $order);
        
        $order = new OrderReceiptResource($order);

        return Response::success("Orders", $order);
    }

    /**
     * Place a new order for the authenticated user.
     *
     * @param OrderRequest $request
     * @return JsonResponse
     */
    public function create(PlaceOrderRequest $request): JsonResponse
    {
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

    public function update(UpdateOrderRequest $request, Order $order): JsonResponse
    {
        $validated = $request->validated();

        $this->orderRepository->updateOrder($order, $validated);
        $order = new OrderReceiptResource($order);

        $this->logger->info("Order processed successfully", [
            'order_id' => $order->id,
            'user_id' => $order->user_id,
        ]);

        return Response::success("Order Update Successfully", $order);
    }
}
