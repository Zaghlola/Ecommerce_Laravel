<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;
    protected $fillbale = [
        'name',
       
    ];
    public function products(){
        return $this->belongsToMany(Product::class,'product_spec','spec_id','product_id')
        ->withPivot('value');
    }
}
