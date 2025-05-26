<?php

namespace App\Repositories\V1;

use App\Http\Resources\V1\ItemsResources;
use App\Models\Item;

class ItemRepository
{
    public function getCollection($items) {
        return ItemsResources::collection($items);
    }

    public function findItems($itemId) {
        return Item::find($itemId);
    }
    
}
