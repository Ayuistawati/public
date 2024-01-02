<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('register.form')
                             ->withErrors($validator)
                             ->withInput();
        }
    
        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));
    
        $token = $user->createToken('authToken')->accessToken;
    
        return view('beranda', ['token' => $token, 'user' => $user]);
    }
    
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('authToken')->accessToken;

            // Redirect to welcome.blade.php after login
            return view('beranda', ['token' => $token, 'user' => $user]);
        }

        return redirect()->route('login.form')
                         ->withErrors(['message' => 'Invalid credentials'])
                         ->withInput();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');


        return view('beranda')->with('message', 'Successfully logged out');
    }
}

