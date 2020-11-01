<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Customer;


class AddressesContoller extends Controller
{

    public function createAddress(Request $request){

        $validatedData = $request->validate([
            'street_name' =>  'required',
            'building_number' =>  'required|max:255',
            'apartment_number' =>  'required|max:255',
            'floor_number' =>  'required|max:255',
            'notes' =>  '',
            'customer_id' =>  'required',
        ]);
        
        // return $request->input('customer_id');
        //check if the customer is exists
        $checkCustomer = Customer::find($request->input('customer_id'));

        if(!$checkCustomer) {
            return response('not found the customer', 422);
        }

        return Address::create($validatedData);

    }


}
