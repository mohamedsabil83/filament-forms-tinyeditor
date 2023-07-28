<?php

namespace Mohamedsabil83\FilamentFormsTinyeditor;

use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentFormsTinyeditorServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-forms-tinyeditor';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Js::make('tinymce', 'https://cdn.jsdelivr.net/npm/tinymce@5.10.7/tinymce.min.js'),
            Js::make('tiny-editor', __DIR__.'/../resources/dist/js/tiny-editor.js'),
            Js::make('tinymce-lang-ar', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ar.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-az', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/az.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-bg_BG', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/bg_BG.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-bn_BD', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/bn_BD.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ca', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ca.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-cs', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/cs.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-cy', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/cy.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-da', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/da.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-de', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/de.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-dv', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/dv.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-el', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/el.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-eo', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/eo.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-es', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/es.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-es_ES', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/es_ES.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-et', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/et.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-es_MX', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/es_MX.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-eu', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/eu.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-fa', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/fa.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-fa_IR', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/fa_IR.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-fi', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/fi.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-fr_FR', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/fr_FR.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ga', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ga.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-gl', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/gl.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-he_IL', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/he_IL.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-hr', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/hr.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-hu_HU', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/hu_HU.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-hy', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/hy.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-id', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/id.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-is_IS', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/is_IS.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-it', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/it.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-it_IT', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/it_IT.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ja', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ja.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-kab', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/kab.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-kk', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/kk.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ko_KR', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ko_KR.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ku', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ku.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-lt', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/lt.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-lv', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/lv.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-nb_NO', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/nb_NO.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-nl', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/nl.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-nl_BE', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/nl_BE.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-oc', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/oc.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-pl', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/pl.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-pt_BR', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/pt_BR.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-pt_PT', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/pt_PT.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ro', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ro.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ro_RO', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ro_RO.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ru', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ru.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ru_RU', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ru_RU.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-sk', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/sk.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-sl', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/sl.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-sl_SI', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/sl_SI.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-sq', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/sq.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-sr', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/sr.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-sv_SE', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/sv_SE.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ta', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ta.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ta_IN', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ta_IN.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-tg', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/tg.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-th_TH', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/th_TH.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-tr', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/tr.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-tr_TR', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/tr_TR.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-ug', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/ug.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-uk', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/uk.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-vi', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/vi.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-zh_CN', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/zh_CN.min.js')->loadedOnRequest(),
            Js::make('tinymce-lang-zh_TW', 'https://cdn.jsdelivr.net/npm/tinymce-i18n@23.7.24/langs5/zh_TW.min.js')->loadedOnRequest(),
        ], package: 'mohamedsabil83/filament-forms-tinyeditor');
    }
}
