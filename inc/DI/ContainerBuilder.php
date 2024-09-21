<?php
/**
 * Container Builder
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

use Devkit\BlockTheme\Deps\DI\Definition\Source\DefinitionSource,
	Devkit\BlockTheme\Deps\DI\Container as DepContainer,
	Devkit\BlockTheme\Deps\DI\Definition\Helper;

/**
 * Builder for Service Containers
 *
 * @subpackage DI
 */
class ContainerBuilder extends \Devkit\BlockTheme\Deps\DI\ContainerBuilder
{
	/**
	 * Saved containers for later retrieval
	 *
	 * Used to cache containers, so services can be retrieved without
	 * singletons
	 *
	 * @var DepContainer
	 */
	protected static $container;
	/**
	 * Constructor for new instances
	 *
	 * Sets parent containerClass to DL\Container instead of default
	 */
	public function __construct()
	{
		parent::__construct( Container::class );
	}
	/**
	 * Wrapper for the parent build function. Used to cache the container.
	 *
	 * @return DepContainer
	 */
	public function build(): DepContainer
	{
		$container = parent::build();

		self::$container = $container;

		return $container;
	}
	/**
	 * Get the container
	 *
	 * @return DepContainer|null
	 */
	public static function getContainer(): ?DepContainer
	{
		return self::$container;
	}
	/**
	 * Add definitions to the container.
	 *
	 * @param string|array<mixed>|DefinitionSource ...$definitions Can be an array of definitions, the
	 *                                                      name of a file containing definitions
	 *                                                      or a DefinitionSource object.
	 * @return $this
	 */
	public function addDefinitions( ...$definitions ): self
	{
		parent::addDefinitions( $this->extendAutowiring( ...$definitions ) );

		$this->resolveNestedDefinitions( ...$definitions );

		return $this;
	}
	/**
	 * Extend autowiring definitions
	 *
	 * @param array<mixed> $definitions : array of definitions to extend.
	 *
	 * @return array<mixed>
	 */
	protected function extendAutowiring( $definitions )
	{
		foreach ( $definitions as $key => $definition ) {
			if ( ! $this->isAutowireHelper( $definition ) ) {
				continue;
			}
			$class_name = $this->getAutowiredClass( $definition, $key );

			if ( Helpers::implements( $class_name, Interfaces\Module::class ) ) {
				$definition->method( 'setPackage', Utilities::get( 'config.package' ) );
			}

			if ( Helpers::implements( $class_name, Interfaces\Controller::class ) ) {
				$definition->method( 'onMount' );
			}
		}
		return $definitions;
	}
	/**
	 * Resolve nested definitions
	 *
	 * @param array<mixed> $definitions : array of definitions to resolve.
	 *
	 * @return void
	 */
	protected function resolveNestedDefinitions( $definitions )
	{
		$extended = array_map(
			function ( $definition, $key ) {

				if ( ! $this->isAutowireHelper( $definition ) ) {
					  return false;
				}

				$class_name = $this->getAutowiredClass( $definition, $key );

				if ( Helpers::implements( $class_name, Interfaces\Controller::class ) ) {
					return $class_name::getServiceDefinitions();
				}
				return false;
			},
			$definitions,
			array_keys( $definitions )
		);

		$extended = array_filter( $extended );

		if ( ! empty( $extended ) ) {
			$this->addDefinitions( array_merge( ...$extended ) );
		}
	}
	/**
	 * Check if the definition is an autowire helper.
	 *
	 * @param mixed $definition : definition to check.
	 *
	 * @return bool
	 */
	protected function isAutowireHelper( $definition ): bool
	{
		if ( ! is_object( $definition ) ) {
			return false;
		}

		return Helpers::classUses( $definition, Helper\AutowireDefinitionHelper::class );
	}
	/**
	 * Get the class name of the definition
	 *
	 * @param mixed $definition : definition to check.
	 * @param mixed $key : key of the definition.
	 *
	 * @return string
	 */
	protected function getAutowiredClass( $definition, $key )
	{
		$definition_object = $definition->getDefinition( $key );

		$class_name = $definition_object->getClassName();

		return $class_name;
	}
}
