<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\category;
use App\Models\product;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/product/{id}', function($id){
    $products = product::find($id);
    return response()->json($products);
});
// for mern stack ..
Route::get('/categories',function(){
    $categories = category::orderby('id','desc')->get();
    return response()->json($categories);
});
Route::post('/categories/save',function(Request $request){
    $categories = new category;
    $categories->name = $request->name;
    $categories->save();
    $data = [
        'status' => 100,
        'message' => 'data inserted successfully'
    ];
    return response()->json($data);
});
Route::get('category/{id}',function($id){
    $categories = category::find($id);
    $categories->delete();
    $data = [
        'status' => 100,
        'message' => 'Data Deleted Successfully'
    ];
    return response()->json($data);
});

