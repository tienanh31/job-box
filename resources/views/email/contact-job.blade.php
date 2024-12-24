<x-mail::message>
    # {{ __('Dear :companyName,', ['companyName' => $companyName]) }}
    {{ __('I am: :name', ['name' => $name]) }}

    {{ $message }}

    {{ __('Best regards,') }}
    {{ $name }}
</x-mail::message>
