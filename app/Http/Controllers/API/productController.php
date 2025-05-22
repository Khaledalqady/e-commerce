<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    //
    // show one show all  store
 

    //
    public function index(){
        //products
        $products = Product::all();
        if($products !== null){
            return ProductResource::collection($products);
        }else{
            return response()->json([
                "msg"=> "no products found"

            ],404);
        }
        
    }

    public function show($id){
        //products
        $product = product::find($id);
        if($product ){
            return new ProductResource($product);

        }else{
            return response()->json([
                "msg"=> "no products found"

            ],404);
        }
    }

    public function store(Request $request){
        //valid
         $error=Validator::make($request->all(),[
            'name' => "required|string|max:255",
            'desc' => "required|string",
            'price' => "required|numeric",
            'image' => "required|image|mimes:png,jpg,jpeg",
            'quantity' => "required|numeric",

        ]);

        if($error->fails()){
            return response()->json([
                "error"=> $error->errors()

            ],301);
        }
        //image
        $image = Storage::putFile("products",$request->image);

        // create
        $product = product::create([
            
            "name"=> $request->name,
            "price"=> $request->price,
            "quantity" => $request->quantity,
            "desc"=> $request->desc,
            "image"=> $image,
        ]);

        //msg
        return response()->json([
            "msg"=> "product created successfully"
        ],200);
        }
        //image

        public function update(Request $request,$id){
            //valid
            $product = product::find($id);
              if($product == null){
        
            return response()->json([
                "msg"=> "no products found" ],404);
              }
             $error=Validator::make($request->all(),[
                'name' => "required|string|max:255",
                'desc' => "required|string",
                'price' => "required|numeric",
                'image' => "required|image|mimes:png,jpg,jpeg",
                'quantity' => "required|numeric",
    
            ]);
    
            if($error->fails()){
                return response()->json([
                    "error"=> $error->errors()
    
                ],301);
            }
            //image
            if($request -> hasFile('image')){
                storage::delete($product->image);
                $image = Storage::putFile("products",$request->image);
            }else{
                        $image = Storage::putFile("products",$product->image);
                 }
            // update
            $product->update([
                "name"=> $request->name,
                "price"=> $request->price,
                "quantity" => $request->quantity,
                "desc"=> $request->desc,
                "image"=> $image,
            ]);
    
            //msg
            return response()->json([
                "msg"=> "product updated successfully",
                "product"=> new ProductResource($product),
            ],200);
            }
     


    public function delete($id){
        $product = Product::find($id);
        if($product == null){
            return response()->json([
                "msg"=>"product not found"
            ],404);
        }

        if($product->image !==null){
            storage::delete($product->image);
        }

        $product->delete();

        return response ()->json([
            "msg"=>"product deleted successfully",
        ],200);

    }
}

