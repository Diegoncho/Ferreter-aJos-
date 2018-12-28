<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Alert;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest',['only' => 'showLoginForm']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        $credentials = $this->validate(request(), [
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials))
        {
            return redirect()->route('menu');
        }
        
        return back()
            ->withErrors([$this->username() => trans('auth.failed')])
            ->withInput(request([$this->username()]));
    }

    public function logout()
    {
        Auth::logout();

        \Session::flash('message-logout', 'La sesión ha sido finalizada.');

        return redirect('/');
    }

    public function username()
    {
        return 'name';
    }
}
