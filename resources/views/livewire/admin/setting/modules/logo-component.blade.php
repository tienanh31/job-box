<div>
    <div class="mb-2">
        <strong class="text-center">{{ __('Logo For Light Background') }}</strong>
    </div>
    <div class="d-flex align-items-center">
        <div class="profile-user position-relative d-inline-block mx-auto mb-4">
            <img
                src="{{ asset($settings['logoLight']) ?? asset('assets/images/users/avatar-1.jpg') }}"
                class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                alt="logo-light">
            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                <x-admin.input
                    class="profile-img-file-input"
                    id="logo-light"
                    type="file"
                    accept="image/*"
                    name="logoLight"
                    model="logoLight"
                ></x-admin.input>

                <label for="logo-light" class="profile-photo-edit avatar-xs">
                    <span class="avatar-title rounded-circle bg-light text-body">
                        <i class="ri-camera-fill"></i>
                    </span>
                </label>
            </div>
        </div>
    </div>

    <div class="mb-2">
        <strong class="text-center">{{ __('Logo For Dark Background') }}</strong>
    </div>
    <div class="d-flex align-items-center">
        <div class="profile-user position-relative d-inline-block mx-auto mb-4">
            <img
                src="{{ asset($settings['logoDark']) ?? asset('assets/images/users/avatar-1.jpg') }}"
                class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                alt="user-profile-image">
            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                <x-admin.input
                    class="profile-img-file-input"
                    id="logo-dark"
                    type="file"
                    accept="image/*"
                    name="logoDark"
                    model="logoDark"
                ></x-admin.input>

                <label for="logo-dark" class="profile-photo-edit avatar-xs">
                    <span class="avatar-title rounded-circle bg-light text-body">
                        <i class="ri-camera-fill"></i>
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>
