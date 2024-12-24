<div>
    <div class="page-content">
        <div class="container mt-5">
            <div class="row mt-n5">
                <div class="col-lg-3">
                    <x-user.user.sidebar-profile-layout></x-user.user.sidebar-profile-layout>
                </div>

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <x-form class="vertical-navs-step">
                                <div class="row gy-5">
                                    <div class="col-lg-3">
                                        <div class="nav flex-column custom-nav nav-pills">
                                            <span class="nav-link {{ $step === 1 ? 'active' : '' }} {{ $step > 1 ? 'done' : '' }}">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i> {{ __('Step :step', ['step' => 1]) }}
                                                        </span>
                                                {{ __('Contact') }}
                                            </span>

                                            <span class="nav-link {{ $step === 2 ? 'active' : '' }} {{ $step > 2 ? 'done' : '' }}">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i> {{ __('Step :step', ['step' => 2]) }}
                                                        </span>
                                                {{ __('Description') }}
                                            </span>

                                            <span class="nav-link {{ $step === 3 ? 'active' : '' }} {{ $step > 3 ? 'done' : '' }}">
                                                        <span class="step-title me-2">
                                                            <i class="ri-close-circle-fill step-icon me-2"></i> {{ __('Step :step', ['step' => 3]) }}
                                                        </span>
                                                {{ __('Finished') }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-9">
                                        <div class="px-lg-4">
                                            <div class="tab-content">
                                                <div class="tab-pane fade {{ $step === 1 ? 'show active' : '' }}">
                                                    <div>
                                                        <h5>{{ __('Your Company Info') }}</h5>
                                                        <p class="text-muted">{{ __('The information below will be provided publicly to everyone') }}</p>
                                                    </div>

                                                    <div>
                                                        <div class="row g-3">
                                                            <div class="col-sm-12 text-center">
                                                                <livewire:admin.user.modules.avatar :user="Auth::user()"></livewire:admin.user.modules.avatar>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="name"
                                                                    name="name"
                                                                    model="name"
                                                                    :label="__('Name')"
                                                                    :placeholder="__('Enter name')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="email"
                                                                    name="email"
                                                                    model="email"
                                                                    :label="__('Email')"
                                                                    :placeholder="__('Enter email')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="phone"
                                                                    name="phone"
                                                                    model="phone"
                                                                    :label="__('Phone')"
                                                                    :placeholder="__('Enter phone number')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <x-input
                                                                    type="number"
                                                                    class="form-control"
                                                                    id="founded"
                                                                    name="founded"
                                                                    model="founded"
                                                                    :label="__('Founded In')"
                                                                    :placeholder="__('Enter founded')"
                                                                ></x-input>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <x-button
                                                            wire:click="updateStep({{ 1 }})"
                                                            type="button"
                                                            class="btn btn-success btn-label right ms-auto">
                                                            <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                                            {{ __('Next Step') }}</x-button>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade {{ $step === 2 ? 'show active' : '' }}">
                                                    <div>
                                                        <h5>{{ __('Your Company Info')  }}</h5>
                                                        <p class="text-muted">{{ __('The information below will be provided publicly to everyone') }}</p>
                                                    </div>

                                                    <div>
                                                        <div class="row g-3">

                                                            <div class="col-6">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="headquarters"
                                                                    name="headquarters"
                                                                    model="headquarters"
                                                                    :label="__('Headquarters')"
                                                                    :placeholder="__('Enter headquarters')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-6">
                                                                <x-input
                                                                    class="form-control"
                                                                    id="numberOfEmployee"
                                                                    name="numberOfEmployee"
                                                                    model="numberOfEmployee"
                                                                    :label="__('Number Of Employee')"
                                                                    :placeholder="__('Enter number of employee')"
                                                                ></x-input>
                                                            </div>

                                                            <div class="col-12">
                                                                <x-admin.editor
                                                                    :label="__('Description')"
                                                                    class="form-control"
                                                                    type="text"
                                                                    id="description"
                                                                    name="description"
                                                                    model="description"
                                                                    rows="7"
                                                                    placeholder="{{ __('Enter content') }}"
                                                                >
                                                                </x-admin.editor>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <x-button
                                                            wire:click="updateStep({{ 0 }})"
                                                            type="button"
                                                            class="btn btn-light btn-label">
                                                            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                                                            {{ __('Previous Step') }}</x-button>

                                                        <x-button
                                                            wire:click="updateStep({{ 1 }})"
                                                            type="button"
                                                            class="btn btn-success btn-label right ms-auto">
                                                            <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                                            {{ __('Next Step') }}</x-button>                                                    </div>
                                                </div>

                                                <div class="tab-pane fade {{ $step === 3 ? 'show active' : '' }}">
                                                    <div class="text-center pt-4 pb-2">
                                                        <div class="mb-4">
                                                            <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                                                        </div>
                                                        <h5>{{ __('Your Profile Is Completed!') }}</h5>
                                                    </div>

                                                    <div class="d-flex align-items-start gap-3 mt-4">
                                                        <x-button
                                                            wire:click="updateStep({{ 0 }})"
                                                            type="button"
                                                            class="btn btn-light btn-label">
                                                            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>
                                                            {{ __('Previous Step') }}</x-button>

                                                        <x-button
                                                            type="button"
                                                            wire:click="saveProfile"
                                                            class="btn btn-success btn-label right ms-auto">
                                                            <span class="d-flex align-items-center">
                                                                <i wire:loading
                                                                   wire:target="saveProfile"
                                                                   wire:loading.attr="disabled"
                                                                   class="mdi mdi-loading mdi-spin align-middle me-2"></i>
                                                                <span class="flex-grow-1 ms-2">
                                                            <i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                                            {{ __('Save To Continue') }}</span>
                                                            </span></x-button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
