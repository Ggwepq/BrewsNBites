<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminAuthController extends Controller
{

    // Handles Log in and Log out result from user

    public function showLoginForm(){
        return Inertia::render('Admin/Auth/Login');
    }

    public function login(Request $request){
        // Check if user is admin and redirect accordingly
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => true])){
            return redirect()->route('admin.dashboard'); // Return to main dashboard
        }

        return redirect()->route('admin.login')->with('error', 'Invalid Credentials.');
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }
}
