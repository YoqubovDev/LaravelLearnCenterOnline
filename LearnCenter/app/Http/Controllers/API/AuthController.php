<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = $request->validate([
            'full_name' => 'required|min:2|string',
            'password' => 'required|min:4|string|confirmed',
            'phone_number' => 'required|max:15|string|phoneNumber',
            'status' => 'required|ENUM:active,inactive',
            'role_id' => 'required|exists:roles,id',
        ]);
        $user = User::query()->create($validator);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'user' => $user,
            'token' => $token],
            'Successfully Registered');
    }

    public function login(Request $request)
    {
        $validator = $request->validate([
            'phone_number' => 'required|max:15|string|phoneNumber',
            'password' => 'required|min:4|string',
        ]);

        $phone_number = $validator['phone_number'];
        $password = $validator['password'];

        $user = User::query()->where('phone_number', $phone_number)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json([
                'error' => 'The provided credentials are incorrect.'],
                401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'message' => 'Successfully Logged In'],
            201);

    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully Logged Out']
        );
    }

}
