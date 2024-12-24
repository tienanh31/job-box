<div class="card" wire:ignore>
    <div class="card-body">
        <div class="list-group list-group-fill-primary">
            @can('company-profile-create')
                <x-link
                    :to="route('company-profile.user')"
                    class="list-group-item list-group-item-action {{ request()->route()->getName() == 'company-profile.user' ? 'active' : '' }}">
                    <i class="ri-building-line align-middle me-2"></i>{{ __('Company Profile') }}</x-link>
            @endcan

            @can('company-job-list')
                <x-link
                    :to="route('company-job-list.user')"
                    class="list-group-item list-group-item-action {{ in_array(request()->route()->getName(), ['company-job-list.user', 'company-job-create.user', 'company-job-edit.user']) ? 'active' : '' }}">
                    <i class="ri-file-2-line align-middle me-2"></i>{{ __('List Of Jobs') }}</x-link>
            @endcan

            @can('student-profile-create')
                <x-link
                    :to="route('student-profile.user')"
                    class="list-group-item list-group-item-action {{ request()->route()->getName() == 'student-profile.user' ? 'active' : '' }}">
                    <i class="ri-user-3-line align-middle me-2"></i>{{ __('Student Profile') }}</x-link>
            @endcan

            @can('student-resume-create')
                <x-link
                    :to="route('student-resume.user')"
                    class="list-group-item list-group-item-action {{ request()->route()->getName() == 'student-resume.user' ? 'active' : '' }}">
                    <i class="ri-todo-line align-middle me-2"></i>{{ __('Resume') }}</x-link>
            @endcan

            @can('student-job-applied')
                <x-link
                    :to="route('student-applied-job.user')"
                    class="list-group-item list-group-item-action {{ request()->route()->getName() == 'student-applied-job.user' ? 'active' : '' }}"><i class="ri-database-2-line align-middle me-2"></i>{{ __('Job Applied') }}</x-link>
            @endcan

            @can('student-job-wishlist')
                <x-link
                    :to="route('student-wishlist.user')"
                    class="list-group-item list-group-item-action {{ request()->route()->getName() == 'student-wishlist.user' ? 'active' : '' }}"><i class="ri-heart-2-line align-middle me-2"></i>{{ __('Wishlist Jobs') }}</x-link>
            @endcan

            @if(! Auth::user()->auth_type)
                <x-link
                    :to="route('user-change-password.user')"
                    class="list-group-item list-group-item-action {{ request()->route()->getName() == 'user-change-password.user' ? 'active' : '' }}"><i class="ri-shield-check-line align-middle me-2"></i>{{ __('Change Password') }}</x-link>
            @endif

            <a
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                href="{{ route('logout') }}"
                class="list-group-item list-group-item-action">
                <i class="ri-logout-box-line align-middle me-2"></i>{{ __('Logout') }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </div>
    </div>
</div>
