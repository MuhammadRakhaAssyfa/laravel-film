<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function user()
    {
        if (Auth::check()) {
            return view('dashboard.user');
        }

        return redirect()->route('login.login')
            ->withErrors([
                'notif' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    public function admin()
    {
        if (Auth::check()) {
            return view('dashboard.admin');
        }

        return redirect()->route('login.login')
            ->withErrors([
                'notif' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }
}