<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{

    public function createContact(Request $request){

        $validatedData = $request->validate([
            'phone' =>  'required|max:255',
            'customer_id' =>  'required',
        ]);

        return Contact::Create($validatedData);
    }

}
