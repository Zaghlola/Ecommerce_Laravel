<?php

namespace App\Models;

//use Illuminate\Auth\Notifications\VerifyEmail;


use Laravel\Sanctum\HasApiTokens;

use App\Traits\SendEmailNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable ,SendEmailNotification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable= [
        'name' ,
        'email',
        'phone',
        'password',
        'email_verified_at'	,
        'phone_verified_at',
        'verification_code',
        'code_expired_at',
        'status',
       	'remember_token'	
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function addresses(){
        return $this->hasMany(Address::class);
    }
    public function favs(){
        return $this->belongsToMany(Product::class,'favs','user_id','product_id')->as('favs');
    }
    public function carts(){
        return $this->belongsToMany(Product::class,'carts','user_id','product_id ')
        ->as('carts')->withPivot('quantity');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class,'coupon_user','user_id','coupon_id');
    }
    
}
