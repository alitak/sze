<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password'          => 'hashed',
        'email_verified_at' => 'datetime',
        'is_admin'          => 'boolean',
    ];

    public function nameWithEmail(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->name . ' (' . $this->email . ')'
        );
    }

//    public function password(): Attribute
//    {
//        return Attribute::make(
//            set: fn ($password) => bcrypt($password));
//    }
}
