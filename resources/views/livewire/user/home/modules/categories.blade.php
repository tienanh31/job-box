<?php
    $icons = [
        'ri-pencil-ruler-2-line',
        'ri-heart-line', 'ri-star-line',
        'ri-bubble-chart-line',
        'ri-command-line',
        'ri-bilibili-line',
        'ri-coin-line',
        'ri-exchange-funds-fill',
    ];
    shuffle($icons);
?>

<div>
    <div class="row justify-content-center">
        @foreach($categories as $key => $category)
            <div class="col-lg-3 col-md-6">
                <div class="card shadow-none text-center py-3">
                    <div class="card-body py-4">
                        <div class="avatar-sm position-relative mb-4 mx-auto">
                            <div class="job-icon-effect"></div>
                            <div class="avatar-title bg-transparent text-success rounded-circle">
                                <i class="{{ $icons[$key % count($icons)] }} fs-1"></i>
                            </div>
                        </div>
                        <x-link
                            :to="route('job-list.user')"
                            class="stretched-link">
                            <h5 class="fs-17 pt-1">{{ $category->name }}</h5>
                        </x-link>
                        <p class="mb-0 text-muted">{{ __(':count Jobs', ['count' => $category->jobs_count]) }}</p>
                    </div>
                </div>
            </div>
        @endforeach

            @if(! $categories->count())
                <x-admin.empty></x-admin.empty>
            @endif
    </div>
</div>
