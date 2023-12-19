<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Routing\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'Some Error Message'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        $user = auth('api')->user();
        return $this->respondWithToken($user, $token);
    }

    public function register(UserRequest $request)
    {
        try {
            $req_data = $request->only([
                'name',
                'email',
                'password'
            ]);
            $data = new User($req_data);
            $data->save();

            return UserResource::make($data);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'log' => $e->getMessage()
            ], 500);
        }
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($user, $token)
    {
        return response()->json([
            'data' => [
                'user' => [
                    'name' => $user->name,
                    'mail' => $user->email,
                ],
                'access_token' => $token,
                'expires_in' => auth()->factory()->getTTL() * 60
            ]

        ]);
    }
}
