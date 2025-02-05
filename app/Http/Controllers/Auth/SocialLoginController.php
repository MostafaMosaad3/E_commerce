<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect() ;
    }

    public function callback($provider)
    {
        try {
            $provider_user = Socialite::driver($provider)->user();

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $provider_user->getId()
            ])->first();

            if (!$user) {
                $user = User::create([
                    'name' => $provider_user->getName(),
                    'email' => $provider_user->getEmail(),
                    'password' => Hash::make(Str::random(8)),
                    'provider' => $provider,
                    'provider_id' => $provider_user->getId(),
                    'provider_token' => $provider_user->token,
                ]);
            }


            Auth::login($user);
            return redirect()->route('home');

        } catch (Throwable $e) {
            return redirect()->route('login');
        }
    }
}
