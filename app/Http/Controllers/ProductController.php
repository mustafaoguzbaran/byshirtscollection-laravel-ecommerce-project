<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        $categoryData = Category::all();
        return view("backoffice.add-product", compact("categoryData"));
    }
}
