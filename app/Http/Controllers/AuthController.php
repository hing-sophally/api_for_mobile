<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
     public function registerApi(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
    ]);

    if ($validator->fails()) {
        // Check if email is taken
        if ($validator->errors()->has('email')) {
            return response()->json([
                'message' => 'This email is already registered. Please login or use a different email.'
            ], 409); // 409 Conflict is semantically good for "already exists"
        }

        // Other validation errors
        return response()->json([
            'message' => $validator->errors()->first()
        ], 422);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json([
        'message' => 'Registered successfully',
        'user' => $user,
    ], 201);
}
    public function loginApi(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => $validator->errors()->first()
        ], 422);
    }

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    return response()->json([
        'message' => 'Logged in successfully',
        'user' => $user,
    ], 200);

}
}s
