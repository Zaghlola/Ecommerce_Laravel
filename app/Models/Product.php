<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $gaurded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function category()
    {
       return $this->belongsTo(Category::class);
    }
    public function seller()
    {
       return $this->belongsTo(Seller::class);
    }
    public function favs(){
        return $this->belongsToMany(User::class,'favs','product_id ','user_id')->as('favs');
    }
    public function carts(){
        return $this->belongsToMany(User::class,'carts','product_id ','user_id')
        ->as('carts')->withPivot('quantity');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
