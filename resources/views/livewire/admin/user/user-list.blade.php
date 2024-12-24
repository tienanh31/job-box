<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by user name, email or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0"
                        role="tablist">
                        <li class="nav-item">
                            <span
                                wire:click="filterByType('')"
                                style="cursor: pointer;"
                                class="nav-link {{ $filterType == '' ? 'active' : '' }} fw-semibold"
                                data-bs-toggle="tab"
                                role="tab">{{ __('All') }}
                            </span>
                        </li>

                        <li class="nav-item">
                            <span
                                wire:click="filterByType('Student')"
                                style="cursor: pointer;"
                                class="nav-link {{ $filterType == 'Student' ? 'active' : '' }} fw-semibold"
                                data-bs-toggle="tab"
                                role="tab">{{ __('Student') }}
                            </span>
                        </li>

                        <li class="nav-item">
                            <span
                                wire:click="filterByType('Company')"
                                style="cursor: pointer;"
                                class="nav-link fw-semibold {{ $filterType == 'Company' ? 'active' : '' }}"
                                data-bs-toggle="tab"
                                role="tab">{{ __('Company') }}
                            </span>
                        </li>

                        <li class="nav-item">
                            <span
                                wire:click="filterByType('Super Admin')"
                                style="cursor: pointer;"
                                class="nav-link fw-semibold {{ $filterType == 'Super Admin' ? 'active' : '' }}"
                                data-bs-toggle="tab"
                                role="tab">{{ __('Super Admin') }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-3">
        <div class="col-sm-auto">
            <div>
                <button
                    type="button"
                    onclick="showModal('setting-user')"
                    class="btn btn-primary"><i class="ri-add-line align-bottom me-1"></i>{{ __('Add User') }}</button>
            </div>
        </div>
    </div>

    <div class="mb-3">
        @foreach($users as $user)
            <div class="list-group">
                <x-link
                    :to="route('user-edit.profile', ['id' => $user->id])"
                    class="list-group-item list-group-item-action">
                    <div class="float-end">
                        <span
                            class="{{ $user->status == 'Is Active' ? 'badge badge-soft-success' : 'badge badge-soft-danger'}}">{{ $user->status }}</span>
                    </div>
                    <div class="d-flex mb-2 align-items-center">
                        <div class="flex-shrink-0">
                            <img
                                src="{{ $user->avatar ? asset($user->avatar->url) : asset('assets/images/users/avatar-1.jpg') }}"
                                alt="" class="avatar-sm rounded-circle"/>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="list-title fs-15 mb-1">{{ $user->email }}</h5>
                            @if($user->lastLoginAt())
                                <p class="list-text mb-0 fs-12">{{ __('Last login :at', ['at' =>  BaseHelper::dateFormatForHumans($user->lastLoginAt())]) }}</p>
                            @endif
                        </div>
                    </div>
                </x-link>
            </div>
        @endforeach
    </div>

    @if(! count($users))
        <x-admin.card>
            <x-admin.empty></x-admin.empty>
        </x-admin.card>
    @endif

    {{ $users->onEachSide(0)->links() }}

    <x-admin.modal
        id="setting-user"
        type="modal-md modal-dialog-centered">
        <x-admin.modal.header>{{ __('New User') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <livewire:admin.user.user-create></livewire:admin.user.user-create>
        </x-admin.modal.body>
    </x-admin.modal>
</div>
