<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(request $request){
        //validate

        Validator::make($request->all(),[
            'name' => "required|string|max:255",
            'email' => "required|email",
            'password' => "required|string|min:6|confirmed",
    
            ]);
    
            if($error->fails()){
                return response()->json([
                    "error"=> $error->errors()
    
                ],301);
            }
        


        // password hass

        $password = bcrypt($request->password);

        //acess token
        $access_token = Str::random(65);


        // create

        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'access_token'=> $access_token,

        ]);

        //redirect

        return response()->json([
            "msg"=>"user register success",
            "access_token"=>$access_token,
            
        ],200);
    }


    public function login(request $request){
        Validator::make($request->all(),[
           
            'email' => "required|email",
            'password' => "required|string|min:6",
    
            ]);
    
            if($error->fails()){
                return response()->json([
                    "error"=> $error->errors()
    
                ],301);
            }

        //check user

        $user = User::where('email',$request->email)->first();
        if($user){
            $IsValid=Hash::check($request->password,$user->password);

            if($IsValid){
                //login

                //update access token
               $access_token = Str::random(65);
               $user->update([
                "access_token"=> $access_token
               ]);

               return response()->json([
                "msg"=> "user login success",
                "access_token"=> $access_token,
               ],200);

            }else{
                return response()->json([
                    "msg"=>"password not match",

                ],404);
            }

        }else{

            return response()->json([
                "msg"=>"email not correct",

            ],404);
        }
        //password check

    }


    // null with no access token
    public function logout(request $request){
        $access_token =$request->header('access_token');
        if($access_token){
        $user= User::where('access_token',$access_token)->first();
        if($user){
            $user->update([
                "access_token"=>null,
            ]);
            return response()->json([
                "msg"=> "user logout success",
                
               ],200);
        }else{
            return response()->json([
                "msg"=> "access_token not correct",
               ],404);
        }
    }else{
        return response()->json([
            "msg"=> "access_token not found",
           ],404);
    }
    }
}

