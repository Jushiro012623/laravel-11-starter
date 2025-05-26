<?php

namespace App\Models;

use App\Http\Filters\V1\QueryFilters;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\ItemFactory> */
    use HasFactory;


    protected $fillable = [
        'image',
        'category_id',
        'name',
        'description',
        'price',
        'status',
    ];

    public function scopeFilters(Builder $builder, QueryFilters $filters){
        return $filters->apply($builder);
    }

    /**
     * Get all of the order for the Item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function order(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'order_items', 'item_id', 'order_id')
                ->withTimestamps();
    }
}
