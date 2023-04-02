<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $remember = !!$request->remember;
        if (!Auth::guard('admin')->attempt($credentials, $remember)) {
            return back()->withErrors(['email' => trans('validation.custom.auth.account_not_found')])->withInput();
        }
        return redirect(route('admin.home'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
