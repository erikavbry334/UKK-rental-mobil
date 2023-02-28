<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    public function indexDashboard()
    {
        return view('auth.DashboardLogin', ['title' => 'Login']);
    }

    public function store(Request $request)
    {
            $credentials = $request->validate([
                'email' => ['required'],
                'password' => ['required'],
            ]);            
     
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                if (auth()->user()->level === 'admin') {
                    return redirect('/dashboard');
                }
                return redirect('/');
            }
     
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
    }

    public function logout(Request $request)
{
    // $level = auth()->user()->level;
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    // return $level == 'admin' ? redirect('/dashboard/login') : redirect('/');
    return redirect('/');
}
}
