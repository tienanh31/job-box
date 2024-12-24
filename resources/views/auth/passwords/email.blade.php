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

                                    @if (session('status'))
                                        <div class="alert alert-secondary" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <div class="mt-4">
                                        <x-form method="POST" action="{{ route('password.email') }}">
                                            <x-admin.input
                                                label="{{ __('Email') }}"
                                                class="form-control"
                                                type="email"
                                                name="email"
                                                model="email"
                                                id="email"
                                                placeholder="{{ __('Enter your email') }}"
                                                required
                                            ></x-admin.input>

                                            <x-admin.input
                                                name="g_form_name"
                                                model="g_form_name"
                                                value="email_reset_password"
                                                hidden
                                            ></x-admin.input>

                                            <div class="mt-4">
                                                <x-button
                                                    class="btn btn-success w-100"
                                                    type="submit">{{ __('Send Password Reset Link') }}
                                                </x-button>
                                            </div>
                                        </x-form>
                                    </div>

                                    <div class="mt-3 text-center">
                                        <x-link
                                            to="{{ route('login') }}"
                                            class="fw-semibold text-primary text-decoration-underline">
                                            {{ __('Remember your account') }}
                                        </x-link>
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
