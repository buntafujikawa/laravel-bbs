<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
// ここがTymon\JWTAuth\JWTAuthになっててできてなかった
use JWTAuth;

class AuthenticateController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            $token = JWTAuth::attempt($credentials);
            if (!$token) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'invalid_credentials'], 500);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json(compact('user', 'token'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCurrentUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return response()->json(compact('user'));
    }

    public function logout()
    {

    }
}
