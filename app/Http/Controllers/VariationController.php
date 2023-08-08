<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    public function index()
    {
        $variationData = Variation::all();
        return view("backoffice.all-variation", compact("variationData"));
    }
    public function create(Request $request) {
        $createVariationData = [
            ""
        ];
    }
}
