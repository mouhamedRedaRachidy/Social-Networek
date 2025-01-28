<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('login.login');
    }

    public function login(loginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //dd(auth::user()->bio);
            return to_route('homepage')->with('success', 'Login success '.auth::user()->name);
        } else {
            return back()->withErrors([
                'email' => 'email or password inncorect'
            ])->onlyInput('email');
        };
    }

    public function logout()
    {
        session()->flush();

        return to_route('login.show');
    }
}
