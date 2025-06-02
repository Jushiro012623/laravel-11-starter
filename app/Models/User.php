<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Nette\Utils\Arrays;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'role_id',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'data' => [
                'role' => $this->role->name,
                'username' => $this->username,
                'email' => $this->email,
                'verified' => $this->hasVerifiedEmail(),
                'permissions' => $this->role->permissions->pluck('name')->toArray(),
            ]
        ];
    }

    /**
     * Get the active address of the User
     *
     * @return \App\Models\Address
     */
    public function activeAddress() {
        return $this->address()->where("status", 1)->first();
    }
    
    /**
     * Checks if the user has registered and address
     *
     * @return \App\Models\Address
     */
    public function hasActiveAddress() {
        return $this->address()->where("status", 1)->exists() ;
    }
    
    /**
     * Checks if the user has the provided role
     *
     * @return bool
     */
    public function hasRole( array|string $roles): bool {

        if(is_array($roles)){
            return in_array($this->role->name, $roles);
        }

        return in_array($this->role->name, explode('|', strtolower($roles)));
    }
    
    /**
     * Get the role that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the profile associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(UserInfo::class);
    }

    public function address(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Get all of the order for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order(): HasMany
    {
        return $this->hasMany(Order::class, "user_id");
    }

    /**
     * Get all of the order for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function served(): HasMany
    {
        return $this->hasMany(Order::class, "employee_id");
    }


    


}
