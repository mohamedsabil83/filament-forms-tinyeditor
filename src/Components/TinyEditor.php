<?php

namespace Mohamedsabil83\FilamentFormsTinyeditor\Components;

use Filament\Forms\Components\Concerns;
use Filament\Forms\Components\Contracts;
use Filament\Forms\Components\Field;

class TinyEditor extends Field implements Contracts\HasFileAttachments
{
    use Concerns\HasFileAttachments;

    protected bool $isSimple = false;

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
}
