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
        // Periksa apakah sudah ada pengguna terdaftar
        $existingUser = User::first();
        if ($existingUser) {
            return redirect()->route('register.form')
                             ->withErrors(['message' => 'Registrasi tidak diizinkan. Sudah ada satu pengguna yang terdaftar.'])
                             ->withInput();
        }

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
        // Periksa apakah sudah ada pengguna yang login
        if (Auth::check()) {
            return redirect()->route('beranda')->withErrors(['message' => 'Sudah login.']);
        }

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('authToken')->accessToken;

            // Redirect ke welcome.blade.php setelah login
            return view('beranda', ['token' => $token, 'user' => $user]);
        }

        return redirect()->route('login.form')
                         ->withErrors(['message' => 'Kredensial tidak valid'])
                         ->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('message', 'Berhasil logout');
    }
}
