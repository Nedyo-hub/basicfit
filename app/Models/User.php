<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'username',
        'birthday',
        'profile_picture',
        'about_me',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getRouteKeyName()
    {
        return 'username';
    }

    // Casts voor velden
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthday' => 'date',
    ];
    public function isAdmin()
{
    return $this->is_admin;
}

    
}
