<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Job Location') }}</h5>
        </div>
        <div class="card-body">
            <div class="ratio ratio-4x3">
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        var locations = {{ Js::from($this->getLocations()) }};
        var map = L.map('map').setView([10.1817, 106.1166], 7);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        locations.forEach(function(location) {
            L.marker([location.latitude, location.longitude])
                .addTo(map)
                .bindPopup(location.name);
        });
    </script>
@endpush
