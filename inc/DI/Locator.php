<?php
/**
 * Service Locator
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

/**
 * Builder for Service Containers
 *
 * @subpackage DI
 */
class Locator
{
	/**
	 * Locate a specific service
	 *
	 * Use primarily by 3rd party interactions to remove actions/filters
	 *
	 * @param string $service : name of service to locate.
	 *
	 * @return mixed
	 */
	public static function get( string $service )
	{
		$container = ContainerBuilder::getContainer();

		if ( $container ) {
			return $container->get( $service );
		} else {
			return null;
		}
	}
	/**
	 * Resolve a new instance of a service
	 *
	 * @param string       $service : name of the service to make.
	 * @param array<mixed> $args : array of arguments to pass into the service constructor.
	 *
	 * @return mixed
	 */
	public static function make( string $service, array $args = [] )
	{
		$container = ContainerBuilder::getContainer();

		if ( $container ) {
			return $container->make( $service, $args );
		} else {
			return null;
		}
	}
	/**
	 * Set a service in the container.
	 *
	 * @param string $service : service name.
	 * @param mixed  $value : service value.
	 *
	 * @return void
	 */
	public static function set( string $service, $value )
	{
		$container = ContainerBuilder::getContainer();

		if ( $container ) {
			$container->set( $service, $value );
		}
	}
}
