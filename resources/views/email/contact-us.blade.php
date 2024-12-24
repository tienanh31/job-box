<x-mail::message>
    # {{ __('Dear :siteName,', ['siteName' => $settings['siteName']]) }}

    {{ $message }}

    {{ __('Best regards,') }}
    {{ $name }}
</x-mail::message>
