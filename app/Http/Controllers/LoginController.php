<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function __construct()
    {
        parent::__construct("login", null);
    }

    public function index()
    {
        return view($this->getViewIndex());
    }

    public function authenticate(LoginFormRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('web')->attempt($credentials, false)) {
            return redirect()->intended('admin');
        }
        return back()->withErrors([
            'email' => 'E-mail inválido',
            'password' => 'Senha inválida'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
