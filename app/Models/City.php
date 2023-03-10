<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillbale = [
        'name',
        'status'
    ];
    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
