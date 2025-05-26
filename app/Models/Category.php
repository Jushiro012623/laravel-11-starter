<?php

namespace App\Models;

use App\Http\Filters\V1\QueryFilters;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    public function scopeFilters(Builder $builder, QueryFilters $filters){
        return $filters->apply($builder);
    }
}
