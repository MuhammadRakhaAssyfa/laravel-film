<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // tampilkan form login
    public function login()
    {
        return view('auth.login');
    }

    // cek email dan password
    public function authenticate(StoreAuthRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            if (auth()->user()->role_id == 1) {
                return redirect()->route('dashboard.user');
            } else {
                return redirect()->route('dashboard.admin');
            }
        }

        return back()->withErrors([
            'notif' => 'Credential do not match with our records',
        ])->onlyInput('email');
    }

    // keluar dari sistem
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.login')->withSuccess('Anda Telah Keluar Dari Sistem');
    }
}