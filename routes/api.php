<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\productController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




//Route::get('/user', function (Request $request) {
   // return $request->user();
//})->middleware('auth:sanctum');


// auth api package  , auth ,access token user register login access token  logout delete access token
// csrf random token

// create access token  compare db if login or register or not


Route::controller(ProductController::class)->group(function(){


        Route::get('products','index')->name('all-products');

        Route::get('product/show/{id}','show')->name('show-product');
    
       
        Route::post('products','store')->name('store-product');
    
        route::put('product/updated/{id}','update')->name('update-product');
    
        Route::delete('product/delete/{id}','delete')->name('delete-product');
   
});

Route::controller(AuthController::class)->group(function(){
  
  route::post('register','register'); 
  route::post('login','login');
  route::post('logout','logout');
     
});
