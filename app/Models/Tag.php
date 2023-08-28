<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
