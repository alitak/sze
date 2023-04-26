<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'email_verified_at' => 'datetime',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

//    public function getIsAdminCompanyAdminAttribute()
//    {
//        return in_array($this->role, ['admin', 'company_admin']);
//    }

    public function isAdminCompanyAdmin(): Attribute
    {
        return Attribute::make(
            get: fn () => in_array($this->role, ['admin', 'company_admin'])
        );
    }

    public function isUser(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->role === 'user'
        );
    }

    public function isCompanyAdmin(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->role === 'company_admin'
        );
    }
}
