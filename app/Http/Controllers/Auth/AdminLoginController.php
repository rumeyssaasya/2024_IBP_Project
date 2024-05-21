<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authenticated
            if (Auth::user()->is_admin) {
                return redirect()->intended('/admin/user-management');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors('Only admins can login here.');
            }
        }

        return redirect()->back()->withErrors('Login details are not valid');
    }
}
