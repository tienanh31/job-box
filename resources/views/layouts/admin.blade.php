<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? $settings['siteName'] }}</title>
    <meta name="description" content="{{ $settings['siteDescription'] }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/libs/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script data-navigate-track src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script data-navigate-track src="{{ asset('assets/js/apexcharts.js') }}"></script>
    <script data-navigate-track src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script data-navigate-track src="{{ asset('assets/libs/flatpickr/flatpickr.js') }}"></script>
    @stack('styles')
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="layout-wrapper">
        @include('admin.partials.header')

        @include('admin.partials.sidebar')

        <div>
            <livewire:admin.partial.toast-component wire:key="adminToastComponent"></livewire:admin.partial.toast-component>
        </div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    {{ $slot }}

                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2023 © {{ $settings['siteName'] }}
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <button onclick="topFunction()" class="btn btn-info btn-icon landing-back-top" id="back-to-top" style="display: block;">
        <i class="ri-arrow-up-line"></i>
    </button>

    <x-livewire-alert::scripts />
    <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>
</html>
