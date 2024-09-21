<?php

declare (strict_types=1);
namespace Devkit\BlockTheme\Deps\DI\Definition\Source;

use Devkit\BlockTheme\Deps\DI\Definition\Definition;
use Devkit\BlockTheme\Deps\DI\Definition\Exception\InvalidDefinition;
/**
 * Source of definitions for entries of the container.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
interface DefinitionSource
{
    /**
     * Returns the DI definition for the entry name.
     *
     * @throws InvalidDefinition An invalid definition was found.
     */
    public function getDefinition(string $name) : Definition|null;
    /**
     * @return array<string,Definition> Definitions indexed by their name.
     */
    public function getDefinitions() : array;
}
