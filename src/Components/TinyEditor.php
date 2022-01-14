<?php

namespace Mohamedsabil83\FilamentFormsTinyeditor\Components;

use Closure;
use Filament\Forms\Components\Concerns;
use Filament\Forms\Components\Contracts;
use Filament\Forms\Components\Field;

class TinyEditor extends Field implements Contracts\HasFileAttachments
{
    use Concerns\HasFileAttachments;

    protected bool $isSimple = false;

    protected bool $showMenuBar = false;

    protected int $height = 200;

    protected string $plugins;

    protected string $profile = 'default';

    protected string $toolbar;

    protected string $language;

    protected string $view = 'filament-forms-tinyeditor::tiny-editor';

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getInterfaceLanguage(): string
    {
        return $this->language ?? app()->getLocale();
    }

    public function getPlugins(): string
    {
        if ($this->isSimple()) {
            return 'directionality emoticons link wordcount';
        }

        if (config('filament-forms-tinyeditor.profiles.'.$this->profile.'.plugins')) {
            return config('filament-forms-tinyeditor.profiles.'.$this->profile.'.plugins');
        }

        return 'advlist codesample directionality emoticons fullscreen hr image imagetools link lists media table toc wordcount';
    }

    public function getShowMenuBar(): bool
    {
        return $this->showMenuBar;
    }

    public function getToolbar(): string
    {
        if ($this->isSimple()) {
            return 'removeformat | bold italic | rtl ltr | link emoticons';
        }

        if (config('filament-forms-tinyeditor.profiles.'.$this->profile.'.toolbar')) {
            return config('filament-forms-tinyeditor.profiles.'.$this->profile.'.toolbar');
        }

        return 'undo redo removeformat | formatselect fontsizeselect | bold italic | rtl ltr | alignjustify alignright aligncenter alignleft | numlist bullist | forecolor backcolor | blockquote table toc hr | image link media codesample emoticons | wordcount fullscreen';
    }

    public function height(int $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function isSimple(): bool
    {
        return (bool) $this->evaluate($this->isSimple);
    }

    public function language(?string $language = null): static
    {
        $this->language = $language ?? app()->getLocale();

        return $this;
    }

    public function profile(string $profile): static
    {
        $this->profile = $profile;

        return $this;
    }

    public function showMenuBar(): static
    {
        $this->showMenuBar = true;

        return $this;
    }

    public function simple(bool | callable $condition = true): static
    {
        $this->isSimple = $condition;

        return $this;
    }
}
