@props([
    'parent' => null,
    'current' => null,
    ])

@php
    $pageTitle = $current ?? '';
    $breadcrumbItems = [];

    if ($parent) {
        $breadcrumbItems[] = $parent;
    }

    $breadcrumbItems[] = $current ?? '';
@endphp

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{ $pageTitle }}</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach($breadcrumbItems as $item)
                        <li class="breadcrumb-item{{ $loop->last ? ' active' : '' }}">{{ $item }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
