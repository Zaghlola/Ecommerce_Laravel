<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $gaurded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function products(){
        return $this->belongsToMany(Product::class,'offer_product','offer_id','product_id')
        ->withPivot('price_after_discount','discount');
    }
    
}
