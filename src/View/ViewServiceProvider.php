<?php

namespace Afbora\View;

use Afbora\View\Compiler\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\ViewServiceProvider as ViewProvider;
use Pine\BladeFilters\BladeFiltersServiceProvider;

class ViewServiceProvider extends ViewProvider
{
    /**
     * Register the Blade engine implementation.
     *
     * @param \Illuminate\View\Engines\EngineResolver $resolver
     * @return void
     */
    public function registerBladeEngine($resolver)
    {
        // The Compiler engine requires an instance of the CompilerInterface, which in
        // this case will be the Blade compiler, so we'll first create the compiler
        // instance to pass into the engine so it can compile the views properly.
        $this->app->singleton('blade.compiler', function () {
            return new BladeCompiler(
                $this->app['files'],
                $this->app['config']['view.compiled']
            );
        });

        // Add blade filters service provider
        (new BladeFiltersServiceProvider($this->app))->boot();

        $resolver->register('blade', function () {
            return new CompilerEngine($this->app['blade.compiler']);
        });
    }

    /**
     * Create a new Factory Instance.
     *
     * @param \Illuminate\View\Engines\EngineResolver $resolver
     * @param \Illuminate\View\ViewFinderInterface $finder
     * @param \Illuminate\Contracts\Events\Dispatcher $events
     * @return \Afbora\View\Factory
     */
    protected function createFactory($resolver, $finder, $events)
    {
        return new Factory($resolver, $finder, $events);
    }
}
