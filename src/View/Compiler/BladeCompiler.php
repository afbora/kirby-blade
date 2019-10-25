<?php

namespace Afbora\View\Compiler;

use Illuminate\View\Compilers\BladeCompiler as Compiler;

class BladeCompiler extends Compiler
{
    /**
     * The "regular" / legacy echo string format.
     *
     * @var string
     */
    protected $echoFormat = '_e(%s)';

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

    /**
     * Set the "echo" format to double encode entities.
     *
     * @return void
     */
    public function withDoubleEncoding()
    {
        $this->setEchoFormat('_e(%s, true)');
    }

    /**
     * Set the "echo" format to not double encode entities.
     *
     * @return void
     */
    public function withoutDoubleEncoding()
    {
        $this->setEchoFormat('_e(%s, false)');
    }
}
