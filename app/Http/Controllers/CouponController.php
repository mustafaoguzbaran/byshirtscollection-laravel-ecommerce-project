<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $couponData = Coupon::all();
        return view("backoffice.all-coupon", compact("couponData"));
    }

    public function create()
    {
        return view("backoffice.add-coupon");
    }

    public function store(Request $request)
    {
        $couponData = [
            "code" => $request->create_product_code,
            "discount_amount" => $request->create_product_discount_amount,
            "is_active" => $request->is_active
        ];
        Coupon::create($couponData);
        return redirect()->route("product.coupon.create");
    }

    public function edit(Request $request)
    {
        $couponData = Coupon::where("id", $request->id)->first();
        return view("backoffice.edit-coupon", compact("couponData"));
    }

    public function update(Request $request)
    {
        $couponData = [
            "code" => $request->edit_product_coupon_code,
            "discount_amount" => $request->edit_product_coupon_discount_amount,
            "is_active" => $request->edit_product_coupon_is_active
        ];
        Coupon::where("id", $request->id)->update(array_filter($couponData));
        return redirect()->route("product.coupon.edit", ["id" => $request->id]);
    }

    public function destroy(Request $request)
    {
        Coupon::destroy($request->id);
        return redirect()->route("product.coupon.index");
    }
}
