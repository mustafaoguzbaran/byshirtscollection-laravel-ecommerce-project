<?php

use App\Http\Controllers\CouponController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, "index"])->name("home");

Route::get("/product/{slug}", [\App\Http\Controllers\ProductController::class, "show"])->name("product.show");

Route::get("/category/{slug}", [\App\Http\Controllers\CategoryController::class, "show"])->name("product.category");

Route::get("/cart", [\App\Http\Controllers\CartController::class, "index"])->name("cart.index");

Route::post('/cart', [\App\Http\Controllers\CartController::class, "store"])->name("cart.store");

Route::delete('/cart/{id}', [\App\Http\Controllers\CartController::class, "destroy"])->name("cart.destroy");

Route::post('/product/coupon/apply', [\App\Http\Controllers\CartController::class, 'applyCoupon'])->name('coupon.apply');

Route::post("/order/create", [\App\Http\Controllers\OrderController::class, "create"])->name("order.create");

Route::get("/order", [\App\Http\Controllers\OrderController::class, "index"])->name("order.index");

Route::get("/payment", [\App\Http\Controllers\PaymentController::class, "index"])->name("payment.index");

Route::get("/payment/success", [\App\Http\Controllers\HomeController::class, "paymentSuccessful"])->name("payment.success");

Route::get("/payment/failed", [\App\Http\Controllers\HomeController::class, "paymentFailed"])->name("payment.failed");

Route::post("/payment/paytrcallback", [\App\Http\Controllers\PaymentController::class, "paytrCallback"])->name("payment.paytrcallback");

Route::get('/sitemap.xml', [\App\Http\Controllers\HomeController::class, 'sitemap']);

Route::prefix("kurumsal")->group(function () {

    Route::get("/gizlilik-ve-guvenlik", [\App\Http\Controllers\HomeController::class, "privacyandsecurity"])->name("privacyandsecurity");

    Route::get('/satis-sozlesmesi', [\App\Http\Controllers\HomeController::class, "salescontract"])->name("salescontract");

    Route::get('uyelik-sozlesmesi', [\App\Http\Controllers\HomeController::class, "membershipagreement"])->name("membershipagreement");

    Route::get('teslimat-ve-iade-sartlari', [\App\Http\Controllers\HomeController::class, "deliveryandreturnconditions"])->name("deliveryandreturnconditions");

});
Route::prefix("blog")->group(function () {

    Route::get("/", [\App\Http\Controllers\BlogController::class, "index"])->name("blog.home");

    Route::get("/{slug}", [\App\Http\Controllers\BlogController::class, "show"])->name("blog.show");

});

Route::get("/hakkimizda", [\App\Http\Controllers\HomeController::class, "aboutus"])->name("aboutus");

Route::get("/iletisim", [\App\Http\Controllers\HomeController::class, "contact"])->name("contact");

