<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password',
    ];

    // Verifica se o usuário é administrador
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Verifica se o usuário é comum
    public function isUser()
    {
        return $this->role === 'user';
    }
}
