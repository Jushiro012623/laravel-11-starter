<?php

use App\Http\Controllers\Api\V1\Client\CategoriesController;
use App\Http\Controllers\Api\V1\Client\ItemsController;
use App\Http\Controllers\Api\V1\Client\OrderController;
use Illuminate\Support\Facades\Route;


Route::get("categories", CategoriesController::class)->name("client.categories");
Route::get("items", ItemsController::class)->name("client.items");

Route::apiResource('orders', OrderController::class)
    ->middleware(['jwtAuth', 'verifiedUser'])
    ->names("clientOrders");
