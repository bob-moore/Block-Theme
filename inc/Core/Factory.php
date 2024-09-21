<?php
/**
 * Main app file
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

namespace Devkit\BlockTheme\Core;

use Devkit\BlockTheme\DI,
	Devkit\BlockTheme\Deps;

/**
 * Main App Class
 *
 * Defines the service container and mounts the plugin.
 *
 * @subpackage Traits
 */
class Factory
{
	/**
	 * Create a new instance
	 *
	 * @param string               $class : class name of the package to create.
	 * @param array<string, mixed> $config : configuration array.
	 *
	 * @return object
	 */
	public static function create( string $class, array $config = [] ): object
	{
		$container = self::buildContainer( $class, $config );
		return $container->get( $class );
	}
	/**
	 * Get the package name based on root namespace
	 *
	 * @return string
	 */
	public static function package(): string
	{
		return Helpers::slugify( str_replace( '\\Core', '', __NAMESPACE__ ) );
	}
	/**
	 * Build the service container
	 * - Instantiate a new container builder
	 * - Add plugin specific definitions
	 * - Get service definitions from controllers
	 *
	 * @param string               $class : class of the package to create.
	 * @param array<string, mixed> $config : optional configuration array.
	 *
	 * @return Deps\DI\Container
	 */
	protected static function buildContainer( string $class, array $config = [] ): Deps\DI\Container
	{
		$container_builder = new DI\ContainerBuilder();

		$container_builder->addDefinitions(
			wp_parse_args(
				$config,
				[
					'config.dir'     => untrailingslashit( get_theme_file_path() ),
					'config.url'     => untrailingslashit( get_theme_file_uri() ),
					'config.package' => self::package(),
				]
			)
		);

		$container_builder->addDefinitions( [ $class  => DI\Utilities::autowire() ] );

		$container = $container_builder->build();

		return $container;
	}
}
