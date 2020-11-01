<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    public function getShopDetails(){
        
        $user = Auth::user();
        $shopDetails = $user->shop;
        $products = $shopDetails->products;
        $categories = $shopDetails->categories;
        
        // $json = '[{"a":1,"b":2,"c":3,"d":4,"e":5},{"a":1,"b":2,"c":3,"d":4,"e":5}]';
        // $json = '["01032811385","01144774476"]';
        // var_dump(json_decode($json, true));

        return $shopDetails;
    }

    public function createShop(Request $request){

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required',
            'owner_name' => 'required|max:255',
            'owner_phone' => 'required|max:14',
            'owner_email' => 'required|email',
            'payment_plan' => 'required|in:quarterly,biannual,annual',
            'payment_value' => 'required',
            'type' => 'required|in:restaurant,supermarket,other',
            'logo' => 'required|image|max:5000',
        ]);

        //upload the logo
        $result = $request->file('logo')->store('images','public');
        $validateData["logo"] =  env("APP_URL", "somedefaultvalue")."/storage/".$result;
        $newShop = Shop::create($validateData);

        return $newShop;
    }


}
