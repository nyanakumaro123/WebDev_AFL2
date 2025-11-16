<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryListView()
    {
        $categories = Category::all();
        return view('admin.listCategory', [
            'categories' => $categories
        ]);
    }

    public function createView()
    {
        return view('admin.createCategory');
    }

    public function updateView(int $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.updateCategory', [
            'category' => $category
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('category.list.view')->with('success', 'Category created successfully');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('category.list.view')->with('success', 'Category updated successfully');
    }

    public function delete(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.list.view')->with('success', 'Category deleted successfully');
    }
}