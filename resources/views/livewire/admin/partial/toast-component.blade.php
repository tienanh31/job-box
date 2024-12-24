<div>
    @if($message)
        <div class="toast-container position-fixed p-2" style="z-index: 1500000" id="toast">
            <div class="toast show fade">
                <div class="toast-header">
                    <img src="{{ asset($settings['logoLight']) }}" class="rounded me-2"
                         alt="{{ $settings['siteName'] }}" height="20">
                    <strong class="me-auto"></strong>
                    <small></small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body py-2">
                    {{ $message }}
                </div>
            </div>
        </div>
    @endif
</div>
