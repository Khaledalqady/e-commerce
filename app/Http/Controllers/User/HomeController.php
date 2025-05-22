<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        
        return view('user.home',compact('products'));

    }

    public function addToWishList(request $request){

        // product if it stock

        $product = Product::findOrFail($request->id);
        // session 

        $wishList = session()->get('wishlist');
        //first time
        if(!wishlist){
            $wishlist =[
                $id=>[
                    "name" =>$product->name,
                    "price"=> $product->price,
                    "image"=> $product->image
                ]
                ];
                session()->put('wishlist',$wishlist);
                return redirect()->back()->with('success','product added to wishlist successfully');
             
        }else{
            // add
            if(isset($wishlist[$id])){
                return redirect()->back()->with('success','product already in wishlist');
            }
            $wishlist[$id]= [
                "name" =>$product->name,
                "price"=>$product->price,
                "image"=>$product->image
            ];
            session()->put('wishlist',$wishlist);
            return redirect()->back()->with('success','product added to wishlist successfully');
        }


        // add

        //return

        //
    }
    public function showWishList(){
        $wishlist = session()->get('wishlist');
       // dd($cart);

        return view ('user.products.my-wishlist',compact('wishlist'));
    }


}