<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            $token = JWTAuth::attempt($credentials);
            if (!$token) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json(compact('user', 'token'));
    }

    public function getCurrentUser()
    {
        $user = JWTAuth::parseToke()->authenticate();
        return response()->json(compact('user'));
    }
}
