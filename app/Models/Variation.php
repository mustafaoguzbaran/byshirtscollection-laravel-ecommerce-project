<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
