<?php

declare (strict_types=1);
namespace Devkit\BlockTheme\Deps\DI\Definition\Source;

use Devkit\BlockTheme\Deps\DI\Definition\Exception\InvalidDefinition;
use Devkit\BlockTheme\Deps\DI\Definition\ObjectDefinition;
/**
 * Implementation used when autowiring is completely disabled.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class NoAutowiring implements Autowiring
{
    public function autowire(string $name, ?ObjectDefinition $definition = null) : ObjectDefinition|null
    {
        throw new InvalidDefinition(\sprintf('Cannot autowire entry "%s" because autowiring is disabled', $name));
    }
}
