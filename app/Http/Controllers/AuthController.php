<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function showLoginPage()
    {
        return view('login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]
        );
 
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $user = Auth::user();

            if(!$user->hasVerifiedEmail())
            {
                Auth::logout();
                return back()->withErrors(['email' => 'Your email address is not verified.'])->onlyInput('email');
            }
            
            if($user->bannedTill && Carbon::now()->lt($user->bannedTill))
            {
                Auth::logout();
                return back()->withErrors(['email' => 'Your account has been banned until ' . $user->bannedTill])->onlyInput('email');
            }

            return redirect()->route('home');
        }
 
        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->onlyInput('email');
    }
}
