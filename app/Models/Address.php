<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        "country",
        "user_id",
        "city",
        "province",
        "region",
        "barangay",
        "detail",
        "status"
    ];
    
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;
}
