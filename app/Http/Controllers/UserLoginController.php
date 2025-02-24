<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;





class UserLoginController extends Controller
{
    public function singup(Request $request){
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $users = new User;
        $users->name = $request->user_name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->role = '1';
        $users->save();
        return redirect()->back()->with('success','Registration Successful.');
    }


    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $check = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        if (Auth::attempt($check)) {
            $user = Auth::user(); // Get the currently authenticated user
        
            if ($user && intval($user->role) === 0) { 
                Auth::logout();
                return redirect()->back()->with('error', 'Invalid Email And Password');
            }
            return redirect()->route('home');
        }
        return redirect()->back()->with('error','Invalid Email And Password');
    }
}