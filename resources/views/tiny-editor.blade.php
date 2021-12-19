<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div
        x-data="{ state: $wire.entangle('{{ $getStatePath() }}') }"
        x-init="$nextTick(() => {
            tinymce.init({
                target: $refs.tinymce,
                language: '{{ $interfaceLanguage() }}',
                themes: 'modern',
                height: 200,
                menubar: false,
                plugins: [
                '{{ $isSimple()
                    ? 'advlist codesample directionality emoticons fullscreen hr image imagetools link lists media table toc wordcount'
                    : 'advlist codesample directionality emoticons fullscreen hr image imagetools link lists media table toc wordcount'
                }}'
                ],
                toolbar: '{{ $isSimple() ? 'removeformat | bold italic | rtl ltr | link emoticons' : 'undo redo removeformat | formatselect fontsizeselect | bold italic | rtl ltr | alignjustify alignright aligncenter alignleft | numlist bullist | forecolor backcolor | blockquote table toc hr | image link media codesample emoticons | wordcount fullscreen' }}',
                toolbar_mode: 'sliding',
                images_upload_handler: (blobInfo, success, failure, progress) => {
                    if (! blobInfo.blob()) return

                    $wire.upload(`componentFileAttachments.{{ $getStatePath() }}`, blobInfo.blob(), () => {
                        $wire.getComponentFileAttachmentUrl('{{ $getStatePath() }}').then((url) => {
                            if (! url){
                                failure('{{ __('Error uploading file') }}')
                                return
                            }
                            success(url)
                        })
                    })
                },
                automatic_uploads: true,
                setup: function(editor) {
                    editor.on('blur', function(e) {
                        state = editor.getContent()
                    })

                    editor.on('init', function (e) {
                        if (state != null) {
                            editor.setContent(state)
                        }
                    })

                    function putCursorToEnd() {
                        editor.selection.select(editor.getBody(), true);
                        editor.selection.collapse(false);
                    }

                    $watch('state', function (newstate) {
                        if (newstate !== editor.getContent()) {
                            editor.resetContent(newstate || '');
                            putCursorToEnd();
                        }
                    });
                }
            })
        })"
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
                class="max-w-none p-3 prose border border-gray-300 rounded shadow-sm"
            ></div>
        @endunless
    </div>
</x-forms::field-wrapper>

@once
    @push('scripts')
        <script
            src="https://cdn.tiny.cloud/1/{{ $tinyKey() }}/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"
        ></script>
    @endpush
@endonce
