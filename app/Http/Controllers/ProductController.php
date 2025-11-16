<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function show()
    {
        $products = Product::with('brand')->get();
        return view('index', [
            'allproducts' => $products
        ]);
    }

    public function productListView()
    {
        $products = Product::with(['brand', 'category'])->get();
        $categories = Category::all();

        return view('admin.listProduct', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function createView()
    {
        return view('admin.createProduct', [
            'brands' => Brand::all(),
            'categories' => Category::all()
        ]);
    }

    public function updateView(int $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.updateProduct', [
            'brands' => Brand::all(),
            'categories' => Category::all(),
            'products' => $product
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:50',
            'product_size' => 'required|string|max:4',
            'product_color' => 'required|string|max:50',
            'product_price' => 'required|integer',
            'quantity' => 'required|integer',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brand_id' => 'required',
            'category_id' => 'required',
        ]);

        // Handle image upload
        $imagePath = $request->file('product_image')->store('products', 'public');

        Product::create([
            'product_name' => $request->product_name,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'product_price' => $request->product_price,
            'quantity' => $request->quantity,
            'product_image' => $imagePath,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('product.list.view');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:50',
            'product_size' => 'required|string|max:4',
            'product_color' => 'required|string|max:50',
            'product_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'product_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brand_id' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::findOrFail($id);

        // $imagePath = ;

        if ($request->file('product_image')) {
            unlink('storage/'.$product->product_image);
            $product->update([
                'product_name' => $request->product_name,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'product_price' => $request->product_price,
                'quantity' => $request->quantity,
                'product_image' => $request->file('product_image')->store('products', 'public'),
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
            ]);
        } else {
            $product->update([
                'product_name' => $request->product_name,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'product_price' => $request->product_price,
                'quantity' => $request->quantity,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
            ]);
        }

        return redirect()->route('product.list.view');
    }

    public function delete(int $id) {
        $product = Product::findOrFail($id);
        // $imagePath = 'public/'.$product->product_image;
        if (Storage::disk('public')->exists($product->product_image)) {
            Storage::disk('public')->delete($product->product_image);
        }

        $product->delete();

        return redirect()->route('product.list.view');
    }
}
