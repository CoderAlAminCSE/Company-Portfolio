<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeAboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\portfolioController;
use App\Models\Multipic;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/adminPanel', function () {
    return view('admin.index');
});

Route::get('/', function () {
    $brands=DB::table('brands')->get();
    $abouts=DB::table('home_abouts')->first();
    $images=Multipic::all();
    return view('home',compact('brands','abouts','images'));
});

Route::get('/home',function(){
    return view('home');
});
Route::get('/about',function (){
    return view('about');
});
Route::get('/contact/fgn/dfh',[ContactController::class,'index'])->name('/con');



//Category Controller
Route::get('/category/all',[CategoryController::class,'AllCat'])->name('/category.all');
Route::post('/category/add',[CategoryController::class,'AddCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'EditCat']);
Route::post('category/update/{id}',[CategoryController::class,'UpdateCat']);
Route::get('/softDelete/category/{id}',[CategoryController::class,'SoftDelet']);
Route::get('/category/restore/{id}',[CategoryController::class,'RestoreCat']);
Route::get('/category/forceDelete/{id}',[CategoryController::class,'ForceDelete']);


//Brand Controller
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('/brand.all');
Route::post('/brand/add',[BrandController::class,'AddBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'EditBrand']);
Route::post('brand/update/{id}',[BrandController::class,'UpdateBrand']);
Route::get('/brand/delete/{id}',[BrandController::class,'DeleteBrand']);


//multi image
Route::get('/multi/image',[BrandController::class,'MultiImage'])->name('/multi.image');
Route::post('/multi/add',[BrandController::class,'AddMultiImage'])->name('store.image');


//slider controller
Route::get('/home/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class,'AddSlider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}',[HomeController::class,'EditSlider']);
Route::post('slider/update/{id}',[HomeController::class,'UpdateSlider']);



//Home About All Route
Route::get('/home/about',[HomeAboutController::class,'HomeAbout'])->name('home.about');
Route::get('/home/AddAbout',[HomeAboutController::class,'AddAbout'])->name('add.about');
Route::post('/home/store',[HomeAboutController::class,'StoreAbout'])->name('store.about');
Route::get('/home/edit/{id}',[HomeAboutController::class,'EditAbout']);
Route::post('update/HomeAbout/{id}',[HomeAboutController::class,'UpdateAbout']);
Route::get('/home/delete/{id}',[HomeAboutController::class,'DeleteAbout']);



//Portfolio All Route
Route::get('/portfolio',[portfolioController::class,'portfolio'])->name('portfolio');



//admin contact route
Route::get('/admin/contact',[ContactController::class,'adminContact'])->name('admin.contact');
Route::get('/admin/add/contact',[ContactController::class,'adminAddContact'])->name('add.contact');
Route::post('/admin/store/contact',[ContactController::class,'adminStoreContact'])->name('store.contact');
Route::get('/admin/contact/message',[ContactController::class,'adminMessage'])->name('admin.message');
Route::get('/message/delete/{id}',[ContactController::class,'DeleteMessage']);



//Home Contact Route
Route::get('/contact',[ContactController::class,'HomeContact'])->name('contact');
Route::post('/contact/form',[ContactController::class,'ContactForm'])->name('contact.form');



//Change password and user Route
Route::get('/change/password',[ChangePassword::class,'ChangePass'])->name('change.password');
Route::post('/update/password',[ChangePassword::class,'UpdatePass'])->name('update.password');


//change profile
Route::get('/change/profile',[ChangePassword::class,'updateProfile'])->name('profile.update');
Route::post('/change/profile/update',[ChangePassword::class,'updateUserProfile'])->name('update.user.profile');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
       $users = User::all();
        return view('admin.index');
    })->name('dashboard');
});

//log out 
Route::get('logout/',[BrandController::class,'LogOut'])->name('user.logout');