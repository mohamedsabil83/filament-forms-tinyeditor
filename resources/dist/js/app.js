document.addEventListener('DOMContentLoaded', function () {
    const sortableClass = [
        'filament-forms-builder-component',
        'filament-forms-repeater-component',
    ];

    Livewire.hook('element.updated', (el) => {
        if (!window.tinySettingsCopy) {
            return;
        }

        const isModalOpen = document.body.classList.contains('tox-dialog__disable-scroll');

        if (!isModalOpen && sortableClass.some(i => el.classList.contains(i))) {
            removeEditors();
            setTimeout(reinitializeEditors, 1);
        }
    })

    const removeEditors = debounce(() => {
        window.tinySettingsCopy.forEach(i => tinymce.execCommand('mceRemoveEditor', false, i.target.id));
    }, 50);

    const reinitializeEditors = debounce(() => {
        window.tinySettingsCopy.forEach(settings => tinymce.init(settings))
    });

    function debounce(callback, timeout = 100) {
        let timer;
        return (...args) => {
            clearTimeout(timer);
            timer = setTimeout(() => {
                callback.apply(this, args);
            }, timeout);
        };
    }
})
