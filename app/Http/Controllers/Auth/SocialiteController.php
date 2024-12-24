<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect(string $provider): RedirectResponse
    {
        if (!$this->catchError($provider)) {
            abort(404, trans('Page Not Found'));
        }

        return Socialite::driver($provider)->redirect();
    }

    protected function catchError(string $provider): bool
    {
        if (!in_array($provider, ['github', 'google', 'facebook'])) {
            return false;
        }

        return true;
    }

    public function callback(string $provider): RedirectResponse|string
    {
        try {
            $socialAccount = Socialite::driver($provider)->user();

            $user = User::updateOrCreate([
                'email' => $socialAccount->getEmail(),
            ], [
                'email' => $socialAccount->getEmail(),
                'provider_id' => $socialAccount->getId(),
                'auth_type' => $provider,
                'status' => 'Is Active',
                'password' => Hash::make(Str::random(10)),
                'email_verified_at' => Carbon::now(),
            ]);

            $user->assignRole([
                'name' => 'Student',
            ]);

            Auth::login($user);

            return redirect('/');
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
