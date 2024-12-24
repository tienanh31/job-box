<div>
    <nav class="navbar navbar-expand-lg navbar-landing fixed-top job-navbar" id="navbar">
        <div class="container-fluid custom-container">
            <x-link :to="route('home')" class="navbar-brand">
                <img src="{{ asset($settings['logoLight']) }}" class="card-logo card-logo-dark" alt="logo dark" height="20">
            </x-link>
            <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                    <li class="nav-item">
                        <x-link
                            :to="route('home')"
                            class="nav-link {{ request()->route()->getName() == 'home' ? 'active' : '' }}">{{ __('Home') }}</x-link>
                    </li>

                    <li class="nav-item">
                        <x-link
                            :to="route('job-list.user')"
                            class="nav-link {{ in_array(request()->route()->getName(), ['job-list.user', 'job-detail']) ? 'active' : '' }}">{{ __('Jobs') }}</x-link>
                    </li>

                    <li class="nav-item">
                        <x-link
                            :to="route('company-list.user')"
                            class="nav-link {{ in_array(request()->route()->getName(), ['company-list.user', 'company-detail.user']) ? 'active' : '' }}">{{ __('Companies') }}</x-link>
                    </li>

                    <li class="nav-item">
                        <x-link
                            :to="route('student-list.user')"
                            class="nav-link {{ request()->route()->getName() == 'student-list.user' ? 'active' : '' }}">{{ __('Candidates') }}</x-link>
                    </li>

                    @auth
                        @if(! Auth::user()->hasRole('Super Admin'))
                            <li class="nav-item">
                                <x-link
                                    :to="Auth::user()->hasRole('Company') ? route('company-profile.user') : route('student-profile.user')"
                                    class="nav-link {{ in_array(request()->route()->getName(), ['student-profile.user', 'student-resume.user', 'student-wishlist.user', 'student-applied-job.user', 'user-change-password.user', 'company-profile.user', 'company-job-list.user', 'company-job-create.user', 'company-job-edit.user']) ? 'active' : '' }}">{{ __('Profile') }}</x-link>
                            </li>
                        @endif
                    @endauth
                </ul>

                <div>
                    @unless(Auth::check())
                        <a href="{{ route('login') }}" class="btn btn-primary"><i class="ri-user-3-line align-bottom me-1"></i>{{ __('Login & Register') }}</a>
                    @endunless

                    @auth
                        @if(! Auth::user()->hasRole('Super Admin'))
                            <x-link
                                :to="Auth::user()->hasRole('Company') ? route('company-profile.user') : route('student-profile.user')"
                                class="btn btn-primary">
                                <i class="ri-user-3-line align-bottom me-1"></i>
                                {{ __('Hello :name', ['name' => Auth::user()->email]) }}</x-link>
                        @else
                            <a
                                target="_blank"
                                href="{{ route('dashboard') }}"
                                class="btn btn-primary">
                                <i class="ri-user-3-line align-bottom me-1"></i>
                                {{ __('Hello :name', ['name' => Auth::user()->email]) }}</a>
                        @endif
                    @endauth

                    @if(app()->getLocale() == 'vi')
                        <a href="{{ route('language.__invoke', ['locale' => 'en']) }}">
                            <img src="{{ asset('assets/images/us.png') }}" class="rounded" height="35" width="40" alt="United State" title="English">
                        </a>
                    @else
                        <a href="{{ route('language.__invoke', ['locale' => 'vi']) }}">
                            <img src="{{ asset('assets/images/vn.png') }}" class="rounded" height="35" width="40" alt="Viet Nam" title="Tiếng Việt">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</div>
