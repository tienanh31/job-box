@props([
    'labels' => [],
    ])

<div class="table-responsive">
    <table class="table table-bordered align-middle table-nowrap mb-0">
        <thead>
        <tr>
            @foreach($labels as $label)
                <th scope="col">{{ $label }}</th>
            @endforeach
            <th scope="col">{{ __('Action') }}</th>
        </tr>
        </thead>
        <tbody>
        {{ $slot }}
        </tbody>
    </table>
</div>
