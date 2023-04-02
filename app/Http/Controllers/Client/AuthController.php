<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('client.auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $remember = $request->remember ? true : false;
        if (Auth::guard('web')->attempt($credentials, $remember)) {
            return redirect(route('client.home'));
        }
        return back()->withErrors(['email' => trans('errors.auth.account.not_found')]);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect(route('client.login'));
    }
}
