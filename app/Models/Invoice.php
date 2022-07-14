<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'address',
        'payment',
        'shipping',
        'service',
        'subtotal',
        'discount',
        'total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function boughts()
    {
        return $this->hasMany(Bought::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
