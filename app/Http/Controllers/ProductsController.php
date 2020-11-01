<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{

    public function getProductsByCategoryId(Request $request,$category_id){
        return Product::where('category_id','=',$category_id)->paginate(25);
    }

    public function createProdcut(Request $request){
        $user = Auth::user();
        $shop_id = $user->shop->id;
        
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'is_active' =>  'required',
            'cost' =>  'required',
            'price' =>  'required',  
            'image' =>  'required',  
            'category_id' =>  'required',
              
        ]);

        //upload the product image
        $result = $request->file('image')->store('images','public');
        $validatedData["image"] =  env("APP_URL", "somedefaultvalue")."/storage/".$result;
        $validatedData["shop_id"] = $shop_id;

        return Product::create($validatedData);
    }

    public function updateProduct(Request $request, $id){
        $user = Auth::user();
        $shop_id = $user->shop->id;
        
        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'is_active' =>  'required',
            'cost' =>  'required',
            'price' =>  'required',  
            'image' =>  '',  
            'category_id' =>  'required',
        ]);
        
        if($request->file('image') != null){
            //upload the product image
            $result = $request->file('image')->store('images','public');
            $validatedData["image"] =  env("APP_URL", "somedefaultvalue")."/storage/".$result;
            $validatedData["shop_id"] = $shop_id;
        }else{
            unset($validatedData['image']);
        }

        $updateResult = Product::find($id)->update($validatedData);

        if($updateResult){
            return Product::find($id);
        }else{
            return $updateResult;
        }
        


        
    }
}
