<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
    class="relative z-0"
>
    <div
        x-data="{ state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }}, initialized: false }"
        x-init="(() => {
            window.addEventListener('DOMContentLoaded', () => initTinymce());
            $nextTick(() => initTinymce());
            const initTinymce = () => {
                if (window.tinymce !== undefined && initialized === false) {
                    tinymce.init({
                        target: $refs.tinymce,
                        language: '{{ $getInterfaceLanguage() }}',
                        skin: typeof theme !== 'undefined' ? theme : 'light',
                        content_css: typeof theme !== 'undefined' && theme === 'dark' ? 'dark' : 'default',
                        body_class: typeof theme !== 'undefined' && theme === 'dark' ? 'dark' : 'light',
                        max_height: {{ $getMaxHeight() }},
                        min_height: {{ $getMinHeight() }},
                        menubar: {{ $getShowMenuBar() ? 'true' : 'false' }},
                        plugins: ['{{ $getPlugins() }}'],
                        toolbar: '{{ $getToolbar() }}',
                        toolbar_mode: 'sliding',
                        relative_urls: {{ $getRelativeUrls() ? 'true' : 'false' }},
                        remove_script_host: {{ $getRemoveScriptHost() ? 'true' : 'false' }},
                        convert_urls: {{ $getConvertUrls() ? 'true' : 'false' }},
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

                            editor.on('OpenWindow', function(e) {
                                e.target.container.closest('.filament-modal').setAttribute('x-trap.noscroll', 'false')
                            })

                            editor.on('CloseWindow', function(e) {
                                e.target.container.closest('.filament-modal').setAttribute('x-trap.noscroll', 'isOpen')
                            })

                            function putCursorToEnd() {
                                editor.selection.select(editor.getBody(), true);
                                editor.selection.collapse(false);
                            }

                            $watch('state', function(newstate) {
                                // unfortunately livewire doesn't provide a way to 'unwatch' so this listener sticks
                                // around even after this component is torn down. Which means that we need to check
                                // that editor.container exists. If it doesn't exist we do nothing because that means
                                // the editor was removed from the DOM
                                if (editor.container && newstate !== editor.getContent()) {
                                    editor.resetContent(newstate || '');
                                    putCursorToEnd();
                                }
                            });
                        },
                        {{ $getCustomConfigs() }}
                    });
                    initialized = true;
                }
            }

            // We initialize here because if the component is first loaded from within a modal DOMContentLoaded
            // won't fire and if we want to register a Livewire.hook listener Livewire.hook isn't available from
            // inside the once body
            if (!window.tinyMceInitialized) {
                window.tinyMceInitialized = true;
                $nextTick(() => {
                    Livewire.hook('element.removed', (el, component) => {
                        if (el.nodeName === 'INPUT' && el.getAttribute('x-ref') === 'tinymce') {
                            tinymce.get(el.id)?.remove();
                        }
                    });
                });
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
                placeholder="{{ $getPlaceholder() }}"
            >
        @else
            <div
                x-html="state"
                @class([
                    'prose block w-full max-w-none rounded-lg border border-gray-300 bg-white p-3 opacity-70 shadow-sm transition duration-75',
                    'dark:prose-invert dark:border-gray-600 dark:bg-gray-700' => config(
                        'forms.dark_mode'
                    ),
                ])
            ></div>
        @endunless
    </div>
</x-dynamic-component>

@once
    @push('scripts')
        <script src="{{ asset('vendor/filament-forms-tinyeditor/tinymce/tinymce.min.js') }}"></script>
    @endpush
@endonce
