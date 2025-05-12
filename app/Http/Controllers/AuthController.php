<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|max:255'
        ]);
        
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        Auth::login($user);

        return response("Succesfully logged in", 201);
    } 


    public function login(Request $request){
        $validated = $request->validate([
            'email'     => 'required|string',
            'password' => 'required|string'
        ]);    
        
        $user = User::where('email', $validated['email'])->first();
        
        if(!$user || !Hash::check($validated['password'], $user->password)){
            throw ValidationException::withMessages([
                "Invalid Username or Password"
            ]);
        }
        Auth::login($user);
        $request->session()->regenerate();

        return response()->json(['token'], 200);
    }

    public function logout(){

    }
}
