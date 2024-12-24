@extends('layouts.auth')

@section('content')
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="row g-0">

                            @include('auth.partials.slider')

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text-primary">{{ __('Two Factor Authentication') }}</h5>
                                    </div>

                                    <div class="mt-4">
                                        <p>{{ __('Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.') }}</p>
                                        <br/>
                                        <p>{{ __('To Enable Two Factor Authentication on your Account, you need to do following steps') }}</p>
                                        <strong>
                                            <ol>
                                                <li>{{ __('Click on Generate Secret Button , To Generate a Unique secret QR code for your profile') }}</li>
                                                <li>{{ __('Verify the OTP from Google Authenticator Mobile App') }}</li>
                                            </ol>
                                        </strong>
                                        <br/>

                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if(! $data['user']->twoFactorAuthentication)
                                            <form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">
                                                @csrf

                                                <div class="form-group">
                                                    <div class="col-md-12 col-md-offset-4">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <x-button type="submit" class="btn btn-primary">
                                                                {{ __('Generate Secret Key to Enable 2FA') }}
                                                            </x-button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @elseif(! $data['user']->twoFactorAuthentication->is_enable)
                                            <strong>{{ __('1. Scan this barcode with your Google Authenticator App:') }}</strong><br/>
                                            {!! $data['google2fa_url'] !!}
                                            <br/><br/>
                                            <strong>{{ __('2. Enter the pin the code to Enable 2FA') }}</strong><br/><br/>
                                            <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
                                                @csrf

                                                <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <x-admin.input
                                                            :label="__('Authenticator Code')"
                                                            id="verify-code"
                                                            type="password"
                                                            class="form-control"
                                                            name="verify-code"
                                                            :placeholder="__('Enter authenticator code')"
                                                            required></x-admin.input>

                                                        @if ($errors->has('verify-code'))
                                                            <span class="help-block">
                                                                        <strong>{{ $errors->first('verify-code') }}</strong>
                                                                    </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-12 col-md-offset-4">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <x-button type="submit" class="btn btn-primary">
                                                                {{ __('Enable 2FA') }}
                                                            </x-button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @elseif($data['user']->twoFactorAuthentication->is_enable)
                                            <div class="alert alert-success">
                                                {{ __('2FA is Currently Enabled for your account.') }}
                                            </div>
                                            <p>{{ __('If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.') }}</p>
                                            <form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
                                                @csrf

                                                <div class="form-group">
                                                    <div class="col-lg-12">
                                                        <x-admin.input
                                                            :label="__('Current Password')"
                                                            id="current-password"
                                                            type="password"
                                                            class="form-control"
                                                            name="current-password"
                                                            :placeholder="__('Enter current password')"
                                                            required></x-admin.input>

                                                        @if ($errors->has('current-password'))
                                                            <span class="help-block">
                                                                        <strong>{{ $errors->first('currentPassword') }}</strong>
                                                                    </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-offset-5">
                                                    @csrf

                                                    <div class="hstack gap-2 justify-content-end">
                                                        <x-button
                                                            type="submit"
                                                            class="btn btn-primary ">{{ __('Disable 2FA') }}</x-button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
