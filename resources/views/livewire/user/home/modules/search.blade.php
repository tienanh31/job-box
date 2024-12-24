<div>
    <div class="job-panel-filter">
        <div class="row g-md-0 g-2">
            <div class="col-md-8">
                <div>
                    <input
                        wire:model.live.debounce.500ms="searchTerm"
                        wire:keydown.escape="hideSuggestions"
                        wire:keydown.tab="hideSuggestions"
                        wire:keydown.enter="hideSuggestions"
                        wire:keydown.arrow-up="hideSuggestions"
                        wire:keydown.arrow-down="hideSuggestions"
                        wire:keydown.delete="hideSuggestions"
                        name="searchTerm"
                        type="text"
                        class="form-control filter-input-box"
                        placeholder="{{ __('Find your job...') }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="h-100">
                    <button
                        class="btn btn-primary submit-btn w-100 h-100"
                        type="button"><i class="ri-search-2-line align-bottom me-1"></i> {{ __('Find Job') }}</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 mt-2">
        @if(! isset($searchTerm) || $showSuggestions)
            <div class="text-center my-2" wire:loading wire:target="searchTerm">
                <span class="text-primary"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>{{ __('Loading...') }}</span>
            </div>
        @endif
        @if ($showSuggestions && isset($searchTerm))
            <div class="list-group">
                @forelse($jobs as $job)
                    <x-link
                        :to="route('job-detail', ['id' => $job->id])"
                        class="list-group-item"
                        style="font-size: 13px; border: none;"
                        title="{{ $job->name }}"
                    >{!! Str::limit($job->name, 35) !!}</x-link>
                @empty
                    <span
                        class="text-primary"
                        style="font-size: 13px;">
                            {{ __('There is no data to display at the moment.') }}
                        </span>
                @endforelse
            </div>
        @endif
    </div>
</div>
