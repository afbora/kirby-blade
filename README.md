# Kirby Blade

[![Source](https://img.shields.io/badge/source-afbora/kirby--blade-blue?style=flat-square)](https://github.com/afbora/kirby-blade)
[![Download](https://img.shields.io/packagist/dt/afbora/kirby-blade?style=flat-square)](https://github.com/afbora/kirby-blade)
[![Open Issues](https://img.shields.io/github/issues-raw/afbora/kirby-blade?style=flat-square)](https://github.com/afbora/kirby-blade)
[![Last Commit](https://img.shields.io/github/last-commit/afbora/kirby-blade?style=flat-square)](https://github.com/afbora/kirby-blade)
[![Release](https://img.shields.io/github/v/release/afbora/kirby-blade?style=flat-square)](https://github.com/afbora/kirby-blade)
[![License](https://img.shields.io/github/license/afbora/kirby-blade?style=flat-square)](https://github.com/afbora/kirby-blade)

Kirby Blade use Laravel `illuminate/view` 8.x package and compatible with Kirby 3.

This package enable [Laravel Blade](https://laravel.com/docs/8.x/blade) for your own Kirby applications.

## Installation

### Installation with composer

```ssh
composer require afbora/kirby-blade
```

### Add as git submodule

```ssh
git submodule add https://github.com/afbora/kirby-blade.git site/plugins/kirby-blade
```

## What is Blade?

According to Laravel Blade documentation is:

> Blade is the simple, yet powerful templating engine provided with Laravel. Unlike other popular PHP templating engines, Blade does not restrict you from using plain PHP code in your views. In fact, all Blade views are compiled into plain PHP code and cached until they are modified, meaning Blade adds essentially zero overhead to your application. Blade view files use the .blade.php file extension.

## Usage

You can use the power of Blade like [Layouts](https://laravel.com/docs/8.x/blade#building-layouts), [Forms](https://laravel.com/docs/8.x/blade#forms), [Sub-Views](https://laravel.com/docs/8.x/blade#including-subviews), [Components](https://laravel.com/docs/8.x/blade#components), [Directives](https://laravel.com/docs/8.x/blade#blade-directives) and your custom if statements.

All the documentation about Laravel Blade is in the [official documentation](https://laravel.com/docs/8.x/blade).

## Options

The default values of the package are:

| Option | Default | Values | Description |
|:---|:---|:---|:---|
| afbora.blade.templates | site/templates | (string) | Location of the templates |
| afbora.blade.views | site/cache/views | (string) | Location of the views cached |
| afbora.blade.directives | [] | (array) | Array with the custom directives |
| afbora.blade.ifs | [] | (array) | Array with the custom if statements |
| afbora.blade.minify.enabled | false | (boolean) | Enable/disable minify HTML output |
| afbora.blade.minify.options | [] | (array) | Minify supported options |

All the values can be updated in the `config.php` file.

### Templates

Default templates folder is `site/templates` directory or wherever you define your `templates` directory, but you can change this easily:

```php
'afbora.blade.templates' => '/theme/default/templates',
```

You can find Kirby Starterkit blade templates in repository `/templates` folder.

```
├── layouts
│   └── default.blade.php
├── partials
│   ├── album.blade.php
│   ├── image.blade.php
│   ├── note.blade.php
│   └── photography.blade.php
├── about.blade.php
├── album.blade.php
├── default.blade.php
├── home.blade.php
├── note.blade.php
├── notes.blade.php
└── photography.blade.php
```

### Views

All the views generated are stored in `site/cache/views` directory or wherever you define your `cache` directory, but you can change this easily:

```php
'afbora.blade.views' => '/site/storage/views',
```

### Directives

By default Kirby Blade comes with following directives:

```php
@asset($path)
@csrf()
@css($path)
@dump($variable)
@e($condition, $value, $alternative)
@get($key, $default)
@gist($url)
@go($url, $code)
@h($string, $keepTags)
@html($string, $keepTags)
@js($path)
@image($path, $attr) // @image('forrest.jpg', 'url')
@kirbytag($type, $value, $attr)
@kirbytags($text, $data)
@kirbytext($text, $data)
@kirbytextinline($text)
@kt($text)
@markdown($text)
@option($key, $default)
@page($key, $attr) // @page('blog', 'title')
@param($key, $fallback)
@site($attr) // @site(title')
@size($value)
@smartypants($text)
@snippet($name, $data)
@svg($file)
@t($key, $fallback)
@tc($key, $count)
@tt($key, $fallback, $replace, $locale)
@u($path, $options)
@url($path, $options)
@video($url, $options, $attr)
@vimeo($url, $options, $attr)
@widont($string)
@youtube($url, $options, $attr)
```

But you can create your own:

```php
'afbora.blade.directives' => [
    'greeting' => function ($text)
    {
        return "<?php echo 'Hello: ' . $text ?>";
    },
],
```

Kirby Helpers Documentation:

https://getkirby.com/docs/reference/templates/helpers

### If Statements

Like directives, you can create your own if statements:

```php
'afbora.blade.ifs' => [
    'logged' => function ()
    {
        return !!kirby()->user();
    },
],
```

After declaration you can use it like:

```php
@logged
    Welcome back {{ $kirby->user()->name() }}
@else
    Please Log In
@endlogged
```

### Filters

**Breaking Change: After the 1.6 version, the filters feature has been removed. Use 1.5.x to use filters.**

### Minify

**Setup**

```php
'afbora.blade.minify.enabled' => true,
'afbora.blade.minify.options' => [
    'doOptimizeViaHtmlDomParser' => true, // set true/false or remove line to default
    'doRemoveSpacesBetweenTags'  => false // set true/false or remove line to default
],
```

**Available Minify Options**

| Option | Description |
|:---|:---|
| doOptimizeViaHtmlDomParser | optimize html via "HtmlDomParser()" |
| doRemoveComments | remove default HTML comments (depends on "doOptimizeViaHtmlDomParser(true)") |
| doSumUpWhitespace | sum-up extra whitespace from the Dom (depends on "doOptimizeViaHtmlDomParser(true)") |
| doRemoveWhitespaceAroundTags | remove whitespace around tags (depends on "doOptimizeViaHtmlDomParser(true)") |
| doOptimizeAttributes | optimize html attributes (depends on "doOptimizeViaHtmlDomParser(true)") |
| doRemoveHttpPrefixFromAttributes | remove optional "http:"-prefix from attributes (depends on "doOptimizeAttributes(true)") |
| doRemoveHttpsPrefixFromAttributes | remove optional "https:"-prefix from attributes (depends on "doOptimizeAttributes(true)") |
| doKeepHttpAndHttpsPrefixOnExternalAttributes | keep "http:"- and "https:"-prefix for all external links |
| doMakeSameDomainsLinksRelative | make some links relative, by removing the domain from attributes |
| doRemoveDefaultAttributes | remove defaults (depends on "doOptimizeAttributes(true)" | disabled by default) |
| doRemoveDeprecatedAnchorName | remove deprecated anchor-jump (depends on "doOptimizeAttributes(true)") |
| doRemoveDeprecatedScriptCharsetAttribute | remove deprecated charset-attribute - the browser will use the charset from the HTTP-Header, anyway (depends on "doOptimizeAttributes(true)") |
| doRemoveDeprecatedTypeFromScriptTag | remove deprecated script-mime-types (depends on "doOptimizeAttributes(true)") |
| doRemoveDeprecatedTypeFromStylesheetLink | remove "type=text/css" for css links (depends on "doOptimizeAttributes(true)") |
| doRemoveDeprecatedTypeFromStyleAndLinkTag | remove "type=text/css" from all links and styles |
| doRemoveDefaultMediaTypeFromStyleAndLinkTag | remove "media="all" from all links and styles |
| doRemoveDefaultTypeFromButton | remove type="submit" from button tags |
| doRemoveEmptyAttributes | remove some empty attributes (depends on "doOptimizeAttributes(true)") |
| doRemoveValueFromEmptyInput | remove 'value=""' from empty `<input>` (depends on "doOptimizeAttributes(true)") |
| doSortCssClassNames | sort css-class-names, for better gzip results (depends on "doOptimizeAttributes(true)") |
| doSortHtmlAttributes | sort html-attributes, for better gzip results (depends on "doOptimizeAttributes(true)") |
| doRemoveSpacesBetweenTags | remove more (aggressive) spaces in the dom (disabled by default) |
| doRemoveOmittedQuotes | remove quotes e.g. class="lall" => class=lall |
| doRemoveOmittedHtmlTags | remove ommitted html tags e.g. \<p\>lall\<\/p\> => \<p\>lall |
You can get detailed information from `HtmlMin` library: [voku/HtmlMin](https://github.com/voku/HtmlMin#options)

*Developed from [Kirby Blade Repository](https://github.com/beebmx/kirby-blade) maintained by [@beebmx](https://github.com/beebmx)*
