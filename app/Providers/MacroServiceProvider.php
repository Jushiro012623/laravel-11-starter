<?php

namespace App\Providers;

use App\Http\Resources\V1\PaginationResource;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Response::macro("success", function ($message, $data = [], $status = 200) {

            $response = [
                "message" => $message,
                "status" => $status,
                "success" => true,
            ];
            if ($data instanceof ResourceCollection && $data->resource instanceof LengthAwarePaginator) {
                $paginator = $data->resource;
                $response["data"] = $data->items();
                $response["pagination"] = new PaginationResource($paginator);
            }
            
            if(!empty($data)){
                $response["data"] = $data;
            }

            return response()->json($response , $status);

        });
    
        Response::macro("error", function ($message, $errors = [] , $status = 400) {

            $response = [
                "message" => $message,
                "status" => $status,
                "success" => false,
            ];
            
            if(config("app.env") === "local" && !empty($errors)){
                $response["errors"] = $errors;
            }

            return response()->json($response, $status);

        });

        Response::macro("fail", function ($message, $errors = [] , $status = 400){
            
            $response = [
                "message" => $message,
                "status" => $status,
                "success" => false,
            ];
            
            if(!empty($errors)){
                $response["errors"] = $errors;
            }

            return response()->json($response, $status);
        });
    }
}
