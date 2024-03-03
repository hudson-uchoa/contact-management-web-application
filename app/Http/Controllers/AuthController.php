<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;

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
        try{
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
        
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        
            return redirect()->route('login')->with('success', 'User registered successfully!');
        }catch (ValidationException $e){
            return redirect()->back()->withErrors($e->validator->getMessageBag())->withInput();
        }catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
