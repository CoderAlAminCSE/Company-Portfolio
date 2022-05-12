<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }




    public function AllBrand(){
        $brands=Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    public function AddBrand(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:3',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'brand_name.required' => 'Insert Brand Name',
            'brand_name.min' => 'Brand Name should be olnger then 3 character',
        ]
        );

        $brand_image=$request->file('brand_image');
        //with out intervention package start
        // $name_generate=hexdec(uniqid());
        // $img_ext=strtolower($brand_image->getClientOriginalExtension());
        // $img_name=$name_generate.'.'.$img_ext;
        // $up_location='image/brand/';
        // $last_img=$up_location.$img_name;
        // $brand_image->move($up_location,$img_name);
        //with out intervention package end



        // store with intervention package start
        $name_generate=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_generate);
        // store with intervention package end
        $last_img='image/brand/'.$name_generate;

        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->back();
    }

    public function EditBrand($id){
        $brands=Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
    }

    public function UpdateBrand(Request $request , $id){

        $validated = $request->validate([
            'brand_name' => 'required|min:3',
   
        ],
        [
            'brand_name.required' => 'Insert Brand Name',
            'brand_name.min' => 'Brand Name should be olnger then 3 character',
        ]
        );

        $old_image=$request->old_image;
        
        $brand_image=$request->file('brand_image');

        if($brand_image){
        $name_generate=hexdec(uniqid());
        $img_ext=strtolower($brand_image->getClientOriginalExtension());
        $img_name=$name_generate.'.'.$img_ext;
        $up_location='image/brand/';
        $last_img=$up_location.$img_name;
        $brand_image->move($up_location,$img_name);

        unlink($old_image);
        Brand::find($id)->update([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->back();
        }
        else{
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'created_at'=>Carbon::now()
            ]);
            return Redirect()->back();
        }
    }

    public function DeleteBrand($id){
        $image=Brand::find($id)->brand_image;
        unlink($image);
        Brand::find($id)->delete();
        return Redirect()->back();
    }

    public function MultiImage(){
        $images=Multipic::all();
        return view('admin.multipic.index',compact('images'));
    }

    public function AddMultiImage(Request $request){
        

        $image=$request->file('image');
        
        foreach($image as $multi_img){
        // store with intervention package start
        $name_generate=hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
        Image::make($multi_img)->resize(300,200)->save('image/multi/'.$name_generate);
        // store with intervention package end
        $last_img='image/multi/'.$name_generate;

        Multipic::insert([
            
            'image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);

        }//end foreach
        return Redirect()->back();
    }


    public function LogOut(){
        Auth::logout();
        return Redirect()->route('login');
    }

  
}
