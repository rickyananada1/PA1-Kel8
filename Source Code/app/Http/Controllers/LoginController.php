<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended($this->redirectTo());
        }
    
        $errors = [];
        
        if (!User::where('email', $request->email)->exists()) {
            $errors['email'] = 'Email salah';
        }
    
        if (User::where('email', $request->email)->exists() && !Auth::attempt($credentials)) {
            $errors['password'] = 'Password salah';
        }
    
        return redirect()->back()->withErrors($errors)->withInput();
    }
    
    protected function redirectTo()
    {
        $role = Auth::user()->role;
    
        if ($role === 'admin') {
            return '/admin-home';
        } elseif ($role === 'pelanggan') {
            return '/';
        }
    }



    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
