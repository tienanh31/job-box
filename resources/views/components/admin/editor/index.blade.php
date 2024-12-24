@props([
    'name' => null,
    'id' => null,
    'model' => null,
    'label' => null,
    'value' => null,
    'placeholder' => null,
    ])

<div>
    <div wire:ignore>
        <x-admin.input.textarea
            id="{{ $id }}"
            label="{{ $label }}"
            name="{{ $name }}"
            model="{{ $model }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder ?? __('Enter content') }}"
            wire:ignore
        ></x-admin.input.textarea>
    </div>

    @error($model)
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror
</div>

@push('scripts')
    <script type="text/javascript">
        tinymce.remove();

        tinymce.init({
            selector: '#{{ $id }}',
            language: '{{ app()->getLocale() }}',
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });

                editor.on('blur', function (e) {
                    @this.set('{{ $model }}', editor.getContent());
                });
            },

            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount fullscreen',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | fullscreen',
            image_class_list: [
                { title: 'Image Responsive', value: 'img-fluid' }
            ],
            file_picker_callback: elFinderBrowser
        });

        document.addEventListener('livewire:initialized', () => {
            @this.on('refresh', (event) => {
                tinymce.get('{{ $id }}').setContent('');
            });
        });

        function elFinderBrowser (callback, value, meta) {
            tinymce.activeEditor.windowManager.openUrl({
                title: 'File Manager',
                url: `{{ route('elfinder.tinymce5') }}`,
                onMessage: function (dialogApi, details) {
                    if (details.mceAction === 'fileSelected') {
                        const file = details.data.file;
                        const info = file.name;
                        if (meta.filetype === 'file') {
                            callback(file.url, {
                                text: info,
                                title: info
                            });
                        }
                        if (meta.filetype === 'image') {
                            callback(file.url, {
                                alt: info
                            });
                        }
                        if (meta.filetype === 'media') {
                            callback(file.url);
                        }
                        dialogApi.close();
                    }
                }
            });
        }
    </script>
@endpush
