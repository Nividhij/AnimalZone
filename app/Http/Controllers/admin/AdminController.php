<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use APP\http\Middleware\AdminMiddleware;
use Hash;
use Auth;

class AdminController extends Controller
{
    public function showlogin()
    {
        
        return view('admin.login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);

        
        $credentials = array(
            'email' => $request->email,
            'password' => $request->password,
            

        );

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
        
            if ($user && intval($user->role) === 1) {
                Auth::logout();
                return redirect()->back()->with('error', 'Invalid Email And Password');
            }
            return redirect()->route('admin.dashboard');
        }
       
    }

    public function logout()
    {
        Auth::logout();
        return view('admin.login');
    }



    
}
