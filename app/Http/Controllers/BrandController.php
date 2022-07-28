<?php

namespace App\Http\Controllers;
use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function AllBrand(){
        $brand = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }
}
