<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->input('tab') ?? 'active';
        
        $query = User::where('id', '!=', Auth::id());
        
        if($tab == 'active')
        {
            $query->whereNotNull('email_verified_at')->whereNull('bannedTill')->orWhere('bannedTill', '<', now());
        }
        elseif($tab == 'pending')
        {
            $query->whereNull('email_verified_at');
        }
        elseif($tab == 'banned')
        {
            $query->whereNotNull('bannedTill')->where('bannedTill', '>', now());
        }
        elseif($tab == 'moderators')
        {
            $query->where('role', 'moderator');
        }
        
        $users = $query->get();
        
        return view('users', compact('users'));
    }

    public function approve(Request $request)
    {
        $user = User::findOrFail($request->input('id'));
        $user->markEmailAsVerified();

        $message = "Email '" . $user->email . "' successfully verified!";

        return redirect()->back()->with('success', $message);
    }

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required']);

        $user = User::findOrFail($request->input('id'));
        $user->delete();

        $message = "Moderator '" . $user->email . "' successfully deleted!";

        return redirect()->back()->with('success', $message);
    }
}
