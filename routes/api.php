<?php


use App\Http\Controllers\Api\V1\Client\OrderController;
use Illuminate\Support\Facades\Route;

// Route::group([
//         "controller" => OrderController::class,
//         "middleware" => ["jwtAuth", "verified"]
//     ], function (){
//         Route::post("placeOrder", "placeOrder")->name("placeOrder");
//         Route::patch("processOrder/{order}", "processOrder")->name("processOrder");        
//     }
// );