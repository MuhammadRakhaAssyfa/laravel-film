<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\{
    User,
    Profile,
};

class RegisterController extends Controller
{
    // form registrasi
    public function create()
    {
        return view('auth.register');
    }

    // simpan data registrasi
    public function store(StoreRegisterRequest $request)
    {
        $profile = new Profile;
        $profile->umur = $request->age;
        $profile->bio  = $request->bio;
        $profile->alamat = $request->alamat;
        $profile->save();

        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'profile_id'    => $profile->id,
            'role_id'       => 1,
        ]);

        return redirect()->route('login.login');
    }
}