<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Interfaces\RoleContract;
use App\Traits\HasRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements RoleContract
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRole, HasApiTokens;

    protected $table = 'users';
   

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
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
     * 
     * 
     * constant
     */

    const  ADMIN_CASE = 'admin';
    const  USER_CASE = 'user';

    /**
     * Accessores functions 
     * 
     * 
     */

    public function isAdmin(): bool{
        return $this->type === static::ADMIN_CASE;
    }

    public function isUser(): bool{
        return $this->type === static::USER_CASE;
    }

    


    /**
     * 
     * ORM
     */

    public function roles() : BelongsToMany {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    
}
