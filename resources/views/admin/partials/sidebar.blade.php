<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <x-link
            to="{{ route('dashboard') }}"
            class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ asset($settings['logoDark']) }}" alt="" height="25">
            </span>
        </x-link>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>{{ __('Menu') }}</span></li>

                @can('dashboard')
                    <li class="nav-item">
                        <x-link
                            class="nav-link menu-link {{ request()->route()->getName() == 'dashboard' ? 'active' : '' }}"
                            to="{{ route('dashboard') }}"
                        >
                            <i class="ri-dashboard-2-line"></i><span>{{ __('Site Health') }}</span>
                        </x-link>
                    </li>
                @endcan

                @can('user-list')
                    <li class="nav-item">
                        <x-link
                            class="nav-link menu-link {{ request()->route()->getName() == 'user.index' ? 'active' : '' }}"
                            to="{{ route('user.index') }}"
                        >
                            <i class="ri-user-line"></i><span>{{ __('Users') }}</span>
                        </x-link>
                    </li>
                @endcan

                @can('role-permission')
                    <li class="nav-item">
                        <x-link
                            class="nav-link menu-link {{ request()->route()->getName() == 'role-permission' ? 'active' : '' }}"
                            :to="route('role-permission')"
                        >
                            <i class="ri-shield-user-line"></i><span>{{ __('Roles And Permissions') }}</span>
                        </x-link>
                    </li>
                @endcan

                @can('category-list')
                    <li class="nav-item">
                        <x-link
                            class="nav-link menu-link {{ request()->route()->getName() == 'category.index' ? 'active' : '' }}"
                            to="{{ route('category.index') }}"
                        >
                            <i class="ri-menu-2-fill"></i><span>{{ __('Categories') }}</span>
                        </x-link>
                    </li>
                @endcan

                @can('job-list')
                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->routeIs('job.*') ? 'active' : '' }}"
                           href="#jobs"
                           data-bs-toggle="collapse"
                           role="button"
                           aria-expanded="false"
                           aria-controls="sidebarTables">
                            <i class="ri-file-2-line"></i> <span data-key="t-tables">{{ __('Jobs') }}</span>
                        </a>
                        <div class="collapse menu-dropdown" id="jobs">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <x-link :to="route('job.index')" class="nav-link {{ request()->route()->getName() == 'job.index' ? 'active' : '' }}" data-key="job-list">{{ __('List Of Jobs') }}</x-link>
                                </li>

                                <li class="nav-item">
                                    <x-link
                                        :to="route('job.delete')" class="nav-link {{ request()->route()->getName() == 'job.delete' ? 'active' : '' }}" data-key="jobs-delete">{{ __('Jobs Deleted') }}</x-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('notification-list')
                    <li class="nav-item">
                        <x-link
                            class="nav-link menu-link {{ request()->route()->getName() == 'notification.index' ? 'active' : '' }}"
                            to="{{ route('notification.index') }}"
                        >
                            <i class="ri-notification-2-line"></i><span>{{ __('Notifications') }}</span>
                        </x-link>
                    </li>
                @endcan

                @can('trending-word-list')
                    <li class="nav-item">
                        <x-link
                            class="nav-link menu-link {{ request()->route()->getName() == 'trending-word.index' ? 'active' : '' }}"
                            to="{{ route('trending-word.index') }}"
                        >
                            <i class="ri-file-word-line"></i><span>{{ __('Trending Words') }}</span>
                        </x-link>
                    </li>
                @endcan

                @can('faq-list')
                    <li class="nav-item">
                        <x-link
                            class="nav-link menu-link {{ request()->routeIs('faq.*') ? 'active' : '' }}"
                            to="{{ route('faq.index') }}"
                        >
                            <i class="ri-question-line"></i><span>{{ __('FAQs') }}</span>
                        </x-link>
                    </li>
                @endcan

                @can('media-file')
                    <li class="nav-item">
                        <a
                            target="_blank"
                            class="nav-link menu-link"
                            href="{{ route('elfinder.index') }}"
                        >
                            <i class="ri-image-line"></i><span data-key="t-widgets">{{ __('Media Files') }}</span>
                        </a>
                    </li>
                @endcan

                @can('site-settings')
                    <li class="nav-item">
                        <a
                            target="_blank"
                            class="nav-link menu-link"
                            href="{{ route('setting.index') }}"
                        >
                            <i class="ri-settings-2-line"></i><span data-key="t-widgets">{{ __('Site Settings') }}</span>
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a
                        target="_blank"
                        class="nav-link menu-link"
                        href="{{ route('home') }}"
                    >
                        <i class="ri-global-line"></i><span data-key="t-widgets">{{ __('Go To Website') }}</span>
                    </a>
                </li>

                @if(app()->getLocale() == 'vi')
                    <li class="nav-item">
                        <a
                            class="nav-link menu-link"
                            href="{{ route('language.__invoke', ['locale' => 'en' ]) }}"
                        >
                            <i class="ri-flag-2-line"></i><span data-key="t-widgets">{{ __('English') }}</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a
                            class="nav-link menu-link"
                            href="{{ route('language.__invoke', ['locale' => 'vi' ]) }}"
                        >
                            <i class="ri-flag-2-line"></i><span data-key="t-widgets">{{ __('Tiếng Việt') }}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>

<div class="vertical-overlay"></div>
