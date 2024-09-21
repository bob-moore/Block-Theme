<?php
/**
 * Handler Controller
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

 namespace Devkit\BlockTheme\Controllers;

use Devkit\BlockTheme\DI,
	Devkit\BlockTheme\Routes as Route,
	Devkit\BlockTheme\Core\Interfaces,
	Devkit\BlockTheme\Core\Helpers,
	Devkit\BlockTheme\Core\Abstracts;

 /**
  * Controls the registration and execution of handlers
  *
  * @subpackage Controllers
  */
class Routes extends Abstracts\Controller
{
	/**
	 * Get definitions that should be added to the service container
	 *
	 * @return array<string, mixed>
	 */
	public static function getServiceDefinitions(): array
	{
		// ->method( 'setRenderer', DI\Utilities::get( Services\Renderer::class ) ),
		return [
			Route\Archive::class  => DI\Utilities::autowire(),
			Route\Search::class   => DI\Utilities::autowire(),
			Route\Blog::class     => DI\Utilities::autowire(),
			Route\Single::class   => DI\Utilities::autowire(),
			Route\Frontend::class => DI\Utilities::autowire(),
			Route\Login::class    => DI\Utilities::autowire(),
			Route\Admin::class    => DI\Utilities::autowire(),
			'route.archive'       => DI\Utilities::get( Route\Archive::class ),
			'route.search'        => DI\Utilities::get( Route\Search::class ),
			'route.blog'          => DI\Utilities::get( Route\Blog::class ),
			'route.single'        => DI\Utilities::get( Route\Single::class ),
			'route.admin'         => DI\Utilities::get( Route\Admin::class ),
			'route.frontend'      => DI\Utilities::get( Route\Frontend::class ),
			'login'               => DI\Utilities::get( Route\Login::class ),
		];
	}
	/**
	 * Mount actions for this class
	 *
	 * @return void
	 */
	public function mountActions(): void
	{
		add_action( "{$this->package}_dispatch_route", [ $this, 'mountRoute' ] );
	}
	/**
	 * Load a singular route
	 *
	 * @param string $route_name : string route name.
	 *
	 * @return void
	 */
	public function mountRoute( string $route_name ): void
	{
		$current = DI\Locator::get( 'route.current' );

		if (
			is_object( $current )
			&& Helpers::implements( get_class( $current ), Interfaces\Route::class )
		) {
			return;
		}

		$alias = 'route.' . strtolower( $route_name );

		$route = DI\Locator::get( $alias );

		if ( $route ) {
			DI\Locator::set( 'route.current', $route );
		}
	}
}
