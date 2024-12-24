<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('Resume - :appliedPosition - :user', ['appliedPosition' => $user->studentProfile->payload['appliedPosition'] ?? '', 'user' => $user->name]) }}</title>
    <meta name="description" content="{{ $settings['siteDescription'] }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="{{ asset('assets/js/all.min.js') }}"></script>
    <link href="{{ asset('assets/css/resume.css') }}" rel="stylesheet">
    @vite(['resources/js/app.js'])
</head>

<body>

<article class="text-center position-relative">
    <div class="mx-auto text-start">
        <header class="resume-header">
            <div class="row">
                <div class="col">
                    <div class="row p-3 justify-content-center justify-content-md-between">
                        <div class="primary-info col-auto">
                            <h1 class="name mt-0 mb-1 text-white text-uppercase text-uppercase">{{ $user->studentProfile->payload['firstName'] ?? '' }} {{ $user->studentProfile->payload['lastName'] ?? '' }}</h1>
                            <div class="title mb-3">{{ $user->studentProfile->payload['appliedPosition'] ?? '' }}</div>
                            <ul class="list-unstyled">
                                <li class="mb-2">Email contact: <a class="text-white-50" href="mailto:{{ $user->studentProfile->payload['email'] ?? '' }}">{{ __(':email', ['email' => $user->studentProfile->payload['email'] ?? '']) }}</a></li>
                                <li class="mb-2">Phone number: <a class="text-white-50" href="tel:{{ $user->studentProfile->payload['phone'] ?? '' }}">{{ __(':phone', ['phone' => $user->studentProfile->payload['phone'] ?? '']) }}</a></li>
                                @if($user->addresses->count())
                                    <li>Address: <a href="javascript:void(0)" class="text-white-50">{{ __(':district, :province', ['district' => $user->addresses[0]->district->name, 'province' => $user->addresses[0]->province->name]) }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="resume-body p-4">
            @if($user->studentProfile->payload['career'])
                <section class="resume-section  summary-section mb-4">
                    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Career Summary</h2>
                    <div class="resume-section-content">
                        <p class="mb-0">{{ $user->studentProfile->payload['career'] ?? '' }}</p>
                    </div>
                </section>
            @endif

            <div class="row">
                <div class="col-lg-9">
                    @if($user->experiences->count())
                        <section class="resume-section experience-section mb-4">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Work Experience</h2>
                            <div class="resume-section-content">
                                <div class="resume-timeline position-relative">
                                    @foreach($user->experiences as $experience)
                                        <article class="resume-timeline-item position-relative {{ ! $loop->last ? 'pb-4' : '' }}">
                                            <div class="resume-timeline-item-header mb-2">
                                                <div class="d-flex flex-column flex-md-row">
                                                    <h3 class="resume-position-title font-weight-bold mb-1">{{ $experience->position }}</h3>
                                                    <div class="resume-company-name ms-auto">{{ $experience->company_name }}</div>
                                                </div>
                                                <div class="resume-position-time">{{ __(':from - :to', ['from' => BaseHelper::dateFormat($experience->start_at, false), 'to' => $experience->end_at ? BaseHelper::dateFormat($experience->end_at, false) : __('Present')]) }}</div>
                                            </div>
                                            <div class="resume-timeline-item-desc">
                                                <p>{{ $experience->description }}</p>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif

                    @if($user->projects->count())
                        <section class="resume-section experience-section mb-4">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Project</h2>
                            <div class="resume-section-content">
                                <div class="resume-timeline position-relative">
                                    @foreach($user->projects as $project)
                                        <article class="resume-timeline-item position-relative {{ ! $loop->last ? 'pb-4' : '' }}">
                                            <div class="resume-timeline-item-header mb-2">
                                                <div class="d-flex flex-column flex-md-row">
                                                    <h3 class="resume-position-title font-weight-bold mb-1">{{ $project->name }}</h3>
                                                    <div class="resume-company-name ms-auto">{{ $project->customer }}</div>
                                                </div>
                                                <div class="resume-position-time">{{ __(':from - :to', ['from' => BaseHelper::dateFormat($project->start_at, false), 'to' => $project->end_at ? BaseHelper::dateFormat($project->end_at, false) : __('Present')]) }}</div>
                                            </div>
                                            <div class="resume-timeline-item-desc">
                                                <p>{{ __('Number Of Members: :member', ['member' => $project->number_of_members]) }}</p>
                                                <p>{{ $project->description }}</p>
                                                <h4 class="resume-timeline-item-desc-heading font-weight-bold">{{ __('Tech Stack: :technology', ['technology' => $project->technology]) }}</h4>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif

                    @if($user->products->count())
                        <section class="resume-section experience-section mb-4">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Product</h2>
                            <div class="resume-section-content">
                                <div class="resume-timeline position-relative">
                                    @foreach($user->products as $product)
                                        <article class="resume-timeline-item position-relative {{ ! $loop->last ? 'pb-4' : '' }}">
                                            <div class="resume-timeline-item-header mb-2">
                                                <div class="d-flex flex-column flex-md-row">
                                                    <h3 class="resume-position-title font-weight-bold mb-1">{{ $product->name }}</h3>
                                                    <div class="resume-company-name ms-auto">{{ BaseHelper::dateFormat($product->completion_time, false) }}</div>
                                                </div>
                                            </div>
                                            <div class="resume-timeline-item-desc">
                                                <p>{{ $product->description }}</p>
                                                <h4 class="resume-timeline-item-desc-heading font-weight-bold">{{ __('Type: :type', ['type' => $product->type]) }}</h4>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif
                </div>

                <div class="col-lg-3">
                    @if($user->educations->count())
                        <section class="resume-section education-section mb-4">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Education</h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled">
                                    @foreach($user->educations as $education)
                                        <li class="mb-2">
                                            <div class="resume-degree font-weight-bold">{{ $education->majors }}</div>
                                            <div class="resume-degree-org">{{ $education->school }}</div>
                                            <div class="resume-degree-time">{{ __(':from - :to', ['from' => BaseHelper::dateFormat($education->start_at, false), 'to' => $education->end_at ? BaseHelper::dateFormat($education->end_at, false) : __('Present')]) }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    @endif

                    @if($user->skills->count())
                        <section class="resume-section skills-section mb-4">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Skills</h2>
                            <div class="resume-section-content">
                                <div class="resume-skill-item">
                                    <ul class="list-unstyled resume-lang-list">
                                        @foreach($user->skills as $skill)
                                            <li class="mb-2">
                                                <span class="resume-lang-name font-weight-bold">{{ $skill->name }} {{ $skill->description ? '(' . $skill->description . ')' : '' }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </section>
                    @endif

                    @if($user->awards->count())
                        <section class="resume-section reference-section mb-4">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Awards</h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled">
                                    @foreach($user->awards as $award)
                                        <li class="mb-2">
                                            <div class="resume-degree font-weight-bold">{{ $award->name  }}</div>
                                            <div class="resume-degree-time">{{ __('Organization: :organization (:issueOn)', ['organization' => $award->organization, 'issueOn' => BaseHelper::dateFormat($award->issued_on, false)]) }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    @endif

                    @if($user->certificates->count())
                        <section class="resume-section language-section mb-4">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Certificates</h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled resume-lang-list">
                                    @foreach($user->certificates as $certificate)
                                        <li class="mb-2">
                                            <span class="resume-lang-name font-weight-bold">{{ $certificate->name }} {{ '(' . $certificate->organization . ')' }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    @endif

                    @if($user->courses->count())
                        <section class="resume-section language-section mb-4">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Course</h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled resume-lang-list">
                                    @foreach($user->courses as $course)
                                        <li class="mb-2">
                                            <span class="resume-lang-name font-weight-bold">{{ $course->name }}</span> <small class="text-muted font-weight-normal">({{ __(':from - :to', ['from' => BaseHelper::dateFormat($course->start_at, false), 'to' => $course->end_at ? BaseHelper::dateFormat($course->end_at, false) : __('Present')]) }})</small>
                                            <div class="resume-degree-org">{{ $course->organization }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    @endif

                    @if($user->socialActivities->count())
                        <section class="resume-section interests-section mb-4">
                            <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Social Activity</h2>
                            <div class="resume-section-content">
                                <ul class="list-unstyled">
                                    @foreach($user->socialActivities as $activity)
                                        <li class="mb-1">{{ $activity->position }} <small>({{ $activity->organization }})</small></li>
                                    @endforeach
                                </ul>
                            </div>
                        </section>
                    @endif
                </div>
            </div>
        </div>
    </div>
</article>

</body>
</html>

