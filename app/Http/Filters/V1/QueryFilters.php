<?php

namespace App\Http\Filters\V1;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilters
{
    
    protected $builder;
    protected $request;
    protected $sortable = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
         * Applies all filter methods to the query builder based on request parameters.
         *
         * @param Builder $builder The Eloquent query builder instance.
         * @return Builder The filtered query builder.
    */
    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach($this->request->all() as $key => $value){
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
        }

        return $builder;
    }

    /**
         * Applies sorting to the query builder based on the 'sort' parameter.
         *
         * Supports comma-separated attributes, with optional '-' prefix for descending order.
         * Only attributes listed in $sortable are allowed.
         *
         * @param string $value The sort parameter value from the request.
         * @return void
    */
    protected function sort($value): void
    {
        $sortAttributes = explode("," , $value);

        foreach($sortAttributes as $sortAttribute){
            $direction = "asc";

            if(strpos($sortAttribute, "-") === 0){
                $direction = "desc";
                $sortAttribute = substr($sortAttribute, 1);
            }

            if(! in_array($sortAttribute, $this->sortable) && ! array_key_exists($sortAttribute, $this->sortable)){
                continue;
            }

            $columnName = $this->sortable[$sortAttribute] ?? null;

            if($columnName === null){
                $columnName = $sortAttribute;
            }

            $this->builder->orderBy($columnName, $direction);
        }
    }
    
}
