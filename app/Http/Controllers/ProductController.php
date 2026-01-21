<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::with('category')->latest()->get();
    }

    public function store(Request $request)
    {
        return Product::create($request->validate([
            'category_id' => 'required|exists:categories,id',
            'product_name' => 'required',
            'product_code' => 'required|unique:products',
            'dosage_form' => 'required',
            'quantity' => 'required|numeric',
            'unit' => 'required|in:ml,l,gm,kg',
            'manufacturer' => 'nullable',
            'description' => 'nullable',
            'status' => 'required|in:active,inactive'
        ]));
    }

    public function show($id)
    {
        return Product::with('orderItems')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return $product;
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}

