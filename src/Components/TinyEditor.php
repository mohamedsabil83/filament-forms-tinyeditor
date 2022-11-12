<?php

namespace Mohamedsabil83\FilamentFormsTinyeditor\Components;

use Closure;
use Filament\Forms\Components\Concerns;
use Filament\Forms\Components\Contracts;
use Filament\Forms\Components\Field;

class TinyEditor extends Field implements Contracts\CanBeLengthConstrained, Contracts\HasFileAttachments
{
    use Concerns\CanBeLengthConstrained;
    use Concerns\HasFileAttachments;
    use Concerns\HasPlaceholder;

    protected bool $isSimple = false;

    protected bool $showMenuBar = false;

    protected int $height = 0;

    protected string $plugins;

    protected string $profile = 'default';

    protected string $toolbar;

    protected string $language;

    // TinyMCE var: relative_urls
    protected bool $relativeUrls = true;

    // TinyMCE var: remove_script_host
    protected bool $removeScriptHost = true;

    // TinyMCE var: convert_urls
    protected bool $convertUrls = true;

    // TinyMCE var: document_base_url
    protected string | Closure | null $documentBaseUrl = null;

    protected string $template;

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
            return 'autoresize directionality emoticons link wordcount';
        }

        if (config('filament-forms-tinyeditor.profiles.' . $this->profile . '.plugins')) {
            return config('filament-forms-tinyeditor.profiles.' . $this->profile . '.plugins');
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

        if (config('filament-forms-tinyeditor.profiles.' . $this->profile . '.toolbar')) {
            return config('filament-forms-tinyeditor.profiles.' . $this->profile . '.toolbar');
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

    public function getRelativeUrls(): bool
    {
        return $this->relativeUrls;
    }

    public function setRelativeUrls(bool $relativeUrls): static
    {
        $this->relativeUrls = $relativeUrls;

        return $this;
    }

    public function getRemoveScriptHost(): bool
    {
        return $this->removeScriptHost;
    }

    public function setRemoveScriptHost(bool $removeScriptHost): static
    {
        $this->removeScriptHost = $removeScriptHost;

        return $this;
    }

    public function getConvertUrls(): bool
    {
        return $this->convertUrls;
    }

    public function setConvertUrls(bool $convertUrls): static
    {
        $this->convertUrls = $convertUrls;

        return $this;
    }

    public function getDocumentBaseUrl(): string
    {
        if (is_null($this->documentBaseUrl)) {
            return config("app.url");
        } else {
            return $this->evaluate($this->documentBaseUrl);
        }
    }

    public function setDocumentBaseUrl(string | Closure $baseUrl): static
    {
        $this->documentBaseUrl = $baseUrl;

        return $this;
    }

    public function template(string $template): static
    {
        $this->template = $template;

        return $this;
    }

    public function getTemplate(): string
    {
        if (empty($this->template)) {
            return json_encode([]);
        }

        return json_encode(config('filament-forms-tinyeditor.templates.' . $this->template, []));
    }

    public function getCustomConfigs(): string
    {
        if (config('filament-forms-tinyeditor.profiles.' . $this->profile . '.custom_configs')) {
            return rtrim(ltrim(json_encode(config('filament-forms-tinyeditor.profiles.' . $this->profile . '.custom_configs')), '{'), '}');
        }

        return '';
    }
}
