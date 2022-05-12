<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeAboutController extends Controller
{
    public function HomeAbout(){
        $homeAbouts=HomeAbout::latest()->get();
        return view('admin.Home.index',compact('homeAbouts'));
    }

    public function AddAbout(){
        return view('admin.Home.addAbout');
    }

    public function StoreAbout(Request $request){
        HomeAbout::insert([
            'title'=>$request->title,
            'short_desc'=>$request->short_desc,
            'long_desc'=>$request->long_desc,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->route('home.about');
    }

    public function EditAbout($id){
        $editDatas=HomeAbout::find($id);
        return view('admin.Home.edit',compact('editDatas'));
    }

    public function UpdateAbout(Request $request,$id){
        HomeAbout::find($id)->update([
            'title'=>$request->title,
            'short_desc'=>$request->short_desc,
            'long_desc'=>$request->long_desc,
        ]);
        return redirect()->route('home.about');
    }

    public function DeleteAbout($id){
        $delete=HomeAbout::find($id)->delete();
        return redirect()->route('home.about');
    }
    
}
