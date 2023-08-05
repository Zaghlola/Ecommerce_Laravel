<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $gaurded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'coupon_user','coupon_id','user_id');
    }
}
