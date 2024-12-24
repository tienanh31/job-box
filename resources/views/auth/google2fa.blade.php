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

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <span>{{ $error }}</span>
                                                @endforeach
                                            </div>
                                        @endif

                                        {{ __('Enter the pin from Google Authenticator app:') }}<br/><br/>

                                        <form class="form-horizontal" action="{{ route('verify2fa') }}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <x-admin.input
                                                    :label="__('One Time Password')"
                                                    type="text"
                                                    class="form-control"
                                                    id="one_time_password"
                                                    name="one_time_password"
                                                    :placeholder="__('Enter one time password')"
                                                    required
                                                ></x-admin.input>
                                            </div>

                                            <div class="hstack gap-2 justify-content-end">
                                                <x-button
                                                    class="btn btn-primary"
                                                    type="submit">{{ __('Authenticate') }}</x-button>
                                            </div>
                                        </form>
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
