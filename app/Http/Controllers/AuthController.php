<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            return match ($user->role) {
                'admin' => redirect()->intended('/admin')
                    ->with('success', 'Đăng nhập admin thành công'),
                default => redirect()->intended('/')
                    ->with('success', 'Đăng nhập thành công')
            };
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('messageLogin', 'Đăng xuất thành công');
    }
}
