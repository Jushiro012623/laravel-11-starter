<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Permission extends Model
{
    /** @use HasFactory<\Database\Factories\PermissionFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'label'
    ];

    /**
     * Get all of the role for the Permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function role(): HasManyThrough
    {
        return $this->hasManyThrough(Role::class, RolePermission::class);
    }
}
