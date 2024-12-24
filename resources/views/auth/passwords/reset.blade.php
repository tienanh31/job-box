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
                                        <h5 class="text-primary">{{ __('Reset Password') }}</h5>
                                    </div>

                                    <div class="mt-4">
                                        <x-form method="POST" action="{{ route('password.update') }}">
                                            <input type="hidden" name="token" value="{{ $token }}">

                                            <x-admin.input
                                                label="{{ __('Email') }}"
                                                class="form-control"
                                                type="email"
                                                name="email"
                                                model="email"
                                                id="email"
                                                placeholder="{{ __('Enter your email') }}"
                                                value="{{ $email }}"
                                                readonly
                                                required
                                            ></x-admin.input>

                                            <x-admin.input
                                                label="{{ __('Password') }}"
                                                class="form-control"
                                                type="password"
                                                name="password"
                                                model="password"
                                                id="password"
                                                placeholder="{{ __('************************') }}"
                                                required
                                            >
                                            </x-admin.input>

                                            <x-admin.input
                                                label="{{ __('Password Confirmation') }}"
                                                class="form-control"
                                                type="password"
                                                name="password_confirmation"
                                                model="password_confirmation"
                                                id="password_confirmation"
                                                placeholder="{{ __('************************') }}"
                                                required
                                            ></x-admin.input>

                                            <div class="mt-4">
                                                <x-button
                                                    class="btn btn-success w-100"
                                                    type="submit">{{ __('Reset Password') }}
                                                </x-button>
                                            </div>
                                        </x-form>
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
