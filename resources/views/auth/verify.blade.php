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
                                        <h5 class="text-primary">{{ __('Verify Your Email Address') }}</h5>
                                        <p class="text-muted">
                                            {{ __('Before proceeding, please check your email for a verification link.') }}
                                            {{ __('If you did not receive the email') }},
                                        </p>
                                    </div>

                                    @if (session('resent'))
                                        <div class="alert alert-secondary" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif

                                    <div class="mt-4">
                                        <x-form method="GET" action="{{ route('verification.resend') }}">
                                            <div class="mt-4">
                                                <x-button
                                                    class="btn btn-success w-100"
                                                    type="submit">{{ __('click here to request another') }}
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
