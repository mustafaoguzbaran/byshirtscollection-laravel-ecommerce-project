<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
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
        $createProductData = [
            "name" => $request->create_product_title,
            "description" => $request->create_product_content,
            "price" => $request->create_product_price,
            "stock_quantity" => $request->create_product_stock_quantity,
            "color_id" => $request->create_product_color,
            "category_id" => $request->create_product_category,
            "is_featured" => $request->is_featured,
            "slug" => Str::slug($request->create_product_title)
        ];
        if ($request->create_product_featured_image) {
            $productFeaturedImage = $request->file("create_product_featured_image");
            $productFeaturedImageName = time() . "-" . $productFeaturedImage->getClientOriginalName();
            $productFeaturedImage->storeAs("product_featured_images", $productFeaturedImageName, "public");
            $createProductData["featured_image"] = "storage/product_featured_images/" . $productFeaturedImageName;
        }
        $product = Product::create($createProductData);
        if ($request->create_product_images) {
            $images = $request->file("create_product_images");
            foreach ($images as $image) {
                $imageName = time() . "-" . $image->getClientOriginalName();
                $image->storeAs("product_images", $imageName, "public");
                $img = Image::firstOrCreate(["path" => "storage/product_images/" . $imageName]);
                $product->images()->attach($img->id);
            }
        }
        if ($request->create_product_tags) {
            $tags = explode(",", $request->create_product_tags);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(["name" => trim($tagName), "slug" => Str::slug($tagName)]);
                $product->tags()->attach($tag->id);
            }
        }
        if ($request->create_product_variations) {
            $variations = explode(",", $request->create_product_variations);
            foreach ($variations as $variationName) {
                $variation = Variation::firstOrCreate(["name" => trim($variationName), "slug" => Str::slug($variationName)]);
                $product->variations()->attach($variation->id);
            }
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
        $product = Product::find($request->id);

        if ($product) {
            $product->variations()->detach();

            $updateProductData = [
                "name" => $request->edit_product_title,
                "description" => $request->edit_product_content,
                "price" => $request->edit_product_price,
                "stock_quantity" => $request->edit_product_stock_quantity,
                "color_id" => $request->edit_product_color,
                "category_id" => $request->edit_product_category,
                "is_featured" => $request->edit_is_featured,
                "slug" => Str::slug($request->edit_product_title)
            ];

            if ($request->edit_product_featured_image) {
                $productFeaturedImage = $request->file("edit_product_featured_image");
                $productFeaturedImageName = time() . "-" . $productFeaturedImage->getClientOriginalName();
                $productFeaturedImage->storeAs("product_featured_images", $productFeaturedImageName, "public");
                $updateProductData["featured_image"] = "storage/product_featured_images/" . $productFeaturedImageName;
            }
            $product->update(array_filter($updateProductData));

            if ($request->edit_product_variations) {
                $variations = explode(",", $request->edit_product_variations);
                foreach ($variations as $variationName) {
                    $variation = Variation::firstOrCreate(["name" => trim($variationName), "slug" => Str::slug($variationName)]);
                    $product->variations()->attach($variation->id);
                }
            }
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
        return view("backoffice.edit-price");
    }

    public function priceControlUpdate(Request $request)
    {
        $amountUpdate = intval($request->bulk_product_price_update);
        if($amountUpdate > 0 ) {
            Product::query()->update([
                "price" => DB::raw("price + $amountUpdate")
            ]);
        } elseif ($amountUpdate < 0 ) {
            Product::query()->update([
                "price" => DB::raw("price + $amountUpdate")
            ]);
        }
        return redirect()->route("product.price.edit");
    }
}
