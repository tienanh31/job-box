<div>
    <div class="row">
        @foreach($jobs as $job)
            <div class="col-lg-6">
                <livewire:user.job.job-item :job="$job" wire:key="job-item-{{ $job->id }}"></livewire:user.job.job-item>
            </div>
        @endforeach

        @if($jobs->count())
            <div class="col-lg-12">
                <div class="text-center mt-4">
                    <x-link
                        :to="route('job-list.user')"
                        class="btn btn-outline-primary">{{ __('View More Jobs') }}<i class="ri-arrow-right-line align-bottom"></i></x-link>
                </div>
            </div>
        @endif

        @if(! $jobs->count())
            <x-admin.empty></x-admin.empty>
        @endif
    </div>
</div>
