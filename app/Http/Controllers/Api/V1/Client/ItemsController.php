<?php

namespace App\Http\Controllers\Api\V1\Client;

use App\Http\Controllers\Controller;
use App\Http\Filters\V1\ItemsFilter;
use App\Models\Item;
use App\Repositories\V1\ItemRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ItemsController extends Controller
{
    private const PAGINATION = 5;

    public function __construct(
        private ItemRepository $itemRepository, 
        private ItemsFilter $filters,
    )
    {}


    public function __invoke(Item $items, Request $request) {
        $items = $items->filters($this->filters)->paginate(self::PAGINATION);
        $items = $this->itemRepository->getCollection($items);
        return Response::success("Items Fetched Successfully", $items);
    }
    
}
