<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function register(Request $request): JsonResponse
    {
       // dd("i ");
//        $request->validate([
//            'name' => 'required|string',
//            'email' => 'required|string',
//            'password' => 'required|string'
//       ]);
        //dd($request->all());
        $response = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
         return $this->okResponse("Registration successful", $response);
    }

    public function login()
    {

        $cred = $request->only(['email', 'password']);

        if (!$token = JWTAuth::attempt($cred)) {
            return $this->notFoundAlert(
                'incorrect login details');

        }else {
            $user = auth()->user()->load('userDetails');
            $auth_user = Auth::user()->load('roles');

            if (is_null($user->email_verified_at)) {
                return $this->badRequestAlert(
                    'You are yet to verify your email address');
            }
            return JSON(200, [
                $token,
               $auth_user
            ]);
        }
    }
}
