<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brand', [
            'brands' => $brands
        ]);
    }

    public function brandListView()
    {
        $brands = Brand::all();
        return view('admin.listBrand', [
            'brands' => $brands
        ]);
    }

    public function createView()
    {
        return view('admin.createBrand');
    }

    public function updateView(int $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.updateBrand', [
            'brands' => $brand
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:50',
            'brand_establishment_date' => 'required|date',
            'brand_manufacturing_country' => 'required|string|max:50',
            'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imagePath = $request->file('brand_image')->store('brands', 'public');

        Brand::create([
            'brand_name' => $request->brand_name,
            'brand_establishment_date' => $request->brand_establishment_date,
            'brand_manufacturing_country' => $request->brand_manufacturing_country,
            'brand_image' => $imagePath,
        ]);

        return redirect()->route('brand.list.view');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'brand_name' => 'required|string|max:50',
            'brand_establishment_date' => 'required|date',
            'brand_manufacturing_country' => 'required|string|max:50',
            'brand_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Changed to 'sometimes' to make it optional
        ]);

        $brand = Brand::findOrFail($id);

        if ($request->hasFile('brand_image')) {
            // Delete old image if exists
            if (Storage::disk('public')->exists($brand->brand_image)) {
                Storage::disk('public')->delete($brand->brand_image);
            }
            
            $imagePath = $request->file('brand_image')->store('brands', 'public');
            
            $brand->update([
                'brand_name' => $request->brand_name,
                'brand_establishment_date' => $request->brand_establishment_date,
                'brand_manufacturing_country' => $request->brand_manufacturing_country,
                'brand_image' => $imagePath,
            ]);
        } else {
            $brand->update([
                'brand_name' => $request->brand_name,
                'brand_establishment_date' => $request->brand_establishment_date,
                'brand_manufacturing_country' => $request->brand_manufacturing_country,
            ]);
        }

        return redirect()->route('brand.list.view');
    }

    public function delete(int $id)
    {
        $brand = Brand::findOrFail($id);
        
        // Delete the brand image from storage
        if (Storage::disk('public')->exists($brand->brand_image)) {
            Storage::disk('public')->delete($brand->brand_image);
        }

        $brand->delete();

        return redirect()->route('brand.list.view');
    }
}