Route::prefix("/user")->group(function () {

    Route::get("/register/create", [\App\Http\Controllers\UserController::class, "create"])->name("user.create");

    Route::post("/register", [\App\Http\Controllers\UserController::class, "store"])->name("user.store");

    Route::get("/login", [\App\Http\Controllers\UserController::class, "login"])->name("user.login");

    Route::post("/login", [\App\Http\Controllers\UserController::class, "loginCheck"])->name("user.loginCheck");

    Route::post("/logout", [\App\Http\Controllers\UserController::class, "logout"])->name("user.logout");

    Route::get("/account/edit", [\App\Http\Controllers\UserController::class, "edit"])->name("user.edit");

    Route::post("/account", [\App\Http\Controllers\UserController::class, "update"])->name("user.update");

});
Route::prefix("/backoffice")->group(function () {

    Route::get("/", [\App\Http\Controllers\HomeController::class, "index"])->name("backoffice.home");

    Route::get("/blog", [\App\Http\Controllers\BlogController::class, "index"])->middleware("permission:Get All Blog Data")->name("blog.index");

    Route::get("/blog/create", [\App\Http\Controllers\BlogController::class, "create"])->middleware("permission:Create Blog")->name("blog.create");

    Route::post("/blog", [\App\Http\Controllers\BlogController::class, "store"])->middleware("permission:Create Blog")->name("blog.store");

    Route::get("/blog/{id}/edit", [\App\Http\Controllers\BlogController::class, "edit"])->middleware("permission:Edit Blog")->name("blog.edit");

    Route::patch("/blog/{id}", [\App\Http\Controllers\BlogController::class, "update"])->middleware("permission:Edit Blog")->name("blog.update");

    Route::delete("/blog/{id}/delete", [\App\Http\Controllers\BlogController::class, "destroy"])->middleware("permission:Delete Blog")->name("blog.destroy");

    Route::get("/product/color", [\App\Http\Controllers\ColorController::class, "index"])->middleware("permission:Get All Product Color Data")->name("product.color.index");

    Route::get("/product/color/{id}/edit", [\App\Http\Controllers\ColorController::class, "edit"])->middleware("permission:Edit Product Color")->name("product.color.edit");

    Route::patch("/product/color/{id}", [\App\Http\Controllers\ColorController::class, "update"])->middleware("permission:Edit Product Color")->name("product.color.update");

    Route::delete("/product/color/{id}/delete", [\App\Http\Controllers\ColorController::class, "destroy"])->middleware("permission:Delete Product Color")->name("product.color.destroy");

    Route::get("/product/color/create", [\App\Http\Controllers\ColorController::class, "create"])->middleware("permission:Create Product Color")->name("product.color.create");

    Route::post("/product/color", [\App\Http\Controllers\ColorController::class, "store"])->middleware("permission:Create Product Color")->name("product.color.store");

    Route::get("/product/coupon/create", [\App\Http\Controllers\CouponController::class, "create"])->middleware("permission:Create Product Coupon")->name("product.coupon.create");

    Route::post("/product/coupon", [\App\Http\Controllers\CouponController::class, "store"])->middleware("permission:Create Product Coupon")->name("product.coupon.store");

    Route::get("/product/coupon", [CouponController::class, "index"])->name("product.coupon.index");

    Route::get("/product/coupon/{id}/edit", [CouponController::class, "edit"])->name("product.coupon.edit");

    Route::patch("/product/coupon/{id}", [CouponController::class, "update"])->name("product.coupon.update");

    Route::delete("/product/coupon/{id}", [CouponController::class, "destroy"])->name("product.coupon.destroy");

    Route::get("/product/category", [\App\Http\Controllers\CategoryController::class, "index"])->middleware("permission:Get All Product Category Data")->name("product.category.index");

    Route::get("/product/category/create", [\App\Http\Controllers\CategoryController::class, "create"])->middleware("permission:Create Category")->name("product.category.create");

    Route::post("/product/category", [\App\Http\Controllers\CategoryController::class, "store"])->middleware("permission:Create Category")->name("product.category.store");

    Route::get("/product/category/{id}/edit", [\App\Http\Controllers\CategoryController::class, "edit"])->middleware("permission:Edit Category")->name("product.category.edit");

    Route::patch("/product/category/{id}", [\App\Http\Controllers\CategoryController::class, "update"])->middleware("permission:Edit Category")->name("product.category.update");

    Route::delete("/product/category/{id}/delete", [\App\Http\Controllers\CategoryController::class, "destroy"])->middleware("permission:Delete Category")->name("product.category.delete");

    Route::get("/products", [\App\Http\Controllers\ProductController::class, "index"])->middleware("permission:Get All Product Data")->name("product.index");

    Route::get("/product/create", [\App\Http\Controllers\ProductController::class, "create"])->middleware("permission:Create Product")->name("product.create");

    Route::post("/product", [\App\Http\Controllers\ProductController::class, "store"])->middleware("permission:Create Product")->name("product.store");

    Route::get("/product/{id}/edit", [\App\Http\Controllers\ProductController::class, "edit"])->middleware("permission:Edit Product")->name("product.edit");

    Route::patch("/product/{id}", [\App\Http\Controllers\ProductController::class, "update"])->middleware("permission:Edit Product")->name("product.update");

    Route::delete("/product/{id}/delete", [\App\Models\Product::class, "destroy"])->middleware("permission:Delete Product")->name("product.destroy");

    Route::get("/product/variations", [\App\Http\Controllers\VariationController::class, "index"])->middleware("permission:Get All Product Variation Data")->name("product.variations.index");

    Route::post("/product/variations")->middleware("permission:Create Product Variation")->name("product.variations.create");

    Route::get("/product/price/collective/edit/", [\App\Http\Controllers\ProductController::class, "priceControlEdit"])->middleware("permission:Edit Product")->name("product.price.edit");

    Route::patch("/product/price/collective/", [\App\Http\Controllers\ProductController::class, "priceControlUpdate"])->middleware("permission:Edit Product")->name("product.price.update");

    Route::get("/users", [\App\Http\Controllers\UserController::class, "index"])->name("backoffice.user.index");

    Route::delete("/user/{id}", [\App\Http\Controllers\UserController::class, "destroy"])->name("backoffice.user.destroy");

    Route::get("/user/{id}/edit", [\App\Http\Controllers\UserController::class, "edit"])->name("backoffice.user.edit");

    Route::patch("/user/{id}", [\App\Http\Controllers\UserController::class, "update"])->name("backoffice.user.update");

    Route::get("/orders", [\App\Http\Controllers\OrderController::class, "index"])->name("orders.index");

    Route::get("/orders/{id}/edit", [\App\Http\Controllers\OrderController::class, "edit"])->name("orders.edit");

    Route::patch("/orders/{id}", [\App\Http\Controllers\OrderController::class, "update"])->name("orders.update");

    Route::get("/status", [\App\Http\Controllers\ProductStatusController::class, "index"])->name("status.index");

    Route::get("/status/create", [\App\Http\Controllers\ProductStatusController::class, "create"])->name("status.create");

    Route::post("/status", [\App\Http\Controllers\ProductStatusController::class, "store"])->name("status.store");

    Route::get("/status/{id}/edit", [\App\Http\Controllers\ProductStatusController::class, "edit"])->name("status.edit");

    Route::patch("/status/{id}", [\App\Http\Controllers\ProductStatusController::class, "update"])->name("status.update");

    Route::delete("/status/{id}", [\App\Http\Controllers\ProductStatusController::class, "destroy"])->name("status.destroy");

    Route::get("/settings/edit", [\App\Http\Controllers\SettingController::class, "edit"])->name("settings.edit");

    Route::patch("/settings/1", [\App\Http\Controllers\SettingController::class, "update"])->name("settings.update");

});
