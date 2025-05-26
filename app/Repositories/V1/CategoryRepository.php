<?php

namespace App\Repositories\V1;

use App\Http\Resources\V1\CategoryResources;

class CategoryRepository
{
    public function getCollection($categories) {
        return CategoryResources::collection($categories);
    }
    
}
