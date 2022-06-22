<?php

namespace Afbora\View\Compiler;

use Illuminate\View\Compilers\BladeCompiler as Compiler;

class BladeCompiler extends Compiler
{
    /**
     * Register an "if" statement directive.
     *
     * @param string $name
     * @param callable $callback
     * @return void
     */
    public function if($name, callable $callback)
    {
        $this->conditions[$name] = $callback;

        $this->directive($name, function ($expression) use ($name) {
            return $expression !== ''
                ? "<?php if (option('afbora.blade.ifs')['{$name}']($expression)): ?>"
                : "<?php if (option('afbora.blade.ifs')['{$name}'](null)): ?>";
        });

        $this->directive('else' . $name, function ($expression) use ($name) {
            return $expression !== ''
                ? "<?php elseif (option('afbora.blade.ifs')['{$name}']($expression)): ?>"
                : "<?php elseif (option('afbora.blade.ifs')['{$name}'](null)): ?>";
        });

        $this->directive('end' . $name, function () {
            return '<?php endif; ?>';
        });
    }
}
