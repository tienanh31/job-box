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
                                                        <img src="{{ $job->company->avatar != null ? asset($job->company->avatar->url) : asset('assets/images/users/avatar-1.jpg') }}" alt="{{ $job->company->name }}" class="avatar-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold">{{ $job->name }}</h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div>
                                                            <i class="ri-building-line align-bottom me-1"></i>
                                                            {{ $job->company->companyProfile->payload['name'] }}
                                                        </div>

                                                        @if($job->addresses->count())
                                                        <div class="vr"></div>
                                                            <div><i class="ri-map-pin-2-line align-bottom me-1"></i> {{ $job->addresses[0]->province->name }}</div>
                                                        @endif

                                                        <div class="vr"></div>

                                                        <div>{{ __('Post Date: :at', ['at' => BaseHelper::dateFormat($job->created_at)]) }}</span></div>
                                                        <div class="vr"></div>
                                                        <div class="badge rounded-pill bg-success fs-12">{{ $job->type }}</div>
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
                            <div class="text-break mb-3">
                                {!! $job->description !!}
                            </div>

                            <div>
                                <div class="fb-like" data-href="{{ route('job-detail', ['id' => $job->id]) }}" data-share="true"></div>
                            </div>

                            <div>
                                <div class="fb-comments" data-href="{{ route('job-detail', ['id' => $job->id]) }}" data-width="100%" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">{{ __('Job Overview') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td class="fw-medium">{{ __('Title') }}</td>
                                        <td>{{ $job->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Company Name') }}</td>
                                        <td>{{ $job->company->companyProfile->payload['name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Location') }}</td>
                                        <td>
                                            @if($job->addresses->count())
                                                @foreach($job->addresses as $address)
                                                    <p>{{ __(':district, :province', ['district' => $address->district->name, 'province' => $address->province->name]) }} @if(! $loop->last), @endif</p>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Type') }}</td>
                                        <td><span class="badge badge-soft-success">{{ $job->type }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Deadline For Filing') }}</td>
                                        <td><span class="badge badge-soft-danger">{{ BaseHelper::dateFormat($job->deadline_for_filing) }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Job Application') }}</td>
                                        <td>{{ __(':count Application(s)', ['count' => $job->vacancy]) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Position') }}</td>
                                        <td>{{ $job->position }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Post Date') }}</td>
                                        <td>{{ BaseHelper::dateFormat($job->created_at) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Salary') }}</td>
                                        <td>{{ __(':min - :max', ['min' => $job->min_salary > 0 ? BaseHelper::moneyFormatForHumans($job->min_salary) : __('N/A'), 'max' => $job->max_salary ? BaseHelper::moneyFormatForHumans($job->max_salary) : __('N/A')]) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">{{ __('Experience') }}</td>
                                        <td>{{ $job->experience != 'more' ? __(':experience Year(s)', ['experience' => $job->experience]) : __('More +') }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4 pt-2 hstack gap-2">
                                <a
                                    target="_blank"
                                    href="{{ route('job-applied.user', ['id' => $job->id]) }}"
                                    class="btn btn-primary w-100">{{ __('Apply Now') }}</a>

                                <livewire:user.job.wishlist :jobId="$job->id" wire:key="jobWishlist"></livewire:user.job.wishlist>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="avatar-sm mx-auto">
                                <div class="avatar-title bg-soft-warning rounded">
                                    <img src="{{ $job->company->avatar != null ? asset($job->company->avatar->url) : asset('assets/images/users/avatar-1.jpg') }}" alt="{{ $job->company->name }}" class="avatar-xxs">
                                </div>
                            </div>
                            <div class="text-center">
                                <x-link
                                    :to="route('company-detail.user', ['id' => $job->company->id])">
                                    <h5 class="mt-3">{{ $job->company->companyProfile->payload['name'] }}</h5>
                                </x-link>
                            </div>

                            <livewire:user.job.detail.job-company :jobId="$job->id" wire:key="jobCompany"></livewire:user.job.detail.job-company>
                        </div>
                    </div>

                    <livewire:user.job.detail.job-map :jobId="$job->id" wire:key="jobMap"></livewire:user.job.detail.job-map>

                    <livewire:user.job.detail.job-contact :jobId="$job->id" wire:key="jobContact"></livewire:user.job.detail.job-contact>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="mb-0">{{ __('Related Jobs') }}</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <x-link
                                :to="route('job-list.user')"
                                class="btn btn-ghost-success">{{ __('View All') }}<i class="ri-arrow-right-line ms-1 align-bottom"></i></x-link>
                        </div>
                    </div>
                </div>

                <livewire:user.job.detail.job-related :job="$job" lazy wire:key="jobDetailJobRelated"></livewire:user.job.detail.job-related>

            </div>
        </div>
    </div>
</div>
