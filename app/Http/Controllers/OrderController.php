<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function createOrder(Request $request){
        
        $validatedData = $request->validate([
            'customer_id' =>  '',
            'address_id' =>  '',
            'items' =>  'required',
            'delivery_fees' =>  '',
            'type' => 'required|in:takeaway,delivery,indoor',
        ]);

        // init total 
        $total = 0;

        $items = json_decode($request->input("items"), true);

        // for calculate the total
        foreach ($items as $key => $item) {
            $product = Product::find($item["product_id"]);
            $quantity = $item["quantity"];
            $total += $product->price * $quantity;
        }

        $validatedData["total"] = $total;

        $user = Auth::user();
        $shop_id = $user->shop->id;


        unset($validatedData["items"]);
        $validatedData["shop_id"] = $shop_id;
        $validatedData["user_id"] = $user->id;

        $order = Order::create($validatedData);

        // create item for database
        foreach ($items as $key => $item) {

            $product = Product::find($item["product_id"]);
            $order_item = OrderItem::create([
                "cost" => $product->cost,
                "price" => $product->price,
                "product_id" => $item["product_id"],
                "quantity" => $item["quantity"],
                "order_id" => $order->id
            ]);

        }
        

        return $order;
    }

}
