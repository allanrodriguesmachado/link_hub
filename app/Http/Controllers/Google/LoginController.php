<?php

declare(strict_types=1);

namespace App\Http\Controllers\Google;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class LoginController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->email],
                [
                    'name' => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt(Str::random(24)),
                ]
            );

            Auth::login($user);

            return to_route('user.dashboard');
        } catch (InvalidStateException $exception) {
            return to_route('auth.login')->with('error', 'Sessão expirada ou solicitação inválida. Tente novamente.');
        }
    }
}
