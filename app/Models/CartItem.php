<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class); // Burada Product modeline uygun şekilde düzenlemelisiniz
    }

    public function variation()
    {
        return $this->belongsTo(Variation::class); // Burada Variation modeline uygun şekilde düzenlemelisiniz
    }
}
