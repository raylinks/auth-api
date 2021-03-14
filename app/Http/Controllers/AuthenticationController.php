<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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
}
