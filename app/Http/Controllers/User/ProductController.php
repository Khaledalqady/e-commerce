<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // add to cart in session
    // make order
    // add to wishlist
    //add to favorite

    public function index(){
        $products = Product::all();
       
        return view('user.home',compact('products'));

    }

    public function show($id){
        $product = Product::findOrFail($id);
       
        return view('user.products.show',compact('product'));

    }

    public function addToCart($id,request $request){
      $qty = $request->qty;
      $product = product::findOrFail($id);
      $cart = session()->get('cart');
        if(!$cart){
            //first time of create cart
            $cart = [
                $id => [
                    "name" => $product->name,
                    "qty" => $qty,
                    "price" =>$product->price,
                    "image"=> $product->image
                ]  
                ];
                session()->put('cart',$cart);
                return redirect()->back()->with('success','product added to cart successfully');
        }else{
            // add to cart
            // check same id before or not 
            if(isset($cart[$id])){
                $cart[$id]['qty']+= $qty;
                session()->put('cart',$cart);
                return redirect()->back()->with('success','product added to cart successfully');
            }
                $cart[$id] = [
                    
                        "name" => $product->name,
                        "qty" => $qty,
                        "price" =>$product->price,
                        "image"=> $product->image
                   
                    ];
                    session()->put('cart',$cart);
                    return redirect()->back()->with('success','product added to cart successfully');
            

        }


    }

    public function showCart(){
        $cart = session()->get('cart');
       // dd($cart);

        return view ('user.products.myCart',compact('cart'));
    }

    // make order

    public function makeOrder(request $request){
        // table orders
        //orderdetails
        //session cart

       

        $cart= session()->get('cart');
        //user_id
        $user_id = Auth::user()->id;
        // order_id
       $order=  Order::create([
            'user_id'=>$user_id,
            'requiredDate'=>$request->requireDate,
        ]);

        //products 
        foreach($cart as $id =>$product){
            OrderDetails::create([
                'order_id'=>$order->id,
                'product_id'=> $id,
                'quantity'=> $product['qty'],
                'price'=> $product['price'],
            ]);

        }

        return redirect()->back()->with('success','order created successfully');
       
    }
}
