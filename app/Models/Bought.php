<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bought extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'restaurant_id',
        'menu_id',
        'note',
        'quantity',
        'subprice',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function menu()  
    {
        return $this->belongsTo(Menu::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
