<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function shows() {
        $brands = Brand::get();
        return view('brandddd', [
            'allbrands' => $brands
        ]);
    }
}

