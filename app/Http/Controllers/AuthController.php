<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->assignRole('Operator');

        Auth::login($user);

        return redirect()->route('operator.dashboard');
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::check() && Auth::user()->hasRole('Admin')) {
                return redirect('/admin');
            }
            return redirect()->route('operator.dashboard');
        }

        return back();
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return back();
    }
}
