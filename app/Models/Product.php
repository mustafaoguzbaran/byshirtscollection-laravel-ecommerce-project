<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class, "product_image");
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function variations()
    {
        return $this->belongsToMany(Variation::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
