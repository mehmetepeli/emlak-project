<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'agent' => 'required|string',
            'client' => 'required|string',
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'agent' => $fields['agent'],
            'client' => $fields['client'],
            'name' => $fields['name'],
            'surname' => $fields['surname'],
            'email' => $fields['email'],
            'phone' => $fields['phone'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check correct email
        $user = User::where('email', $fields['email'])->first();

        // Check correct password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Check your email and password !'
            ], 401);
        }

        $token = $user->createToken('token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Success logout'
        ];
    }
}
