<div>
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="d-flex">
                <div class="avatar-sm">
                    <div class="avatar-title bg-soft-warning rounded">
                        <img src="{{ $job->company->avatar != null ? asset($job->company->avatar->url) : asset('assets/images/users/avatar-1.jpg') }}" alt="{{ $job->company->name }}}" class="avatar-xxs">
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
                <div>
                    <livewire:user.job.wishlist :jobId="$job->id" wire:key="wishlist-{{ $job->id }}"></livewire:user.job.wishlist>
                </div>
            </div>
        </div>
    </div>
</div>
