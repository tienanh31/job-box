<div>
    <div class="section job-hero-section bg-light pb-0">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <div>
                        <h1 class="display-6 fw-semibold text-capitalize mb-3 lh-base">{{ __('Find Your Next Job And Build Your Dream Here') }}</h1>
                        <p class="lead text-muted lh-base mb-4">{{ __('Find jobs, create trackable resumes and enrich your applications. Carefully crafted after analyzing the needs of different industries.') }}</p>

                        <livewire:user.home.modules.search></livewire:user.home.modules.search>

                        <livewire:user.home.modules.trendy-word></livewire:user.home.modules.trendy-word>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="position-relative home-img text-center mt-5 mt-lg-0">
                        <div class="card p-3 rounded shadow-lg inquiry-box">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0 me-3">
                                    <div class="avatar-title bg-soft-warning text-warning rounded fs-18">
                                        <i class="ri-mail-send-line"></i>
                                    </div>
                                </div>
                                <h5 class="fs-15 lh-base mb-0">{{ __('Work Inquiry from :name', ['name' => $settings['siteName']]) }}</h5>
                            </div>
                        </div>

                        <div class="card p-3 rounded shadow-lg application-box">
                            <h5 class="fs-15 lh-base mb-3">{{ __('Candidates') }}</h5>
                            <div class="avatar-group">
                                <x-link :to="route('student-list.user')" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                    <div class="avatar-xs">
                                        <img src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="" class="rounded-circle img-fluid">
                                    </div>
                                </x-link>

                                <x-link :to="route('student-list.user')" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded-circle bg-danger">
                                            S
                                        </div>
                                    </div>
                                </x-link>

                                <x-link :to="route('student-list.user')" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                    <div class="avatar-xs">
                                        <img src="{{ asset('assets/images/users/avatar-10.jpg') }}" alt="" class="rounded-circle img-fluid">
                                    </div>
                                </x-link>

                                <x-link :to="route('student-list.user')" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded-circle bg-success">
                                            Z
                                        </div>
                                    </div>
                                </x-link>

                                <x-link :to="route('student-list.user')" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                    <div class="avatar-xs">
                                        <img src="{{ asset('assets/images/users/avatar-9.jpg') }}" alt="" class="rounded-circle img-fluid">
                                    </div>
                                </x-link>
                                <x-link :to="route('student-list.user')" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="More Appliances">
                                    <div class="avatar-xs">
                                        <div class="avatar-title fs-13 rounded-circle bg-light border-dashed border text-primary">
                                            2k+
                                        </div>
                                    </div>
                                </x-link>
                            </div>
                        </div>
                        <img src="{{ asset('assets/images/job-profile2.png') }}" alt="" class="user-img">

                        <div class="circle-effect">
                            <div class="circle"></div>
                            <div class="circle2"></div>
                            <div class="circle3"></div>
                            <div class="circle4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section" id="process">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <h1 class="mb-3 ff-secondary fw-semibold lh-base">{{ __("How it's work creative jobs & quickly features") }}</h1>
                        <p class="text-muted">{{ __('A creative person has the ability to invent and develop original ideas, especially in the arts. Like so many creative people, he was never satisfied.') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-body p-4">
                            <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                <div class="job-icon-effect"></div>
                                <span>1</span>
                            </h1>
                            <h6 class="fs-17 mb-2">{{ __('Register Account') }}</h6>
                            <p class="text-muted mb-0 fs-15">{{ __('First, You need to make a account.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-none">
                        <div class="card-body p-4">
                            <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                <div class="job-icon-effect"></div>
                                <span>2</span>
                            </h1>
                            <h6 class="fs-17 mb-2">{{ __('Create Resume') }}</h6>
                            <p class="text-muted mb-0 fs-15">{{ __('Create a resume for your job.') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-none">
                        <div class="card-body p-4">
                            <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                <div class="job-icon-effect"></div>
                                <span>3</span>
                            </h1>

                            <h6 class="fs-17 mb-2">{{ __('Find Job') }}</h6>
                            <p class="text-muted mb-0 fs-15">{{ __('Search for your dream jobs :name', ['name' => $settings['siteName']]) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow-none">
                        <div class="card-body p-4">
                            <h1 class="fw-bold display-5 ff-secondary mb-4 text-success position-relative">
                                <div class="job-icon-effect"></div>
                                <span>4</span>
                            </h1>
                            <h6 class="fs-17 mb-2">{{ __('Apply Job') }}</h6>
                            <p class="text-muted mb-0 fs-15">{{ __('Apply to the compnay and wait for interview.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section bg-light" id="categories">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-5">
                        <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">{{ __('High Demand Jobs Categories Featured') }}</h1>
                        <p class="text-muted">{{ __("Post a job to tell us about your project. We'll quickly match you with the right freelancers.") }}</p>
                    </div>
                </div>
            </div>

            <livewire:user.home.modules.categories lazy></livewire:user.home.modules.categories>
        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between justify-content-center gy-4">
                <div class="col-lg-5 col-sm-7">
                    <div class="about-img-section mb-5 mb-lg-0 text-center">
                        <div class="card rounded shadow-lg inquiry-box d-none d-lg-block">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar-sm flex-shrink-0 me-3">
                                    <div class="avatar-title bg-soft-secondary text-secondary rounded-circle fs-18">
                                        <i class="ri-briefcase-2-line"></i>
                                    </div>
                                </div>
                                <h5 class="fs-15 lh-base mb-0">{{ __('Search Over 100,000+ Jobs') }}</h5>
                            </div>
                        </div>

                        <div class="card feedback-box">
                            <div class="card-body d-flex shadow-lg">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ asset('assets/images/users/avatar-10.jpg') }}" alt="" class="avatar-sm rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-14 lh-base mb-0">Thuy Duong</h5>
                                    <p class="text-muted fs-11 mb-1">Web Developer</p>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('assets/images/about.jpg') }}" alt="" class="img-fluid mx-auto rounded-3" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-muted">
                        <h1 class="mb-3 lh-base">{{ __('Find Your Dream Job in One Place') }}</h1>
                        <p class="ff-secondary fs-16 mb-2">{{ __('The first step in finding your dream job is deciding where to look for first-hand insight. Contact professionals who are already working in industries or positions that interest you.') }}</p>
                        <p class="ff-secondary fs-16">{{ __('Schedule informational interviews and phone calls or ask for the opportunity to shadow them on the job.') }}</p>

                        <div class="vstack gap-2 mb-4 pb-1">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar-xs icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                            <i class="ri-check-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">{{ __('Dynamic Conetnt') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar-xs icon-effect">
                                        <div class="avatar-title bg-transparent text-success rounded-circle h2">
                                            <i class="ri-check-fill"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <p class="mb-0">{{ __("Setup plugin's information.") }}</p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="#findJob" class="btn btn-primary">{{ __('Find Your Jobs') }} <i class="ri-arrow-right-line align-bottom ms-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section" id="findJob">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="text-center mb-5">
                        <h1 class="mb-3 ff-secondary fw-semibold text-capitalize lh-base">{{ __('Find Your Career You Deserve It') }}</h1>
                        <p class="text-muted">{{ __("Post a job to tell us about your project. We'll quickly match you with the right freelancers.") }}</p>
                    </div>
                </div>
            </div>

            <livewire:user.home.modules.jobs lazy></livewire:user.home.modules.jobs>
        </div>
    </div>
</div>
