<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductStatus;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        if (\Illuminate\Support\Facades\Route::is("order.index")) {
            $user = Auth::user();
            $orders = $user->orders()->with('orderItems.product')->get();
            return view('front.orders', compact('orders'));
        } elseif (\Illuminate\Support\Facades\Route::is("orders.index")) {
            $ordersData = Order::with("orderItems.product")->get();
            return view('backoffice.all-orders', compact("ordersData"));
        }
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $cart = $user->carts()->with('cartItems.product')->first();
        if ($cart) {
            $order = new Order([
                'user_id' => $user->id,
                'total_amount' => $cart->totalAmount,
            ]);

            if ($order->save()) {
                foreach ($cart->cartItems as $cartItem) {
                    $order->orderItems()->create([
                        'product_id' => $cartItem->product_id,
                        'quantity' => $cartItem->quantity,
                    ]);
                }
                $cart->update(['status' => 'completed']);

                return redirect()->route('home')->with('success', 'Sipariş başarıyla oluşturuldu.');
            } else {
                return redirect()->route('home')->with('error', 'Sipariş oluşturulurken bir hata oluştu.');
            }
        } else {
            return redirect()->route('home')->with('error', 'Sepetinizde ürün bulunmuyor.');
        }
    }

    public function edit(Request $request)
    {
        $orderData = Order::where("id", $request->id)->first();
        $statusData = ProductStatus::all();
        return view("backoffice.edit-orders", compact("orderData", "statusData"));
    }

    public function update(Request $request)
    {
        $orderData = [
            "status_id" => $request->edit_orders_status,
            "cargo_company" => $request->edit_orders_cargo_company,
            "cargo_tracking_number" => $request->edit_orders_cargo_tracking_number
        ];
        Order::where("id", $request->id)->update($orderData);
        return redirect()->route("orders.edit", ["id" => $request->id]);
    }
}
