<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function createUser(Request $request){ 

        $validateData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|max:55',
            'password' => 'required',
            'phone' => 'required',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['is_blocked'] = 0;
        
        $user = User::create($validateData);

        return $user;
        $access_token = $user->createToken('authToken')->accessToken;


        // $message = "Thanks for registering, you can now use your account with all OSALE partners";
        // $urlt = "https://smssmartegypt.com/sms/api/?username=hossamhani.t@gmail.com&password=35603282&sendername=OSALE&message=$message&mobiles=002$phoneU";
        // $response = Http::get($urlt);

        return response(['user' => $user, 'access_token' => $access_token]);
    }

    public function login(Request $request){

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if(!auth()->attempt($loginData)){
            return response(['message' => 'invalid credentials'], 401);
        }

        $access_token = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $access_token]);
    }

    public function AauthAcessToken(){
        return $this->hasMany('\App\OauthAccessToken');
    }
    
    public function logoutApi()
    { 
    if (Auth::check()) {
       Auth::user()->AauthAcessToken()->delete();
    }
    }

}
