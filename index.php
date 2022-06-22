<?php

use Afbora\Template;
use Kirby\Cms\App as Kirby;

// override Kirby `e()` function to use Laravel `e()` function
// if you don't install via composer, you need to define `KIRBY_HELPER_E` from root index.php
if (defined('KIRBY_HELPER_E') === false) {
    define('KIRBY_HELPER_E', false);
}

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('afbora/blade', [
    'options' => [
        'views' => function () {
            return kirby()->roots()->cache() . '/views';
        },
        'directives' => [],
        'ifs' => [],
        'minify' => [
            'enabled' => false,
            'options' => [],
        ]
    ],
    'components' => [
        'template' => function (Kirby $kirby, string $name, string $contentType = null) {
            return new Template($kirby, $name, $contentType);
        }
    ],
    'routes' => [
        [
            // Block all requests to /url.blade and return 404
            'pattern' => '(:all)\.blade',
            'action' => function ($all) {
                return false;
            }
        ]
    ]
]);
