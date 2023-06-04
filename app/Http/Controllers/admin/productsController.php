<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
class productsController extends Controller
{
    // create product ..
    public function create(){
        $categories = category::all();
        return view('admin.products.create',compact('categories'));
    }
    // save 
    public function save(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category' => 'required'
        ]);
        $imageName = time().".".$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product = new product;
        $product->title = $request->title;
        $product->image = $imageName;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category;
        $product->save();
        return redirect()->back()->with('message','Product Created Succesfully');

    }
    // products ..
    public function products(){
        $products = product::orderby('id','desc')->get();
        return view('admin.products.products',compact('products'));
    }
}
