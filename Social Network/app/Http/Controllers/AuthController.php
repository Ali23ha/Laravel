<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Login_And_Register\LoginRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function signIn(LoginRequest $request)
    {
        $fields = $request->validated();

        if (auth()->attempt(['email' => $fields['email'], 'password' => $fields['password']])) {
            $request->session()->regenerate();
            if (auth()->user()->role_id == 1)
                return redirect()->route('Index-post-admin')->with('success-login', 'You have been logged in successfully');
            elseif (auth()->user()->role_id == 2)
                return redirect()->route('Index-post-coach')->with('success-login', 'You have been logged in successfully');
            elseif (auth()->user()->role_id == 3)
                return redirect()->route('Index-post-trainee')->with('success-login', 'You have been logged in successfully');
        }
        else
            return redirect()->back()->withErrors(['msg' => 'your credentials could not be verified']);
    }

    public function register(LoginRegisterRequest $request)
    {
        $fields = $request->validated();
        $fields['password'] = bcrypt($fields['password']);
        $user = User::create($fields);
        auth()->login($user);
        return redirect()->route('Index-post-trainee')->with('success', 'Your account has been created successfully');
    }
    public function logOut()
    {
        auth()->logout();
        return redirect()->route('Homepage')->with('success-logout', 'You have been logged out');
    }

    public function settings()
    {
        return view('pages.settings');
    }



}
