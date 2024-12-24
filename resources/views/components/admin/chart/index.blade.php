@props([
    'id' => null,
    'options' => [],
])

<div>
    <x-admin.card>
        <div id="{{ $id }}"></div>
    </x-admin.card>
</div>

@push('scripts')
    <script type="text/javascript">
        var options = {{ Js::from($options) }};

        var chart = new ApexCharts(document.getElementById('{{ $id }}'), options);
        chart.render();
    </script>
@endpush
