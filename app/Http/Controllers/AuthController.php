<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function showRegisterPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );

        $user = User::create(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role', 'user'),
            ]
        );

        if($request->has('role'))
        {
            $user->markEmailAsVerified();
        }

        return redirect()->back()->with('success', 'Registered successfully');
    }

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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPage');
    }

    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'min:8', 'confirmed'],
            ]
        );

        $user = Auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('profile')->with('success', 'Password updated successfully.');
    }
}
