# Kirby Blade

Kirby Blade use Laravel `illuminate/view` 5.8+ package and compatible with Kirby 3.

This package enable [Laravel Blade](https://laravel.com/docs/5.8/blade) for your own Kirby applications.

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

You can use the power of Blade like [Layouts](https://laravel.com/docs/5.8/blade#template-inheritance), [Control Structures](https://laravel.com/docs/5.8/blade#control-structures), [Sub-Views](https://laravel.com/docs/5.8/blade#including-sub-views), Directives and your Custom If Statements.

All the documentation about Laravel Blade is in the [official documentation](https://laravel.com/docs/5.8/blade).

## Options

The default values of the package are:

| Option | Default | Values | Description |
|:--|:--|:--|:--|
| afbora.blade.views | site/cache/views | (string) | Location of the views cached |
| afbora.blade.directives | [] | (array) | Array with the custom directives |
| afbora.blade.ifs | [] | (array) | Array with the custom if statements |

All the values can be updated in the `config.php` file.

### Views

All the views generated are stored in `site/cache/views` directory or wherever you define your `cache` directory, but you can change this easily:

```php
'afbora.blade.views' => '/site/storage/views',
```

### Templates

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

Developed from [Kirby Blade Repository](https://github.com/beebmx/kirby-blade) maintained by [@beebmx](https://github.com/beebmx)
