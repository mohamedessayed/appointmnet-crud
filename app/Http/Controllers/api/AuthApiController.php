<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\ApiResposeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    //

    function login(Request $request): JsonResponse
    {

        $validation = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns|exists:users,email',
            'password' => 'required|string|min:8'
        ]);

        if ($validation->fails()) {
            # code...
            return ApiResposeService::onError('login error', $validation->errors());
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            # code...

            $user = Auth::user();
            $token = $user->createToken('Api Token')->accessToken;

            return ApiResposeService::onSuccess(["token" => $token]);
        }

        return ApiResposeService::onError("data does not meet any recoeds");
    }
}
