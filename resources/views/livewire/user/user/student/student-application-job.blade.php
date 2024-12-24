<div>
    <div class="page-content">
        <div class="container mt-5">
            <div class="row mt-n5">
                <div class="col-lg-3">
                    <x-user.user.sidebar-profile-layout></x-user.user.sidebar-profile-layout>
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        @foreach($jobs as $job)
                            <div class="col-lg-6" wire:key="job-list-{{ $job->id }}">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="avatar-sm">
                                                <div class="avatar-title bg-soft-warning rounded">
                                                    <img src="{{ $job->company->avatar != null ? asset($job->company->avatar->url) : asset('assets/images/users/avatar-10.jpg') }}" alt="{{ $job->company->name }}}" class="avatar-xxs">
                                                </div>
                                            </div>
                                            <div class="ms-3 flex-grow-1">
                                                <x-link :to="route('job-detail', ['id' => $job->id])">
                                                    <h5 title="{{ $job->name }}">{!! Str::limit($job->name, 30) !!}</h5>
                                                </x-link>
                                                <ul class="list-inline text-muted mb-3">
                                                    @if($job->addresses->count())
                                                        <li class="list-inline-item" title="{{ $job->addresses[0]->province->name }}">
                                                            <i class="ri-map-pin-2-line align-bottom me-1"></i> {!! Str::limit($job->addresses[0]->province->name, 15) !!}
                                                        </li>
                                                    @endif
                                                    <li class="list-inline-item">
                                                        <i class="ri-money-dollar-circle-line align-bottom me-1"></i> {{ __(':min - :max', ['min' => $job->min_salary > 0 ? BaseHelper::moneyFormatForHumans($job->min_salary) : __('N/A'), 'max' => $job->max_salary ? BaseHelper::moneyFormatForHumans($job->max_salary) : __('N/A')]) }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if(! $jobs->count())
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <x-admin.empty></x-admin.empty>
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{ $jobs->onEachSide(0)->links() }}

                        <div class="text-center my-2" wire:loading>
                            <span class="text-primary"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>{{ __('Loading...') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
