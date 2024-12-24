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
                                        <h5 class="text-primary">{{ __('Please confirm your password before continuing.') }}</h5>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-secondary" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <div class="mt-4">
                                        <x-form method="POST" action="{{ route('password.confirm') }}">
                                            <x-admin.input
                                                label="{{ __('Password') }}"
                                                class="form-control"
                                                type="password"
                                                name="password"
                                                model="password"
                                                id="password"
                                                placeholder="{{ __('Enter your password') }}"
                                                required
                                            ></x-admin.input>

                                            <div class="mt-4">
                                                <x-button
                                                    class="btn btn-success w-100"
                                                    type="submit">{{ __('Confirm Password') }}
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
