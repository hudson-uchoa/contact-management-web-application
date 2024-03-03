<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if(Auth::attempt($credentials)) {
            return redirect()->intended('/home');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }
    
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
    public function register (Request $request)
    {
        //Lógica de registro de usuário
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
