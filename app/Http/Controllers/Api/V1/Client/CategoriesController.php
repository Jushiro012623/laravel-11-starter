<?php

namespace App\Http\Controllers\Api\V1\Client;

use App\Http\Controllers\Controller;
use App\Http\Filters\V1\CategoryFilter;
use App\Http\Resources\V1\CategoryResources;
use App\Models\Category;
use App\Repositories\V1\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoriesController extends Controller
{

    public function __invoke(Category $categories, CategoryRepository $categoryRepository) {
        $categories = $categories->get();
        $categories = $categoryRepository->getCollection($categories);
        return Response::success("Categories Fetched Successfully", $categories);
    }
    
}
