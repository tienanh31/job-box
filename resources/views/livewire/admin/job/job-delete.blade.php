<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by name, or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <div class="row g-4 mb-3">
        <div class="col-sm-auto">
            <div>
                <button
                    {{ $jobs->count() ? '' : 'disabled' }}
                    wire:click="clearAll"
                    class="btn btn-primary">{{ __('Clear All') }}</button>
            </div>
        </div>
    </div>

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
                                <span class="badge badge-soft-warning"
                                      style="cursor: pointer;"
                                      wire:click="reverseJob({{ $job->id }})"
                                      class="badge badge-soft-warning"
                                    >{{ __('Retrieve') }}</span>
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
                        <h6 class="text-muted mb-0">{{ __('From :from to :to', ['from' => BaseHelper::moneyFormat($job->min_salary), 'to' => BaseHelper::moneyFormat($job->max_salary)]) }}</h6>
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

    {{ $jobs->links() }}

    @if(! $jobs->count())
        <x-admin.card>
            <div class="mt-3">
                <x-admin.empty></x-admin.empty>
            </div>
        </x-admin.card>
    @endif
</div>
