<x-mail::message>
    # {{ __('Dear :companyName,', ['companyName' => $companyName]) }}

    {{ $presentation }}

    {{ __('Best regards') }}
</x-mail::message>
