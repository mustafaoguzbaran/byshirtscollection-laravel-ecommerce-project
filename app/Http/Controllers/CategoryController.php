<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryData = Category::all();
        return view("backoffice.all-category", compact("categoryData"));
    }

    public function show(Request $request)
    {
        $colorData = Color::all();
        $category = Category::where("slug", $request->slug)->firstOrFail();
        $colorId = $request->input('product_color_filter');
        $priceFilter = $request->input('product_price_filter');

        $query = Product::where("category_id", $category->id);

        if ($colorId) {
            $query->where('color_id', $colorId);
        }

        if ($priceFilter === 'increased_price_filter') {
            $query->orderBy('price', 'asc');
        } elseif ($priceFilter === 'decreasing_price_filter') {
            $query->orderBy('price', 'desc');
        }
        if ($colorId or $priceFilter) {
            $products = $query->get();
        } else {
            $products = Product::where("category_id", $category->id)->get();
        }
        return view('front.category', compact('products', "colorData"));
    }

    public function create()
    {
        return view("backoffice.add-category");
    }

    public function store(CategoryRequest $request)
    {
        $createCategoryData = [
            "name" => $request->create_product_category_name,
            "slug" => Str::slug($request->create_product_category_name)
        ];
        Category::create($createCategoryData);
        return redirect()->route("product.category.create");
    }

    public function edit(Request $request)
    {
        $categoryData = Category::where("id", $request->id)->first();
        return view("backoffice.edit-category", compact("categoryData"));
    }

    public function update(Request $request)
    {
        $categoryDataUpdate = [
            "name" => $request->edit_product_category_name,
            "slug" => $request->edit_product_category_slug
        ];
        Category::where("id", $request->id)->update(array_filter($categoryDataUpdate));
        return redirect()->route("product.category.edit", ['id' => $request->id]);
    }

    public function destroy(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->route("product.category.index");
    }
}
