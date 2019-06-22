<?php

use Afbora\Template;
use Kirby\Cms\App as Kirby;

Kirby::plugin('afbora/blade', [
    'options' => [
        'views' => function () 
        {
            return kirby()->roots()->cache() . '/views';
        },
        'directives' => [],
        'ifs' => [],
    ],
    'components' => [
        'template' => function (Kirby $kirby, string $name, string $contentType = null) 
        {
            return new Template($kirby, $name, $contentType);
        }
    ]
]);
