<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $gaurded = [
        'id',
        'created_at',
        'updated_at',
    ];
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
