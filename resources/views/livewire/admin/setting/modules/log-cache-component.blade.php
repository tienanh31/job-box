<div>
    <button
        wire:click="clearCache"
        class="btn btn-soft-info">
        <i wire:loading
           wire:target="clearCache"
           wire:loading.attr="disabled"
           class="mdi mdi-loading mdi-spin align-middle me-2"></i>
        <span class="flex-grow-1">{{ __('Clear Cache') }}</span>
    </button>

    <button
        wire:click="clearAuthenticateLogs"
        class="btn btn-soft-danger">
        <i wire:loading
           wire:target="clearAuthenticateLogs"
           wire:loading.attr="disabled"
           class="mdi mdi-loading mdi-spin align-middle me-2"></i>
        <span class="flex-grow-1">{{ __('Clear Authenticate Logs') }}</span>
    </button>

    <div class="row">
        <div class="col-lg-6">
            <div class="my-3">
                <div class="alert alert-info" role="alert">
                    <p><strong>{{ __('Clears the application cache') }}</strong></p>
                    <p>{{ __("Clear the cached data in the application, including the cache for configuration files, views, and other cached data. It is typically used after making changes to the application's configuration or views to ensure that the latest changes are reflected in the application.") }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="my-3">
                <div class="alert alert-danger" role="alert">
                    <p><strong>{{ __('Clear Authenticate Logs') }}</strong></p>
                    <p>{{ __("Clear the log of authentication attempts and activities. It removes all records from the authentication log, providing a clean slate for monitoring future authentication events. This can be useful for security and auditing purposes, allowing the system to maintain a manageable log size.") }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
