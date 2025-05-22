<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\socialiteController;
use App\Http\Controllers\User\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{provider}/redirect',[socialiteController::class,'redirect']);
Route::get('/{provider}/callback',[socialiteController::class,'callback']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//  انا مش فاهم ايه حصل فوق ده اتفاجات بيه بعد ما خلصت المشروع ال web كله اتغير
//
Route::get("home",[AuthController::class,'redirect'])->name('home');
Route::controller(ProductController::class)->group(function(){
    Route::middleware('auth',"is_admin")->group(function(){
        Route::get('products','index')->name('all-products');
        Route::get('product/show/{id}','create')->name('show-product');
        Route::get('product/create','create')->name('create-product');
        Route::post('products','store')->name('store-products');
    });
});

Route::middleware(['auth', 'is_user'])->group(function () {
    Route::get('/user/dashboard', [HomeController::class, 'index']);
    // Add more user-only routes here
});


Route::resource('contact',ContactController::class);