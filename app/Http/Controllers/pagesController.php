<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class pagesController extends Controller
{
    // home ..
    public function home(){
        return view('welcome');
    }
    public function login(){
        return view('login');
    }
    // for register
    public function register(){
        return view('register');
    }
    // register save
    public function register_save(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect(route('login'))->with('message','Thanks For Sign Up Login Here Please');
    }
    // login here
    public function login_here(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication was successful...
            return redirect(route('admin.dashbaord'));
        } else {
            return redirect()->back()->with('message','Email or password is wrong! Please Try Again');
        }
    }
    public function logout(){
            Auth::logout();
        return redirect(route('login'))->with('message','Thanks For Use POS');
    }
}
