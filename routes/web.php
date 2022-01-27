<?php

use App\Http\Controllers\assetcategories;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Assettype;
use App\Http\Controllers\Assetcontrol;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

// Route::get('/addcategories', function () {
//     return view('admin.addcategories');
// });


Route::get('/addassets',[Assettype::class,'addassets']);
Route::post('/addasset_insert',[Assettype::class,'addasset_insert']);
Route::get('/showassets',[Assettype::class,'showassets']);
Route::get('/editassets/{id}',[Assettype::class,'editassets']);
Route::post('/update',[Assettype::class,'update']);
Route::get('/deleteasset/{id}',[Assettype::class,'delete_asset']);


Route::get('/addcategories',[assetcategories::class,'addcategories']);
Route::post('/addcat',[assetcategories::class,'addcat']);
Route::get('/showcategories',[assetcategories::class,'showcategories']);
Route::get('/deletecat/{id}',[assetcategories::class,'delete_cat']);
Route::get('/editcategories/{id}',[assetcategories::class,'editcategories']);
Route::post('/updatecat',[assetcategories::class,'updatecat']);
Route::get('/chart',[assetcategories::class,'index']);
Route::get('/barchart',[assetcategories::class,'index1']);
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
