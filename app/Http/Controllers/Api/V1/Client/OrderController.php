<?php

namespace App\Http\Controllers\Api\V1\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Client\OrderRequest;
use App\Http\Resources\V1\OrderReceiptResource;
use App\Models\Order;
use App\Repositories\V1\OrderRepository;
use App\Services\V1\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Psr\Http\Message\ResponseInterface;

class OrderController extends Controller
{

    public function placeOrder(OrderRequest $request, OrderService $orderService): JsonResponse
    {   
        if(!Auth::user()->hasActiveAddress()){
            return Response::fail("Validate Your Email First", status: 401);   
        }

        $validated = $request->validated();

        $payable = $orderService->computeAmountPayable($validated);

        $order = $orderService->placeOrder($validated, $payable);
        $order = new OrderReceiptResource($order);

        return Response::success("Order Placed Successfully", $order);
    }

    public function processOrder(string $order, OrderRepository $orderRepository): JsonResponse
    {   
        if(Auth::user()->role_id !== '4'){
            return Response::fail("Unauthorize Access", status: 401);             
        }

        $order = $orderRepository->getCustomerOrder($order);
        $orderRepository->processOrder($order);
        
        $order = new OrderReceiptResource($order);

        return Response::success("Order Processed Successfully", $order);
    }
    
}
