<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, "cart_id");
    }
    public function setTotalAmountAttribute($value)
    {
        $this->attributes['total_amount'] = $value;
    }

}
