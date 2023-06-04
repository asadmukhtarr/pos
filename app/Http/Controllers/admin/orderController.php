<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\customer;
use App\Models\order;
use App\Models\order_product;
class orderController extends Controller
{
    //
    public function create(){
        $product = product::where('quantity','>',0)->get();
        return view('admin.orders.create',compact('product'));
    }
    // for place order
    public function place(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);
        $product = $request->product_id; // product id 
        $qty = $request->qty;
        $total = 0;
        foreach($product as $index => $product_id){
            $product = product::find($product_id);
            $q = $qty[$index];
            $total_price = $product->price * $q;
            $total = $total + $total_price;
            //echo 'Quanityt of '.$qty[$index].' is product '.$product_id.'<br />';
        }
        $exist_cutomer = customer::where('email',$request->email)->where('phone',$request->phone)->first();
        if(empty($exist_cutomer)){
             // create customer first
            $customer = new customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->save();
            $customer_id = $customer->id;
        } else {
            $customer_id = $exist_cutomer->id;
        }
        $order = new order;
        $order->customer_id = $customer_id;
        $order->total = $total;
        $order->status = 1;
        $order->save();
        $order_id = $order->id;
        $n = sizeof($request->product_id);
        $oproduct = $request->product_id;
        $oqty = $request->qty;
        for ($i=0; $i<$n ; $i++) { 
            # code...
            $product_order = new order_product;
            $product_order->order_id = $order_id;
            $product_order->product_id = $oproduct[$i];
            $product_order->qty = $oqty[$i];
            $product_order->price = $product->price;
            $product_order->total = $total_price;
            $product_order->save();
        }
        return redirect()->back()->with('message','Order has beed placed');

    }
    // mul ..
    public function mul($a,$b){
        $c = $a * $b;
        return $c;
    }
    
}
