<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.user_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authenticated
            if (!Auth::user()->is_admin) {
                return redirect()->intended('/user/update-password');
            } else {
                Auth::logout();
                return redirect()->route('user.login')->withErrors('Only users can login here.');
            }
        }

        return redirect()->back()->withErrors('Login details are not valid');
    }
}
