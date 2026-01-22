<?php

namespace App\Http\Controllers;

use App\Constants\RouteNames;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexProduct()
    {
        $products = Product::with('category')
            ->where('status', 'active')
            ->latest()
            ->get();

        return view('account.products.products-list', [
            'products' => $products
        ]);
    }

    public function addProduct()
    {
        $categories = Category::where('status', 'active')->get();

        return view('account.products.products-add', [
            'categories' => $categories
        ]);
    }

    public function storeProduct(Request $request)
    {
        $data = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'product_name'  => 'required|string|max:255',
            'product_code'  => 'required|unique:products,product_code',
            'dosage_form'   => 'required|string|max:100',
            'quantity'      => 'required|numeric',
            'unit'          => 'required|in:ml,l,gm,kg',
            'manufacturer'  => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'status'        => 'required|in:active,inactive',
        ]);

        Product::create($data);

        return redirect()
            ->route(RouteNames::PRODUCT_LIST)
            ->with('success', 'Product added successfully');
    }

    public function showProduct($id)
    {
        $product = Product::with('category')->findOrFail($id);

        return view('account.products.products-show', [
            'product' => $product
        ]);
    }

    public function editProduct($id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::where('status', 'active')->get();

        return view('account.products.products-edit', [
            'product'    => $product,
            'categories' => $categories
        ]);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'product_name'  => 'required|string|max:255',
            'product_code'  => 'required|unique:products,product_code,' . $id,
            'dosage_form'   => 'required|string|max:100',
            'quantity'      => 'required|numeric',
            'unit'          => 'required|in:ml,l,gm,kg',
            'manufacturer'  => 'nullable|string|max:255',
            'description'   => 'nullable|string',
            'status'        => 'required|in:active,inactive',
        ]);

        $product->update($data);

        return redirect()
            ->route(RouteNames::PRODUCT_LIST)
            ->with('success', 'Product updated successfully');
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete(); // soft delete

        return redirect()
            ->route(RouteNames::PRODUCT_LIST)
            ->with('success', 'Product deleted successfully');
    }
}
