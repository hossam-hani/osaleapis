<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{

    public function getCategoriesByShopid(Request $request,$shop_id){
        return Category::where('shop_id','=',$shop_id)->paginate(25);
    }


    public function createCategory(Request $request){

        $user = Auth::user();
        $shop_id = $user->shop->id;

        $validateData = $request->validate([
            'name' =>  'required|max:255',
            'is_active' =>  'required'
        ]);

        $validateData["shop_id"] = $shop_id;

        return Category::create($validateData);

    }


    public function updateCategory(Request $request, $id){

        $user = Auth::user();
        $shop_id = $user->shop->id;

        $validateData = $request->validate([
            'name' =>  'required|max:255',
            'is_active' =>  'required'
        ]);
        
        // update category data
        Category::find($id)->update($validateData);
        
        return Category::find($id);
    }

}
