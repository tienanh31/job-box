<div>
    <div class="profile-user position-relative d-inline-block mx-auto mb-4">
        <img
             src="{{ $user->avatar === null ? asset('assets/images/users/avatar-1.jpg') : asset($user->avatar->url) }}"
             class="rounded-circle avatar-xl img-thumbnail user-profile-image"
             alt="user-profile-image">
        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
            <x-admin.input
                class="profile-img-file-input"
                id="profile-img-file-input"
                type="file"
                accept="image/*"
                name="avatar"
                model="avatar"
            ></x-admin.input>

            <label
                for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                <span class="avatar-title rounded-circle bg-light text-body">
                    <i class="ri-camera-fill"></i>
                </span>
            </label>
        </div>
    </div>
</div>
