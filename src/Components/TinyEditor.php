<?php

namespace Mohamedsabil83\FilamentFormsTinyeditor\Components;

use Filament\Forms\Components\Concerns;
use Filament\Forms\Components\Contracts;
use Filament\Forms\Components\Field;

class TinyEditor extends Field implements Contracts\HasFileAttachments
{
    use Concerns\HasFileAttachments;

    protected bool $isSimple = false;

    protected string $plugins;

    protected string $profile = 'default';

    protected string $toolbar;

    protected string $language;

    protected string $view = 'filament-forms-tinyeditor::tiny-editor';

    /**
     * The tinymce api key.
     *
     * @return string
     */
    public function tinyKey(): string
    {
        return config('services.tinymce.key', 'no-api-key');
    }

    /**
     * Indicate the language to use for the editor.
     *
     * @return string
     */
    public function interfaceLanguage(): string
    {
        return $this->language ?? app()->getLocale();
    }

    /**
     * Indicates if the editor is simple.
     *
     * @return bool
     */
    public function isSimple(): bool
    {
        return (bool) $this->evaluate($this->isSimple);
    }

    /**
     * Set the interface language.
     *
     * @param string|null $language
     *
     * @return static
     */
    public function language(?string $language = null): static
    {
        $this->language = $language ?? app()->getLocale();

        return $this;
    }

    /**
     * Set the plugins according to profile.
     *
     * @return string
     */
    public function plugins(): string
    {
        if ($this->isSimple()) {
            return 'directionality emoticons link wordcount';
        }

        if (config('filament-forms-tinyeditor.profiles.'.$this->profile.'.plugins')) {
            return config('filament-forms-tinyeditor.profiles.'.$this->profile.'.plugins');
        }

        return 'advlist codesample directionality emoticons fullscreen hr image imagetools link lists media table toc wordcount';
    }

    /**
     * Set the profile.
     *
     * @param string $profile
     *
     * @return static
     */
    public function profile(string $profile): static
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Pick the simple editor.
     *
     * @param bool|callable $condition
     *
     * @return static
     */
    public function simple(bool | callable $condition = true): static
    {
        $this->isSimple = $condition;

        return $this;
    }

    /**
     * Set the toolbar buttons according to profile.
     *
     * @return string
     */
    public function toolbar(): string
    {
        if ($this->isSimple()) {
            return 'removeformat | bold italic | rtl ltr | link emoticons';
        }

        if (config('filament-forms-tinyeditor.profiles.'.$this->profile.'.toolbar')) {
            return config('filament-forms-tinyeditor.profiles.'.$this->profile.'.toolbar');
        }

        return 'undo redo removeformat | formatselect fontsizeselect | bold italic | rtl ltr | alignjustify alignright aligncenter alignleft | numlist bullist | forecolor backcolor | blockquote table toc hr | image link media codesample emoticons | wordcount fullscreen';
    }
}
