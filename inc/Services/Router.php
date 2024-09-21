<?php
/**
 * Router Service Definition
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @package https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

 namespace Devkit\BlockTheme\Services;

use Devkit\BlockTheme\Core\Abstracts,
	Devkit\BlockTheme\Entities,
	Devkit\BlockTheme\Core\DI,
	Devkit\BlockTheme\Collectors;

/**
 * Service class for router actions
 *
 * @subpackage Services
 */
class Router extends Abstracts\Module
{
	/**
	 * Routes available on current context
	 *
	 * @var array<int, string>
	 */
	protected array $routes = [];
	/**
	 * Define current route(s)
	 *
	 * Can't be run until 'wp' action when the query is available
	 *
	 * @return array<string>
	 */
	protected function mountRoutes(): array
	{
		switch ( true ) {
			case is_front_page() && ! is_home():
				$routes = [ 'frontend', 'single', 'frontpage' ];
				break;
			case is_home():
				$routes = [ 'frontend', 'archive', 'blog' ];
				break;
			case is_search():
				$routes = [ 'frontend', 'archive', 'search' ];
				break;
			case is_archive():
				$routes = [ 'frontend', 'archive' ];
				break;
			case is_singular():
				$routes = [ 'frontend', 'single' ];
				break;
			case is_404():
				$routes = [ 'frontend', '404' ];
				break;
			case is_login():
				$routes = [ 'login' ];
				break;
			case is_admin():
				$routes = [ 'admin' ];
				break;
			case wp_doing_ajax():
				$routes = [ 'ajax' ];
				break;
			case wp_doing_cron():
				$routes = [ 'cron' ];
				break;
			default:
				$routes = [ 'frontend' ];
		}
		return array_reverse( apply_filters( "{$this->package}_routes", $routes ) );
	}

	/**
	 * Getter for routes
	 *
	 * @param array<string> $default_routes : routes to prepend to the list.
	 *
	 * @return array<string>
	 */
	public function getRoutes( array $default_routes = [] ): array
	{
		if ( empty( $this->routes ) ) {
			$this->routes = $this->mountRoutes();
		}

		return ! empty( $default_routes )
		? array_merge( $default_routes, $this->routes )
		: $this->routes;
	}
	/**
	 * Fire router ready action
	 *
	 * @return void
	 */
	public function dispatchRoute(): void
	{
		foreach ( $this->getRoutes() as $route ) {
			do_action( "{$this->package}_dispatch_route", $route );
		}
	}
}
