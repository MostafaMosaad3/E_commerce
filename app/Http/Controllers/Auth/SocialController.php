<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function index($provider)
    {
        $user = Auth::user() ;
        $token = $user->provider_token ;


        $provider_user = Socialite::driver($provider)->userFromToken($token);

        dd($provider_user) ;
    }
}
