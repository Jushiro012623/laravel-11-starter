<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        "user_id",
        "rider_id",
        "address_id",
        "status",
        "amount",
        "notes",
        "promo",
        "discount",
        "grand_total",
        "sub_total",
        "reference_no"
    ];

    /**
     * Get all of the items for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'order_items', 'order_id', 'item_id')
            ->withTimestamps();
    }

    
    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deliveredBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rider_id');
    }

    

    
    
}
