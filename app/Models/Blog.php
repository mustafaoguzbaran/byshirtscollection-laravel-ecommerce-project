<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
