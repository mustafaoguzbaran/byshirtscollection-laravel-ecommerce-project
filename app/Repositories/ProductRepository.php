<?php

namespace App\Repositories;

use App\Models\Image;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Variation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function save($createProductData)
    {
        $product = new $this->product;
        $product->name = $createProductData["create_product_title"];
        $product->description = $createProductData["create_product_content"];
        $product->category_id = $createProductData["create_product_category"];
        $product->price = $createProductData["create_product_price"];
        $product->stock_quantity = $createProductData["create_product_stock_quantity"];
        $product->color_id = $createProductData["create_product_color"];
        $product->is_featured = $createProductData["is_featured"];
        $product->slug = Str::slug($createProductData["create_product_title"]);

        if ($createProductData["create_product_featured_image"]) {
            $productFeaturedImage = $createProductData["create_product_featured_image"];
            $productFeaturedImageName = time() . "-" . $productFeaturedImage->getClientOriginalName();
            $productFeaturedImage->storeAs("product_featured_images", $productFeaturedImageName, "public");
            $createProductData["featured_image"] = "storage/product_featured_images/" . $productFeaturedImageName;
            $product->featured_image = $createProductData["featured_image"];
        }
        $product->save();

        if ($createProductData["create_product_images"]) {
            $images = $createProductData["create_product_images"];
            foreach ($images as $image) {
                $imageName = time() . "-" . $image->getClientOriginalName();
                $image->storeAs("product_images", $imageName, "public");
                $img = Image::firstOrCreate(["path" => "storage/product_images/" . $imageName]);
                $product->images()->attach($img->id);
            }
        }

        if ($createProductData["create_product_tags"]) {
            $tags = explode(",", $createProductData["create_product_tags"]);
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(["name" => trim($tagName), "slug" => Str::slug($tagName)]);
                $product->tags()->attach($tag->id);
            }
        }

        if ($createProductData["create_product_variations"]) {
            $variations = explode(",", $createProductData["create_product_variations"]);
            foreach ($variations as $variationName) {
                $variation = Variation::firstOrCreate(["name" => trim($variationName), "slug" => Str::slug($variationName)]);
                $product->variations()->attach($variation->id);
            }
        }
    }

    public function updateProduct($updateProductData, $id)
    {
        $product = $this->product->find($id);

        if ($product) {

            if (isset($updateProductData["edit_product_title"])) {
                $product->name = $updateProductData["edit_product_title"];
            }
            if (isset($updateProductData["edit_product_content"])) {
                $product->description = $updateProductData["edit_product_content"];
            }
            if (isset($updateProductData["edit_product_category"])) {
                $product->category_id = $updateProductData["edit_product_category"];
            }
            if (isset($updateProductData["edit_product_price"])) {
                $product->price = $updateProductData["edit_product_price"];
            }
            if (isset($updateProductData["edit_product_stock_quantity"])) {
                $product->stock_quantity = $updateProductData["edit_product_stock_quantity"];
            }
            if (isset($updateProductData["edit_product_color"])) {
                $product->color_id = $updateProductData["edit_product_color"];
            }
            if (isset($updateProductData["edit_is_featured"])) {
                $product->is_featured = $updateProductData["edit_is_featured"];
            }
            if (isset($updateProductData["edit_product_title"])) {
                $product->slug = Str::slug($updateProductData["edit_product_title"]);
            }

            if (isset($updateProductData["edit_product_featured_image"])) {

                if ($product->featured_image) {
                    Storage::delete($product->featured_image); // Önceki resmi sil
                }

                $productFeaturedImage = $updateProductData["edit_product_featured_image"];
                $productFeaturedImageName = time() . "-" . $productFeaturedImage->getClientOriginalName();
                $productFeaturedImage->storeAs("product_featured_images", $productFeaturedImageName, "public");
                $updateProductData["featured_image"] = "storage/product_featured_images/" . $productFeaturedImageName;
                $product->featured_image = $updateProductData["featured_image"];
            }

            if (isset($updateProductData["edit_product_images"])) {
                foreach ($product->images as $image) {
                    $image->delete();
                    Storage::delete($image->path);
                }

                foreach ($updateProductData["edit_product_images"] as $image) {
                    $imageName = time() . "-" . $image->getClientOriginalName();
                    $image->storeAs("product_images", $imageName, "public");
                    $img = Image::create(["path" => "storage/product_images/" . $imageName]);
                    $product->images()->attach($img->id);
                }
            }

            $product->update();

            if (isset($updateProductData["edit_product_variations"])) {
                $product->variations()->detach();
                $variations = explode(",", $updateProductData["edit_product_variations"]);
                foreach ($variations as $variationName) {
                    $variation = Variation::firstOrCreate(["name" => trim($variationName), "slug" => Str::slug($variationName)]);
                    $product->variations()->attach($variation->id);
                }
            }
        }
    }

    public function increaseProductPrice($updatePriceData, $categoryId)
    {
        Product::where("category_id", $categoryId)->update([
            "price" => DB::raw("price + $updatePriceData")
        ]);
    }

    public function reduceProductPrice($updateProductPriceData, $categoryId)
    {
        Product::where("category_id", $categoryId)->update([
            "price" => DB::raw("price + $updateProductPriceData")
        ]);
    }

}
