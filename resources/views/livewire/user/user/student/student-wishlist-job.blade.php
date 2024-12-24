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
                                <livewire:user.job.job-item :job="$job" wire:key="job-item-{{ $job->id }}"></livewire:user.job.job-item>
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
