<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        dd('Hello');
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
            'password' => Hash::make($request->password)
        ]);

         return $this->okResponse("Registration successful", $response);
    }

    public function login(Request $request)
    {
        $cred = $request->only(['email', 'password']);

        $user = User::where('email', $request->email)->first();
        if(!$user ||  !Hash::check($request->password, $user->password)){
            return $this->notFoundResponse("The credentials do not match our record ", $user);
        }
        $token  = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return $this->okResponse("Login successful", $response);
    }
}
