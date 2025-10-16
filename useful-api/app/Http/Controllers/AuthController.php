<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthValidateRequest;

class AuthController extends Controller
{
    public function register(AuthValidateRequest $request) {
        $user = User::create($request->validated());

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at,
        ], 201);
    }

    public function login(Request $request) {

        $incomingFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($incomingFields)) {
            return response()->json([
                'response_code' => 401,
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user_id' => $user->id,
        ], 200);
    }

    public function logout() {

    }
}
