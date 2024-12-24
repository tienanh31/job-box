<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-soft-warning">
                            <div class="card-body px-4 pb-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md-auto">
                                                <div class="avatar-md">
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="{{ $company->avatar != null ? asset($company->avatar->url) : asset('assets/images/users/avatar-1.jpg') }}" class="avatar-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">{{ $company->companyProfile->payload['name'] }}</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-map-pin-2-line align-bottom me-1"></i> {{ $company->companyProfile->payload['headquarters'] }}</div>

                                                        <div class="vr"></div>

                                                        <div>{{ __('Founded In: :in', ['in' => $company->companyProfile->payload['founded']]) }}</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-n5">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3">{{ __('Over View') }}</h5>

                            <div class="text-break mb-3">
                                {!! $company->companyProfile->payload['description'] !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">{{ __('More Info') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="fw-medium">{{ __('Company Name') }}</td>
                                        <td>{{ $company->companyProfile->payload['name'] }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-medium">{{ __('Founded In') }}</td>
                                        <td><span class="badge badge-soft-success">{{ $company->companyProfile->payload['founded'] }}</span></td>
                                    </tr>

                                    <tr>
                                        <td class="fw-medium">{{ __('Headquarters') }}</td>
                                        <td><i class="ri-map-pin-2-line align-bottom me-1"></i> {{ $company->companyProfile->payload['headquarters'] }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-medium">{{ __('Jobs - Vacancy') }}</td>
                                        <td>{{ __(':jobs job(s) - :vacancies vacancies', ['jobs' => $company->jobs_count, 'vacancies' => $company->jobs_sum_vacancy]) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <h5 class="mb-3">{{ __('Jobs Of Company') }}</h5>

                    <div class="row">
                        @foreach($jobs as $job)
                            <div class="col-lg-6" wire:key="job-list-{{ $job->id }}">
                                <livewire:user.job.job-item :job="$job" wire:key="job-item-{{ $job->id }}"></livewire:user.job.job-item>
                            </div>
                        @endforeach

                        @if(! $jobs->count())
                            <div class="col-lg-12 py-4">
                                <x-admin.empty></x-admin.empty>
                            </div>
                        @endif

                        <div class="col-lg-12 d-flex gap-3 justify-content-center align-items-center">
                            @if ($currentPage > 1)
                                <button class="btn btn-outline-primary w-25" wire:click="previousPage">
                                    <span class="icon-on"><i class="ri-arrow-left-line align-bottom me-1"></i> </span>
                                    {{ __('Previous') }}</button>
                            @endif

                            @if ($jobs->count() >= $perPage)
                                <button class="btn btn-outline-primary w-25" wire:click="nextPage">
                                    {{ __('Next') }} <span class="icon-on"> <i class="ri-arrow-right-line align-bottom me-1"></i></span></button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
