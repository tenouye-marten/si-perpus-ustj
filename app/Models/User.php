<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * FILLABLE
     */
    protected $fillable = [

        'name',

        'email',

        'password',
    ];

    /**
     * HIDDEN
     */
    protected $hidden = [

        'password',

        'remember_token',
    ];

    /**
    
    /**
     * CASTS
     */
    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',

            // auto hash password
            'password' => 'hashed',
        ];
    }
}