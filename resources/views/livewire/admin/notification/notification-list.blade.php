<div>
    @include('admin.partials.page-title')

    <div class="row">
        @foreach($notifications as $notification)
            <div class="col-xxl-3 col-sm-6">
                <div class="card card-height-100">
                    <div class="card-body">
                        <div class="d-flex flex-column h-100">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-4">{{ __('Updated :updatedAt', ['updatedAt' =>  BaseHelper::dateFormatForHumans($notification->updated_at)]) }}</p>
                                </div>
                                <div class="flex-shrink-0">
                                    @can('notification-edit')
                                        <span
                                            style="cursor: pointer"
                                            wire:click="markAsReadOrUnreadNotification('{{ $notification->id }}')"
                                            class="badge badge-soft-{{ $notification->read_at ? 'info' : 'warning' }}">{{ $notification->read_at ? __('Read') : __('Mark As Read') }}</span>
                                    @endcan

                                    @can('site-settings')
                                        <div class="d-inline" x-data="{ confirmDelete:false }">
                                        <span
                                            x-show="!confirmDelete" x-on:click="confirmDelete=true"
                                            style="cursor: pointer"
                                            class="badge badge-soft-danger">{{ __('Delete') }}</span>

                                            <span
                                                x-show="confirmDelete" x-on:click="confirmDelete=false"
                                                wire:click="deleteNotification('{{ $notification->id }}')"
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
                                    <h5 class="mb-1 fs-15"><span class="text-primary">{{ $notification->data['name'] }}</span></h5>
                                    <p class="mb-1">{{ $notification->type == 'App\Notifications\CompanyJobEditNotification' ? trans('Has been updated 🔔') : trans('Has been added 🔔') }}</p>
                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                        <span><i class="mdi mdi-clock-outline"></i> {{ BaseHelper::dateFormatForHumans($notification->created_at) }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-transparent border-top-dashed py-2">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="text-muted">
                                    <i class="ri-calendar-event-fill me-1 align-bottom"></i> {{ __('Created At: :createdAt', ['createdAt' => BaseHelper::dateFormat($notification->created_at)]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(! $notifications->count())
        <x-admin.card>
            <div class="mt-3">
                <x-admin.empty></x-admin.empty>
            </div>
        </x-admin.card>
    @endif

    {{ $notifications->onEachSide(0)->links() }}
</div>
