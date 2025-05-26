<?php

namespace App\Http\Filters\V1;

class ItemsFilter extends QueryFilters
{
    protected $sortable = [
        'name',
        'status',
        'createdAt' => 'created_at',
    ];

    public function search($value) {
        return $this->builder->where(function ($query) use ($value) {
            $query->where('name', 'like', "%$value%")
                ->orWhere('status', 'like', "%$value%");
        });
    }

    public function category($value){
        return $this->builder->where("category_id", $value);
    }
    
}
