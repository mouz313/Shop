<?php

namespace App\Http\Controllers;
use App\Models\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request)
    {
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg.jpeg,png',
        ],
        [
            'brand_name.required' => 'Please Enter the Brnad Name',
            'brand_image.min' => 'Brand Longer then 4 Charactres',
        ]);

        $brand_image = $request->file('brand_image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name;
        $brand_img->move($up_location,$img_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('Success','Brand Inserted Successfully');
    }


}
