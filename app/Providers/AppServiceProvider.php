<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       $settingsData = Setting::where("id", 1)->first();
        View::share('settingsData', $settingsData);
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $userCart = Auth::user()->carts->last();
                $totalQuantity = $userCart ? $userCart->cartItems->sum('quantity') : 0;
                $user = Auth::user();
                $totalAmount = $user->carts()->with('cartItems.product')->first()->total_amount;;

                $view->with('totalQuantity', $totalQuantity);
                $view->with('totalAmount', $totalAmount);
            }
        });
    }

}
