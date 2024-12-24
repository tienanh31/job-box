<div>
    <x-admin.card>
        <x-form wire:click.prevent="updatePassword">
            <div class="row g-2">
                <div class="col-lg-4">
                    <div>
                        <x-admin.input
                            label="{{ __('Old Password') }}"
                            class="form-control"
                            type="password"
                            name="oldPassword"
                            model="oldPassword"
                            id="oldPassword"
                            placeholder="{{ __('*****************') }}"
                            required
                        >
                        </x-admin.input>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div>
                        <x-admin.input
                            label="{{ __('Password') }}"
                            class="form-control"
                            type="password"
                            name="password"
                            model="password"
                            id="password"
                            placeholder="{{ __('*****************') }}"
                            required
                        >
                        </x-admin.input>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div>
                        <x-admin.input
                            label="{{ __('Password Confirmation') }}"
                            class="form-control"
                            type="password"
                            name="confirmPassword"
                            model="confirmPassword"
                            id="confirmPassword"
                            placeholder="{{ __('*****************') }}"
                            required
                        ></x-admin.input>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="text-end">
                        <x-button
                            type="submit"
                            class="btn btn-primary">{{ __('Change Password') }}</x-button>
                    </div>
                </div>
            </div>
        </x-form>

        <div class="mt-4 mb-3 border-bottom pb-2">
            <h5 class="card-title">{{ __('Two Factor Authentication') }}</h5>
        </div>

        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('show2faForm') }}" class="link-danger" target="_blank"><strong>{{ __('Click Here To Setting 2FA') }}</strong></a>
        </div>

        <div class="mt-4 mb-3 border-bottom pb-2">
            <h5 class="card-title">{{ __('Login History') }}</h5>
        </div>
        @foreach(Auth::user()->authentications as $log)
            <div class="d-flex align-items-center mb-3">
                <div class="flex-shrink-0 avatar-sm">
                    <div class="avatar-title bg-light text-primary rounded-3 fs-18">
                        <i class="ri-smartphone-line"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6>{{ $log->user_agent }}</h6>
                    @if($log->login_at)
                        <p class="text-muted mb-0">{{ __('Login at: :at, with IP address: :ip', ['at' => BaseHelper::dateFormat($log->login_at), 'ip' => $log->ip_address]) }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </x-admin.card>
</div>
