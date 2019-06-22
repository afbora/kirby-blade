<?php

namespace Afbora\View;

use Illuminate\View\Factory as FactoryView;
use Afbora\View\Concerns\ManagesLayouts;

class Factory extends FactoryView
{
    use ManagesLayouts;
}
