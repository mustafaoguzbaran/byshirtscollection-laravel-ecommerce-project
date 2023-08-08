<?php

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

    Route::get("/blog", [\App\Http\Controllers\BlogController::class, "index"])->name("blog.index");

    Route::get("/blog/create", [\App\Http\Controllers\BlogController::class, "create"])->name("blog.create");

    Route::post("/blog", [\App\Http\Controllers\BlogController::class, "store"])->name("blog.store");

    Route::get("/blog/{id}/edit")->name("blog.edit");

    Route::delete("/blog/{id}/delete", [\App\Http\Controllers\BlogController::class, "destroy"])->name("blog.destroy");

    Route::get("/product/color", [\App\Http\Controllers\ColorController::class, "index"])->name("product.color.index");

    Route::get("/product/color/{id}/edit", [\App\Http\Controllers\ColorController::class, "edit"])->name("product.color.edit");

    Route::patch("/product/color/{id}", [\App\Http\Controllers\ColorController::class, "update"])->name("product.color.update");

    Route::delete("/product/color/{id}/delete", [\App\Http\Controllers\ColorController::class, "destroy"])->name("product.color.destroy");

    Route::get("/product/color/create", [\App\Http\Controllers\ColorController::class, "create"])->name("product.color.create");

    Route::post("/product/color", [\App\Http\Controllers\ColorController::class, "store"])->name("product.color.store");

    Route::get("/product/category", [\App\Http\Controllers\CategoryController::class, "index"])->name("product.category.index");

    Route::get("/product/category/create", [\App\Http\Controllers\CategoryController::class, "create"])->name("product.category.create");

    Route::post("/product/category", [\App\Http\Controllers\CategoryController::class, "store"])->name("product.category.store");

    Route::get("/product/category/{id}/edit", [\App\Http\Controllers\CategoryController::class, "edit"])->name("product.category.edit");

    Route::patch("/product/category/{id}", [\App\Http\Controllers\CategoryController::class, "update"])->name("product.category.update");

    Route::delete("/product/category/{id}/delete", [\App\Http\Controllers\CategoryController::class, "destroy"])->name("product.category.delete");

    Route::get("/product/create", [\App\Http\Controllers\ProductController::class, "create"])->name("product.create");

    Route::get("/product/variations", [\App\Http\Controllers\VariationController::class, "index"])->name("product.variations.index");

    Route::post("/product/variations")->name("product.variations.create");

    Route::get("/settings/edit", [\App\Http\Controllers\SettingController::class, "edit"])->name("settings.edit");

    Route::patch("/settings/1", [\App\Http\Controllers\SettingController::class, "update"])->name("settings.update");

});
