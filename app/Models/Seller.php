<?php

namespace App\Models;
use Laravel\Sanctum\HasApiTokens;

use App\Traits\SendEmailNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable ,SendEmailNotification;
    protected $fillable = [
       'name',
       'shop_name',
       'password',
       'phone',
       'email',
       'status',
       'verification_code',
       'email_verified_at',
       'phone_verified_at',
       'remember_token'
    ];
    public function products()
    {
       return $this->hasMany(Product::class);
    }
}
