<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {
        if (Route::is("home")) {
            $productData = Product::where("is_featured", 1)->orderBy("created_at", "desc")->get();
            return view("front.home", compact("productData"));
        } elseif (Route::is("backoffice.home")) {
            $getUsersData = User::select(DB::raw('MONTH(created_at) as users_month'), DB::raw("COUNT(*) as total_user"))
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->get();
            return view("backoffice.home", compact("getUsersData"));
        }
    }

    public function privacyandsecurity()
    {
        return view("front.privacyandsecurity");
    }

    public function salescontract()
    {
        return view("front.salescontract");
    }

    public function membershipagreement()
    {
        return view("front.membershipagreement");
    }

    public function deliveryandreturnconditions()
    {
        return view("front.deliveryandreturnconditions");
    }

    public function aboutus()
    {
        return view("front.aboutus");
    }

    public function contact()
    {
        return view("front.contact");
    }

    public function paymentSuccessful()
    {
        return view("front.paymentsuccessful");
    }

    public function paymentFailed()
    {
        return view("front.paymentfailed");
    }
    public function sitemap()
    {
        $products = Product::all();
        $now = Carbon::now()->toAtomString();
        return response()->view('front.sitemap', compact('products', 'now'))->header('Content-Type', 'application/xml');
    }
}
