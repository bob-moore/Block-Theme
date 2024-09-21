<?php
/**
 * Common utilities
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

namespace Devkit\BlockTheme\DI;

use Devkit\BlockTheme\Deps\DI\Definition\Source\DefinitionSource,
	Devkit\BlockTheme\Deps\DI\Definition\Reference,
	Devkit\BlockTheme\Deps\DI\Definition\StringDefinition,
	Devkit\BlockTheme\Deps\DI\Definition\ValueDefinition,
	Devkit\BlockTheme\Deps\DI\Definition\Helper;

/**
 * Utility functions for DI
 *
 * @subpackage DI
 */
class Utilities
{
	/**
	 * Wrapper for parent auto wire function. Only used for simplicity
	 *
	 * @param string $class_name : name of service to auto wire.
	 *
	 * @return Helper\DefinitionHelper
	 */
	public static function autowire( string $class_name = null ): Helper\DefinitionHelper
	{
		return \Devkit\BlockTheme\Deps\DI\autowire( $class_name );
	}
	/**
	 * Helper for defining an object.
	 *
	 * @param string|null $class_name Class name of the object.
	 *                               If null, the name of the entry (in the container) will be used as class name.
	 */
	public static function create( string $class_name = null ): Helper\DefinitionHelper
	{
		return \Devkit\BlockTheme\Deps\DI\create( $class_name );
	}
	/**
	 * Wrapper for parent get function. Only used for simplicity
	 *
	 * @param string $class_name : name of service to retrieve.
	 *
	 * @return Reference;
	 */
	public static function get( string $class_name ): Reference
	{
		return \Devkit\BlockTheme\Deps\DI\get( $class_name );
	}

	/**
	 * Helper for defining a container entry using a factory function/callable.
	 *
	 * @param callable|array<mixed>|string $factory : The factory is a callable that takes the container as parameter
	 *                                                and returns the value to register in the container.
	 */
	public static function factory( $factory ): Helper\DefinitionHelper
	{
		return \Devkit\BlockTheme\Deps\DI\factory( $factory );
	}
	/**
	 * Decorate the previous definition using a callable.
	 *
	 * Example:
	 *
	 *     'foo' => decorate(function ($foo, $container) {
	 *         return new CachedFoo($foo, $container->get('cache'));
	 *     })
	 *
	 * @param callable|array<mixed>|string $decorator : The callable takes the decorated object as first parameter and
	 *                                                  the container as second.
	 */
	public static function decorate( $decorator ): Helper\DefinitionHelper
	{
		return \Devkit\BlockTheme\Deps\DI\decorate( $decorator );
	}
	/**
	 * Undocumented function
	 *
	 * @param string $expression : A string expression. Use the `{}` placeholders to reference other container entries.
	 *
	 * @return StringDefinition
	 */
	public static function string( string $expression ): StringDefinition
	{
		return \Devkit\BlockTheme\Deps\DI\string( $expression );
	}
	/**
	 * Helper for defining a value.
	 *
	 * @param mixed $value : value definition.
	 *
	 * @return ValueDefinition
	 */
	public static function value( mixed $value ): ValueDefinition
	{
		return \Devkit\BlockTheme\Deps\DI\value( $value );
	}
}
