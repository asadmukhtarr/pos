<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class pagesController extends Controller
{
    // dashboard
    public function dashboard(){
        return view('admin.dashbaord');
    }
    // for categories
    public function categories(){
        $categories = category::orderby('id','desc')->get();
        return view('admin.categories.categories',compact('categories'));
    }
    // save ..
    public function category_save(Request $request){
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        $category = new category;
        $category->name = $request->name;
        $category->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }
    // save category
    public function delete_category($id){
        $category = category::find($id);
        $category->delete();
        return redirect()->back()->with('warning','Category Deleted Successfully');
    }

    public function settings(){
        return view('admin.settings');
    }
}
