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
        
        $users = $query->get();
        
        return view('users', compact('users'));
    }
}
