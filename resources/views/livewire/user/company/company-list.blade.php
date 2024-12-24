<div>
    <div class="page-content">
        <div class="container">
            <div class="col-lg-12">
                <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                    @foreach($companies as $company)
                        <div class="col mt-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="{{ $company->avatar != null ? asset($company->avatar->url) : asset('assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-md rounded-circle object-cover mt-n5 img-thumbnail border-light mx-auto d-block">
                                    <x-link :to="route('company-detail.user', ['id' => $company->id])">
                                        <h5 class="mt-2 mb-1">{{ $company->companyProfile->payload['name'] }}</h5>
                                    </x-link>
                                    <p class="text-muted mb-2">{{ __('Jobs :jobs(s)', ['jobs' => $company->jobs_count]) }}</p>
                                    <p
                                        title="{{ __('Founded: :in - :headquarters', ['in' => $company->companyProfile->payload['founded'], 'headquarters' => $company->companyProfile->payload['headquarters']]) }}"
                                        class="text-muted text-truncate">{{ __('Founded: :in - :headquarters', ['in' => $company->companyProfile->payload['founded'], 'headquarters' => $company->companyProfile->payload['headquarters']]) }}</p>
                                    <x-link
                                        :to="route('company-detail.user', ['id' => $company->id])"
                                        class="btn btn-soft-success w-100">{{ __('View Detail') }}</x-link>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    @if(! $companies->count())
                        <div class="col-lg-12 py-4">
                            <x-admin.empty></x-admin.empty>
                        </div>
                    @endif

                    @if($companies->hasPages())
                        <div class="col-lg-12 mt-4">
                            <div class="d-flex align-items-center justify-content-center">
                                {{ $companies->onEachSide(0)->links() }}
                            </div>
                        </div>
                    @endif

                    <div class="text-center my-2" wire:loading>
                        <span class="text-primary"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>{{ __('Loading...') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
