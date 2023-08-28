<?php

namespace App\Http\Controllers;

use App\Models\ProductStatus;
use Illuminate\Http\Request;

class ProductStatusController extends Controller
{
    public function index()
    {
        $statusData = ProductStatus::all();
        return view("backoffice.all-status", compact("statusData"));
    }

    public function create()
    {
        return view("backoffice.add-status");
    }

    public function store(Request $request)
    {
        $statusData = [
            "name" => $request->create_product_status_name
        ];
        ProductStatus::create($statusData);
        return redirect()->route("status.create");
    }

    public function edit(Request $request)
    {
        $statusData = ProductStatus::where("id", $request->id)->first();
        return view("backoffice.edit-status", compact("statusData"));
    }

    public function update(Request $request)
    {
        $statusData = [
            "name" => $request->update_product_status_name
        ];
        ProductStatus::where("id", $request->id)->update($statusData);
        return redirect()->route("status.edit", ["id" => $request->id]);
    }

    public function destroy(Request $request)
    {
        ProductStatus::destroy($request->id);
        return redirect()->route("status.index");
    }
}
