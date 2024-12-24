<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Disable2faRequest;
use App\Models\TwoFactorAuthentication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use PragmaRX\Google2FAQRCode\Google2FA;

class TwoFactorAuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show2faForm(): View
    {
        $user = Auth::user();
        $google2faUrl = '';

        if($user->twoFactorAuthentication()->exists()) {
            $google2fa = new Google2FA();
            $google2faUrl = $google2fa->getQRCodeInline(
                'Job Box',
                $user->email,
                $user->twoFactorAuthentication->secret_key
            );
        }

        $data = [
            'user' => $user,
            'google2fa_url' => $google2faUrl
        ];

        return view('auth.2fa', [
            'data' => $data,
        ]);
    }

    public function generate2faSecret(): RedirectResponse
    {
        $google2fa = new Google2FA();

        TwoFactorAuthentication::updateOrCreate(
            [
            'user_id' => Auth::id(),
        ],
            [
            'is_enable' => 0,
            'secret_key' => $google2fa->generateSecretKey(),
        ]
        );

        return redirect()
            ->route('show2faForm')
            ->with('success', trans('Secret Key is generated, Please verify Code to Enable 2FA'));
    }

    public function enable2fa(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $google2fa = app('pragmarx.google2fa');
        $secret = $request->input('verify-code');
        $valid = $google2fa->verifyKey($user->twoFactorAuthentication->secret_key, $secret);
        if(!$valid) {
            return redirect()
                ->route('show2faForm')
                ->with('error', trans('Invalid Verification Code, Please try again.'));
        }

        $user->twoFactorAuthentication->is_enable = 1;
        $user->twoFactorAuthentication->save();

        return redirect()
            ->route('show2faForm')
            ->with('success', __('2FA is Enabled Successfully.'));
    }

    public function disable2fa(Disable2faRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        if (!(Hash::check($validatedData['current-password'], Auth::user()->password))) {
            return redirect()
                ->back()
                ->with('error', trans('Your  password does not matches with your account password. Please try again.'));
        }

        $user = Auth::user();
        $user->twoFactorAuthentication->is_enable = 0;
        $user->twoFactorAuthentication->save();

        return redirect()
            ->route('show2faForm')
            ->with('success', trans('2FA is now disabled.'));
    }

    public function verify2fa(): RedirectResponse
    {
        return redirect('/');
    }
}
