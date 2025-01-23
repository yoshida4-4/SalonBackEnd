<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function login(Request $request)
    {
        // バリデーション
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 認証試行
        if (Auth::attempt($credentials)) {
            // 認証成功
            $request->session()->regenerate();
            $user = Auth::user();
            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                // 'token' => $user->createToken('authToken')->plainTextToken, // Sanctumトークン（オプション）
            ], 200);
            // return true;
        }

        // 認証失敗
        return response()->json([
            'message' => 'Invalid email or password',
        ], 401);
        // return false;
    }
}
