<?php

namespace App\Http\Filters\V1;

class CategoryFilter extends QueryFilters
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
    
}
