<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(1)->first();
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->total_amount = 0.00;
        $cart->merchant_oid = time() . mt_rand();
        $cart->save();
    }
}
