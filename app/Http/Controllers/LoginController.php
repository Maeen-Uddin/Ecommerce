<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback(Request $request)
    {
        $user = Socialite::driver('github')->user();

        // Return home after login
        // return->back('/view_category');
    }
}
