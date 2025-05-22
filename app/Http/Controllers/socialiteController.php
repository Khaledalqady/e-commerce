<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Auth as SupportFacadesAuth;

class socialiteController extends Controller
{
    //
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        $user = Socialite::driver($provider)->user();
        dd($user);
        if($provider_user= User::where('provider_id',$user->id)->where('provider_type',$provider)->first()){
            auth()->login($user);($provider_user);
            return redirect()->route('dashboard');
        }
        
           $user= User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'provider_id'=>$user->id,
                'provider_type'=>$provider,
                'provider_token' => $user->token,

            ]);
           Auth::login($user);
            return redirect()->route('dashboard');
        }
     
    }

