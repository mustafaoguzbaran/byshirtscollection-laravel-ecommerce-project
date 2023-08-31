<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Variation;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $productData = Product::all();
        return view("backoffice.all-product", compact("productData"));
    }

    public function create()
    {
        $categoryData = Category::all();
        $colorData = Color::all();
        return view("backoffice.add-product", compact("categoryData", "colorData"));
    }

    public function store(Request $request)
    {
        $createProductData = $request->only([
            "create_product_title",
            "create_product_content",
            "create_product_price",
            "create_product_stock_quantity",
            "create_product_color",
            "create_product_category",
            "is_featured",
            "create_product_is_featured",
            "create_product_featured_image",
            "create_product_images",
            "create_product_tags",
            "create_product_variations"
        ]);
        try {
            $this->productService->attemptCreate($createProductData);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return redirect()->route("product.create");
    }

    public function show(Request $request)
    {
        $getProductId = explode("-", route("product.show", ['slug' => $request->slug]));
        $productId = end($getProductId);
        $productData = Product::where('id', $productId)->first();
        if ($productData != null) {
            $variationData = Variation::all();
            return view("front.show-product", compact("productData", "variationData"));
        } else {
            return view("front.404");
        }

    }

    public function edit(Request $request)
    {
        $productData = Product::where("id", $request->id)->first();
        $categoryData = Category::all();
        $colorData = Color::all();
        return view("backoffice.edit-product", compact("productData", "categoryData", "colorData"));
    }

    public function update(Request $request)
    {
        $updateProductData = $request->only([
            "edit_product_title",
            "edit_product_content",
            "edit_product_price",
            "edit_product_stock_quantity",
            "edit_product_color",
            "edit_product_category",
            "edit_product_is_featured",
            "edit_product_featured_image",
            "edit_product_images",
            "edit_is_featured",
            "edit_product_title",
            "edit_product_variations"
        ]);
        try {
            $this->productService->attemptUpdate($updateProductData, $request->id);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return redirect()->route("product.edit", ["id" => $request->id]);
    }

    public function delete(Request $request)
    {
        Product::destroy($request->id);
        return redirect()->route("product.index");
    }

    public function priceControlEdit()
    {
        $categoryData = Category::all();
        return view("backoffice.edit-price", compact("categoryData"));
    }

    public function priceControlUpdate(Request $request)
    {
        $updateProductPriceData = $request->bulk_product_price_update;
        $categoryId = $request->bulk_product_price_category_update;
        try {
            $this->productService->attempProductPrice($updateProductPriceData, $categoryId);
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->route("product.price.edit")->withErrors($errorMessage);
        }
        return redirect()->route("product.price.edit")->with("successMessage", "Ürünlerin fiyatı başarıyla güncellendi!");
    }
}
