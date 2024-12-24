@props([
    'id' => null,
    'name' => null,
    'formData' => false,
    ])

<form
    @if($id) id="{{ $id }}" @endif
    @if($name) id="{{ $name }}" @endif
    @if($formData === true) enctype="multipart/form-data" @endif
    {{ $attributes }}>
    @csrf

    {{ $slot }}
</form>
