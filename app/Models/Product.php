<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory,HasTranslations;
    protected $gaurded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public $translatable =[
        'name',
        'description'
    ];
    function sale_price_with_Currency(){
        return $this->sale_price . __('user.shared.currency');
    }
    function purchase_price_with_currency(){
        return $this->purchase_price . __('user.shared.currency');
    }
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
    public function offers(){
        return $this->belongsToMany(Offer::class,'offer_product','product_id','offer_id')
        ->withPivot('price_after_discount','discount');
    }
    public function specs()
    {
      return $this->belongsToMany(Spec::class,'product_spec','product_id','offer_id')
      ->withPivot('value');
    }
}
