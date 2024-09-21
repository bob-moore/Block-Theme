<?php
/**
 * Container definition file
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @package https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

namespace Devkit\BlockTheme\DI;

use Devkit\BlockTheme\Core\Helpers,
	Devkit\BlockTheme\Core\Interfaces;

use Devkit\BlockTheme\Deps\DI,
	Devkit\BlockTheme\Deps\DI\DependencyException,
	Devkit\BlockTheme\Deps\DI\NotFoundException;

use InvalidArgumentException,
	WP_Error;

/**
 * Service Container
 *
 * @subpackage DI
 */
final class Container extends DI\Container
{
	/**
	 * Returns an entry of the container by its name.
	 *
	 * @param string $id : Entry name or a class name.
	 *
	 * @return mixed
	 *
	 * @throws DependencyException Error while resolving the entry.
	 * @throws NotFoundException No entry found for the given name.
	 */
	public function get( string $id ): mixed
	{
		/**
		 * Else load new service
		 */
		try {
			return $this->decorate( parent::get( $id ) );
		} catch ( DependencyException | NotFoundException $e ) {
			return new WP_Error( $e->getMessage() );
		}
	}
	/**
	 * Build an entry of the container by its name.
	 *
	 * This method behave like get() except resolves the entry again every time.
	 * For example if the entry is a class then a new instance will be created each time.
	 *
	 * This method makes the container behave like a factory.
	 *
	 * @param string|object $name Entry name or a class name.
	 * @param array<mixed>  $parameters Optional parameters to use to build the entry. Use this to force
	 *                                           specific parameters to specific values. Parameters not defined in this
	 *                                           array will be resolved using the container.
	 *
	 * @throws InvalidArgumentException The name parameter must be of type string.
	 * @throws DependencyException Error while resolving the entry.
	 * @throws NotFoundException No entry found for the given name.
	 * @return mixed
	 */
	public function make( string|object $name, array $parameters = [] ): mixed
	{
		try {
			return $this->decorate( parent::make( $name, $parameters ) );
		} catch ( InvalidArgumentException | NotFoundException $e ) {
			return new WP_Error( $e->getMessage() );
		}
	}
	/**
	 * Decorate known classes with extra functionality
	 *
	 * @param mixed $instance : all instances from the container.
	 *
	 * @return mixed $instance
	 */
	protected function decorate( $instance )
	{
		if ( is_object( $instance ) ) {
			/**
			 * Autowire PackageComponent instances
			 */
			if ( Helpers::implements( get_class( $instance ), Interfaces\Module::class ) ) {
				$instance->setPackage( $this->get( 'config.package' ) );
			}
			/**
			 * Autowire MountableComponent instances
			 */
			if ( Helpers::implements( get_class( $instance ), Interfaces\Mountable::class ) ) {
				if ( ! $instance->hasMounted() ) {
					$instance->onMount();
				}
			}

			$instance = apply_filters(
				"{$this->get( 'config.package' )}_decorate_instance",
				$instance,
				get_class( $instance )
			);
		}
		return $instance;
	}
}
