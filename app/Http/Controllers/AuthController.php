<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess(AuthLoginRequest $request)
    {
        $validate = $request->validated();

        $validate = $request->safe()->except(['_token']);

        try {
            if (!Auth::attempt(['email' => $validate['email'], 'password' => $validate['password']])) {
                Log::warning('Login Failed', ['email' => $validate['email']]);
                return redirect()->route('login')->with('error', 'Email / Password salah.');
            }

            $request->session()->put('login_time', now());
            return redirect()->route('dashboard')->with('message', 'Login sukses');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
