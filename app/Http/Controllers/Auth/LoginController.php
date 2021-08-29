<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Session;

class LoginController extends Controller
{
    //

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'  => 'required|string|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect('/');
        }

        return redirect()
                        ->back()
                        ->withInput()
                        ->with('error', 'Login details are not valid');
    }

    public function logOut(){
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
