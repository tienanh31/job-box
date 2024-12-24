<div>
    @include('admin.partials.page-title')

    <x-admin.input.search
        placeholder="{{ __('Search by name, or something') }}"
        name="searchTerm"
        id="searchTerm"
        model="searchTerm"
    ></x-admin.input.search>

    @can('faq-create')
        <div class="row g-4 mb-3">
            <div class="col-sm-auto">
                <div>
                    <x-link
                        :to="route('faq.create')"
                        class="btn btn-primary">
                        <i class="ri-add-line align-bottom me-1"></i>{{ __('Add FAQ') }}</x-link>
                </div>
            </div>
        </div>
    @endcan

    <div class="row">
        @foreach($faqs as $faq)
            <div class="col-xxl-3 col-sm-6">
                <div class="card card-height-100">
                    <div class="card-body">
                        <div class="d-flex flex-column h-100">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-4">{{ __('Updated :updatedAt', ['updatedAt' =>  BaseHelper::dateFormatForHumans($faq->updated_at)]) }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    @can('faq-edit')
                                        <x-link
                                            :to="route('faq.edit', ['id' => $faq->id])"
                                            class="badge badge-soft-warning link-warning">{{ __('Edit') }}</x-link>
                                    @endcan

                                    @can('faq-delete')
                                        <div class="d-inline" x-data="{ confirmDelete:false }">
                                        <span
                                            x-show="!confirmDelete" x-on:click="confirmDelete=true"
                                            style="cursor: pointer"
                                            class="badge badge-soft-danger">{{ __('Delete') }}</span>

                                            <span
                                                x-show="confirmDelete" x-on:click="confirmDelete=false"
                                                wire:click="deleteFAQ({{ $faq->id }})"
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
                                    <h5 class="mb-1 fs-15"><span class="text-primary">{{ $faq->question }}</span></h5>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="d-flex mb-2">
                                    <div class="flex-shrink-0">
                                        <div><i class="ri-list-check align-bottom me-1 text-muted"></i> {!! Str::limit($faq->answer, 20) !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent border-top-dashed py-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="text-muted">
                                    <i class="ri-calendar-event-fill me-1 align-bottom"></i> {{ __('Created At: :createdAt', ['createdAt' => BaseHelper::dateFormat($faq->created_at)]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(! $faqs->count())
        <x-admin.card>
            <div class="mt-3">
                <x-admin.empty></x-admin.empty>
            </div>
        </x-admin.card>
    @endif

    {{ $faqs->onEachSide(0)->links() }}
</div>
