<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'coupon_user_usages')
            ->withTimestamps();
    }
}
