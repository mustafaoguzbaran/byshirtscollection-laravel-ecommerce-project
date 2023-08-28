<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $cart = $user->carts()->with('cartItems.product')->first();
        return view("front.cart", compact("cart"));
    }

    public function store(Request $request)
    {
        $userCart = Auth::user()->carts()->firstOrCreate([]);

        $cartItem = $userCart->cartItems()->create([
            "product_id" => $request->product_id,
            "variation_id" => $request->product_variation,
            "quantity" => $request->product_quantity
        ]);
        $productTotalPrice = $cartItem->quantity * $cartItem->product->price;
        $userCart->total_amount += $productTotalPrice;
        $userCart->merchant_oid = time() . mt_rand();
        $userCart->save();

        return redirect(route("home"));

    }

    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        $coupon = Coupon::where('code', $couponCode)->first();

        if (!$coupon) {
            return redirect()->route('cart.index')->with('error', 'Geçersiz kupon kodu.');
        }

        $user = Auth::user();
        $cart = $user->carts()->with('cartItems.product')->first();
        $usage = $coupon->users()->where('user_id', $user->id)->exists();
        if ($usage) {
            return redirect()->route('cart.index')->with('error', 'Bu kupon kodunu zaten kullandınız.');
        }
        $coupon->users()->attach($user);
        $fixedDiscount = $coupon->discount_amount;
        $cart->total_amount = $cart->total_amount - $fixedDiscount;
        $cart->save();

        return redirect()->route('cart.index')->with([
            'success' => 'Kupon kodu başarıyla kullanıldı.',
            'discountAmount' => $fixedDiscount,
            'total_amount' => $cart->total_amount
        ]);
    }
    public function destroy(Request $request)
    {
        $cartItem = CartItem::findOrFail($request->id);
        $productPrice = $cartItem->product->price;
        $productQuantity = $cartItem->quantity;
        $userCart = Auth::user()->carts->last();
        $newTotalAmount = max(0, $userCart->total_amount - ($productPrice * $productQuantity));
        $userCart->total_amount = $newTotalAmount;
        $userCart->save();
        $cartItem->delete();

        return redirect()->route("cart.index");
    }
}
