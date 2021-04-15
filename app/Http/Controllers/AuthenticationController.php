<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Wallet\Bitcoin\RegisterRequest;

class AuthenticationController extends Controller
{
    public function doctorRegister(RegisterRequest $request)
    {
        $response = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

         return $this->okResponse("Registration successful", $response);
    }

    public function healthSeekerRegister(RegisterRequest $request)
    {
   
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
