<div>
    <div class="page-content">
        <div class="container mt-5">
            <div class="row mt-n5">
                <div class="col-lg-3">
                    <x-user.user.sidebar-profile-layout></x-user.user.sidebar-profile-layout>
                </div>

                <div class="col-lg-9">
                    <x-admin.input.search
                        placeholder="{{ __('Search by name, or something') }}"
                        name="searchTerm"
                        id="searchTerm"
                        model="searchTerm"
                    ></x-admin.input.search>

                    @can('company-job-create')
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <x-link
                                        :to="route('company-job-create.user')"
                                        class="btn btn-primary">
                                        <i class="ri-add-line align-bottom me-1"></i>{{ __('Add Job') }}</x-link>
                                </div>
                            </div>
                        </div>
                    @endcan

                    <div class="row">
                        @foreach($jobs as $job)
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card card-height-100">
                                    <div class="card-body">
                                        <div class="d-flex mb-3">
                                            <div class="flex-grow-1">
                                                <h5 title="{{ $job->name }}" class="fs-15 mb-1 rex">{!! Str::limit($job->name, 30) !!}</h5>
                                            </div>
                                            <div class="d-inline-block">
                                                <span class="badge badge-soft-warning">
                                                    <x-link
                                                        :to="route('company-job-edit.user', ['id' => $job->id])"
                                                        class="link-warning"
                                                    >{{ __('Edit') }}</x-link>
                                                </span>

                                                <div class="d-inline" x-data="{ confirmDelete:false }">
                                                    <span
                                                        x-show="!confirmDelete" x-on:click="confirmDelete=true"
                                                        style="cursor: pointer"
                                                        class="badge badge-soft-danger">{{ __('Delete') }}</span>

                                                    <span
                                                        x-show="confirmDelete" x-on:click="confirmDelete=false"
                                                        wire:click="deleteJob({{ $job->id }})"
                                                        style="cursor: pointer"
                                                        class="badge badge-soft-danger">{{ __('Yes') }}</span>

                                                    <span
                                                        x-show="confirmDelete" x-on:click="confirmDelete=false"
                                                        style="cursor: pointer"
                                                        class="badge badge-soft-info">{{ __('No') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted mb-0">{{ __(':min - :max', ['min' => $job->min_salary > 0 ? BaseHelper::moneyFormatForHumans($job->min_salary) : __('N/A'), 'max' => $job->max_salary ? BaseHelper::moneyFormatForHumans($job->max_salary) : __('N/A')]) }}</h6>
                                    </div>
                                    <div class="card-body border-top border-top-dashed">
                                        <div class="d-flex">
                                            <h6 class="flex-shrink-0 text-success mb-0"><i class="ri-time-line align-bottom"></i> {{ __('Updated :updatedAt', ['updatedAt' => BaseHelper::dateFormatForHumans($job->updated_at)]) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if(! $jobs->count())
                        <x-admin.card>
                            <div class="mt-3">
                                <x-admin.empty></x-admin.empty>
                            </div>
                        </x-admin.card>
                    @endif

                    {{ $jobs->onEachSide(0)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

