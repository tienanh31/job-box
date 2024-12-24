<div>
    <x-admin.card>
        <button
            wire:click="clearNotification"
            class="btn btn-soft-warning">
            <i wire:loading
               wire:target="clearNotification"
               wire:loading.attr="disabled"
               class="mdi mdi-loading mdi-spin align-middle me-2"></i>
            <span class="flex-grow-1">{{ __('Clear Notifications') }}</span>
        </button>

        <div class="row">
            <div class="col-lg-12">
                <div class="my-3">
                    <div class="alert alert-warning" role="alert">
                        <p><strong>{{ __('Clears the application notifications') }}</strong></p>
                        <p>{{ __("This action will delete all notifications in your system. Please note that this action is irreversible, and all notifications will be permanently lost.") }}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-admin.card>
</div>
