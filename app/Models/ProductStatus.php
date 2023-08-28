<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    use HasFactory;
}
