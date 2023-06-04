<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/','pagesController@login')->name('login');
Route::get('/register','pagesController@register')->name('register');
Route::post('/register','pagesController@register_save')->name('register.save');
Route::post('/login','pagesController@login_here')->name('login.here');
Route::get('/logout','pagesController@logout')->name('user.logout');
// for admin ..
Route::prefix('admin')->middleware('auth')->namespace('admin')->group(function(){
    // dashboard
    Route::get('/dashboard','pagesController@dashboard')->name('admin.dashbaord');
    // product
    Route::prefix('products')->group(function(){
        Route::get('/create','productsController@create')->name('create.product');   
        Route::post('/save','productsController@save')->name('save.products');
        Route::get('/all','productsController@products')->name('admin.products');     
    });
    // new order
    Route::prefix('order')->group(function(){
        Route::get('/create','orderController@create')->name('new.order');
        Route::post('/place','orderController@place')->name('place.order');
    });
    // category
    Route::prefix('category')->group(function(){
        Route::get('/all','pagesController@categories')->name('admin.categories');
        Route::post('/save','pagesController@category_save')->name('category.save');
        Route::get('/delete/{id}','pagesController@delete_category')->name('category.delete');
    });
   
    // settings ..
    // companis
    Route::get('/settings','pagesController@settings')->name('admin.settings');
});
