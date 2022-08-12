<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }



    public function AllCat(){

        $categories = Category::latest()->paginate(5);
        $trachCat = Category::onlyTrashed()->latest()->paginate(3);
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index', compact('categories', 'trachCat'));
    }
    

    public function AddCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please Enter the Category Name',
            'category_name.unique' => 'Please Enter the unique Category Name',
            'category_name.max' => 'MAximum Length is 255 Chr',
        ]);
        //Method 1
        // ----------------------------------
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        // -----------------------------------

        // Method 2
        // -----------------------------------
        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();
        // -----------------------------------

        // Method 3
        // -----------------------------------
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);

        // ------------------------------------

        return Redirect()->back()->with('success', 'Category Added Successfully');

    }


    public function Edit($id){
        $categories =Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }

    public function Update(Request $request, $id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        return Redirect()->route('all.category')->with('success', 'Category Updated Successfully');
    }

    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success', ' Category Soft Delete Successfully');
    }

    public function ReStore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category Restore Successfully');
    }

    public function Pdelete($id){
       $delete =Category::onlyTrashed()->find($id)->forceDelete(); 
       return Redirect()->back()->with('success', 'Category Delete Successfully');
    
    }
    
}
