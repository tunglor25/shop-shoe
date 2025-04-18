<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //test connect api
    public function index()
    {
        return response()->json(User::all());
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        //so sánh email và password
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email or password is incorrect'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;// tạo token cho user
        return response()->json([
            'token' => $token,
            'user' => $user,
        ], 200);
    }
}
