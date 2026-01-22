<?php

namespace App\Http\Controllers;

use App\Constants\RouteNames;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * List categories
     */
    public function indexCategory()
    {
        $categories = Category::where('status', 'active')
            ->latest()
            ->get();

        return view('inventory.categories.category-list', [
            'categories' => $categories
        ]);
    }

    /**
     * Store category
     */
    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'status'        => 'required|in:active,inactive',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->status = $request->status;

        $category->save();

        return redirect()
            ->route(RouteNames::CATEGORY_LIST)
            ->with('success', 'Category added successfully');
    }

    /**
     * Show single category
     */
    public function showCategory($id)
    {
        $category = Category::with('products')->findOrFail($id);

        return view('inventory.categories.category-show', [
            'category' => $category
        ]);
    }

    /**
     * Update category
     */
    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'category_name' => 'sometimes|unique:categories,category_name,' . $id,
            'status'        => 'sometimes|in:active,inactive',
        ]);

        $category->update($data);

        return redirect()
            ->route(RouteNames::CATEGORY_LIST)
            ->with('success', 'Category updated successfully');
    }

    /**
     * Soft delete category
     */
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()
            ->route(RouteNames::CATEGORY_LIST)
            ->with('success', 'Category deleted successfully');
    }
}
