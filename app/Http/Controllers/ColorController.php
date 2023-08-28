<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ColorController extends Controller
{
    public function index()
    {
        $colorData = Color::all();
        return view("backoffice.all-color", compact("colorData"));
    }

    public function create()
    {
        return view("backoffice.add-color");
    }

    public function store(ColorRequest $request)
    {
        $createColorData = [
            "name" => $request->create_product_color_name,
            "slug" => Str::slug($request->create_product_color_name)
        ];
        Color::create($createColorData);
        return redirect()->route("product.color.create");
    }

    public function edit(Request $request)
    {
        $colorData = Color::where("id", $request->id)->first();
        return view("backoffice.edit-color", compact("colorData"));
    }

    public function update(Request $request)
    {
        $colorDataUpdate = [
            "name" => $request->edit_product_color_name,
            "slug" => $request->edit_product_color_slug
        ];
        Color::where("id", $request->id)->update(array_filter($colorDataUpdate));
        return redirect()->route("product.color.edit", ["id" => $request->id]);
    }

    public function destroy(Request $request)
    {
        Color::destroy($request->id);
        return redirect()->route("product.color.index");
    }
}
