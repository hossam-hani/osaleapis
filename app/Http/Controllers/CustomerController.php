<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{


    
    public function customerDetails(Request $request,$id){
        $customer = Customer::find($id);
        $customer["addresses"] = $customer->addresses;
        $customer["contacts"] = $customer->contacts;
        return $customer;
    }

    public function createCustomer(Request $request){
        $user = Auth::user();
        $shop_id = $user->shop->id;

        $validatedData = $request->validate([
            'name' =>  'required|max:255',
            'email' =>  'nullable|email',
        ]);

        $validatedData["shop_id"] = $shop_id;

        return Customer::Create($validatedData);
    }


}
