<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by name, or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    <div class="row">
        @foreach($words as $word)
            <div class="col-xxl-3 col-sm-6">
                <div class="card card-height-100">
                    <div class="card-body">
                        <div class="d-flex flex-column h-100">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-4">{{ __('Updated :updatedAt', ['updatedAt' =>  BaseHelper::dateFormatForHumans($word->updated_at)]) }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    @can('trending-word-edit')
                                        <span
                                            style="cursor: pointer"
                                            onclick="showModal('trending-word-setting')"
                                            wire:click="editTrendingWord({{ $word->id }})"
                                            class="badge badge-soft-warning">{{ __('Edit') }}</span>
                                    @endcan
                                    @can('trending-word-delete')
                                        <div class="d-inline" x-data="{ confirmDelete:false }">
                                            <span
                                                x-show="!confirmDelete" x-on:click="confirmDelete=true"
                                                style="cursor: pointer"
                                                class="badge badge-soft-danger">{{ __('Delete') }}</span>

                                            <span
                                                x-show="confirmDelete" x-on:click="confirmDelete=false"
                                                wire:click="deleteTrendingWord({{ $word->id }})"
                                                style="cursor: pointer"
                                                class="badge badge-soft-danger">{{ __('Yes') }}</span>

                                            <span
                                                x-show="confirmDelete" x-on:click="confirmDelete=false"
                                                style="cursor: pointer"
                                                class="badge badge-soft-info">{{ __('No') }}</span>
                                        </div>
                                    @endcan
                                </div>
                            </div>

                            <div class="d-flex mb-2">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1 fs-15"><span class="text-primary">{{ $word->name }} <small class="text-info">{{ __('(Times: :times)', ['times' => $word->count]) }}</small></span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(! $words->count())
        <x-admin.card>
            <div class="mt-3">
                <x-admin.empty></x-admin.empty>
            </div>
        </x-admin.card>
    @endif

    {{ $words->onEachSide(0)->links() }}

    <x-admin.modal
        id="trending-word-setting"
        type="modal-md modal-dialog-centered">
        <x-admin.modal.header>{{ __('Edit Trending Word') }}</x-admin.modal.header>
        <x-admin.modal.body>
            <x-form wire:submit.prevent="updateTrendingWord">
                <div class="row">
                    <div class="col-lg-12">
                        <x-admin.input
                            :label="__('Trending Word Name')"
                            class="form-control"
                            type="text"
                            id="name"
                            name="name"
                            model="name"
                            placeholder="{{ __('Enter name') }}"
                        ></x-admin.input>
                    </div>

                    <div class="col-lg-12">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <x-button
                                type="submit"
                                class="btn btn-primary">{{ __('Save Data') }}</x-button>
                        </div>
                    </div>
                </div>
            </x-form>
        </x-admin.modal.body>
    </x-admin.modal>
</div>
