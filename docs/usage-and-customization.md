---
title: Usage & Customization
---

## Usage

```php
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

TinyEditor::make('content')
```

## Customization

There is some customization that can be applied to the editor.

### **Simple editor**

To use a predefined simple editor, you may use the `simple()` method:

```php
TinyEditor::make('content')->simple()
```

### **Toolbar**

You can add many editors with differnt toolbars for each of them. First, publish the configuration files:

```bash
php artisan vendor:publish --tag="filament-forms-tinyeditor-config"
```

Each profile looks like the following: (You can add as many you want):

```php
'simple' => [
    'plugins' => 'directionality emoticons link wordcount',
    'toolbar' => 'removeformat | bold italic | rtl ltr | link emoticons',
],
```

Then, use each of the profile when adding editor:

```php
TinyEditor::make('content')->profile('your-profile-name')
```

For more information about available plugins and toolbar buttons, visit the related page on the [TinyMCE](https://www.tiny.cloud/docs/advanced/available-toolbar-buttons) site.

### **Custom TinyMCE Config**

By default, tinymce initialized with necessary configs, but if you want to add your config for example `image_advtab: true` ([image_advtab@TinyMce Docs](https://www.tiny.cloud/docs/plugins/opensource/image/#exampleusingimage_advtab)) you can use custom_configs key inside laravel configuration file

You need to convert tinymce json to php array.

Eg. `image_advtab: true` to `'image_advtab' => true`.

Eg.
```js
image_class_list: [
    {title: 'None', value: ''},
    {title: 'Fluid', value: 'img-fluid'},
]
```
to
```php
'image_class_list' => [
    [
        'title' => 'None',
        'value' => '',
    ],
    [
        'title' => 'Fluid',
        'value' => 'img-fluid',
    ]
]
```

There is no restriction of configs, you can add everything in here it will be converted and added to tinymce.init() function

```php
// config/filament-forms-tinyeditor.php

'simple' => [
    'plugins' => 'directionality emoticons link wordcount',
    'toolbar' => 'removeformat | bold italic | rtl ltr | link emoticons',
    'custom_configs' => [
        'image_advtab' => true
    ]
],
```

Will be converted and added to javascript directly.
```js
tinymce.init({
    //... all other things
    "image_advtab": true
})
```
### **Image Upload**
You can customize how the image plugin handles uploads using the methods associated with the `HasFileAttachments` trait. This measns you can specify the storage disk driver, directory and image visibility easily using methods directly on the field component.
```php
TinyEditor::make('content')->fileAttachmentsDisk('local')->fileAttachmentsVisibility('public')->fileAttachmentsDirectory('uploads'),
```

### **Editor Height**

By default, the editor will automatically resizes to match the content inside it. If you need to control the height of the editor you can use `->minHeight(int)` method to set the **minimum height** and `->maxHeight(int)` method to set the **maximum height**.

```php
TinyEditor::make('content')->minHeight(300)
```

```php
TinyEditor::make('content')->maxHeight(300)
```

### **Show menubar**

To show the menubar of the editor, use the `->showMenuBar()` method:

```php
TinyEditor::make('content')->showMenuBar()
```

### **Sticky menubar**

To sticky the menubar of the editor, use the `->toolbarSticky()` method:

```php
TinyEditor::make('content')->toolbarSticky(true)
```

### **Localization**

By default, toolbar button labels shown same as current laravel locale. To force editor to use a specific language, you can use tge `->language()` method:

```php
TinyEditor::make('content')->language('ar')
```

You can found [here](https://www.jsdelivr.com/package/npm/tinymce-i18n?tab=files&path=langs5) a list of all available languages.
