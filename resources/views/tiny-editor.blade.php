<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
    class="relative z-0"
>
    <div
        x-data="{ state: $wire.entangle('{{ $getStatePath() }}'), initialized: false }"
        x-init="(() => {
            window.addEventListener('DOMContentLoaded', () => initTinymce())
            $nextTick(() => initTinymce())
            const initTinymce = () => {
                if (window.tinymce !== undefined && initialized === false) {
                    tinymce.init({
                        target: $refs.tinymce,
                        language: '{{ $getInterfaceLanguage() }}',
                        skin: typeof theme != 'undefined' ? theme : 'light',
                        content_css: this.skin === 'dark' ? 'dark' : '',
                        max_height: {{ $getHeight() }},
                        menubar: {{ $getShowMenuBar() ? 'true' : 'false' }},
                        plugins: ['{{ $getPlugins() }}'],
                        toolbar: '{{ $getToolbar() }}',
                        toolbar_mode: 'sliding',
                        relative_urls : {{ $getRelativeUrls() ? 'true' : 'false' }},
                        remove_script_host : {{ $getRemoveScriptHost() ? 'true' : 'false' }},
                        convert_urls : {{ $getConvertUrls() ? 'true' : 'false' }},
                        branding: false,
                        images_upload_handler: (blobInfo, success, failure, progress) => {
                            if (!blobInfo.blob()) return

                            $wire.upload(`componentFileAttachments.{{ $getStatePath() }}`, blobInfo.blob(), () => {
                                $wire.getComponentFileAttachmentUrl('{{ $getStatePath() }}').then((url) => {
                                    if (!url) {
                                        failure('{{ __('Error uploading file') }}')
                                        return
                                    }
                                    success(url)
                                })
                            })
                        },
                        automatic_uploads: true,
                        templates: {{ $getTemplate() }},
                        setup: function(editor) {
                            editor.on('blur', function(e) {
                                state = editor.getContent()
                            })

                            editor.on('init', function(e) {
                                if (state != null) {
                                    editor.setContent(state)
                                }
                            })

                            function putCursorToEnd() {
                                editor.selection.select(editor.getBody(), true);
                                editor.selection.collapse(false);
                            }

                            $watch('state', function(newstate) {
                                if (newstate !== editor.getContent()) {
                                    editor.resetContent(newstate || '');
                                    putCursorToEnd();
                                }
                            });
                        },
                        {{ $getCustomConfigs() }}
                    })
                    initialized = true
                }
            }
        })()"
        x-cloak
        wire:ignore
    >
        @unless($isDisabled())
            <input
                id="tiny-editor-{{ $getId() }}"
                type="hidden"
                x-ref="tinymce"
            >
        @else
            <div
                x-html="state"
                class="prose dark:prose-invert block w-full max-w-none rounded-lg border border-gray-300 bg-white p-3 opacity-70 shadow-sm transition duration-75 dark:border-gray-600 dark:bg-gray-700"
            ></div>
        @endunless
    </div>
</x-forms::field-wrapper>

@once
    @push('scripts')
        <script src="{{ asset('vendor/filament-forms-tinyeditor/tinymce/tinymce.min.js') }}"></script>
    @endpush
@endonce
