<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Environment\Console;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function AllCat(){
        $categoriesData=Category::latest()->paginate(3);
        $trashCat=Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',compact('categoriesData','trashCat'));
    }

    public function AddCat(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Insert Category Name',
            'category_name.max' => 'Category Name should be less then 255 character',
        ]
        );

        Category::insert([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now()
        ]);

        return Redirect()->back()->with('success','Category inserted successfully');
    }

    public function EditCat($id){
        $categories= Category::find($id);
        return view('admin.category.categoryEdit',compact('categories'));
    }

    public function UpdateCat(Request $request,$id){
        $update=Category::find($id)->update([
            'category_name'=>$request->category_name
        ]);
        return Redirect()->route('/category.all')->with('success','Category Updated successfully');
    }

    public function SoftDelet($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back();
    }

    public function RestoreCat($id){
        
        $restore=Category::withTrashed()->find($id)->restore();
        return Redirect()->back();
    }

    public function ForceDelete($id){
        $forceDelete=Category::onlyTrashed()->find($id)->ForceDelete();
        return Redirect()->back();
    }
}
