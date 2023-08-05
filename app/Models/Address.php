<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $gaurded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
