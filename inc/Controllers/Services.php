<?php
/**
 * Service Controller
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
	Devkit\BlockTheme\Services as Service,
	Devkit\BlockTheme\Core\Abstracts;

/**
 * Controls the registration and execution of services
 *
 * @subpackage Controllers
 */
class Services extends Abstracts\Controller
{
	/**
	 * Router class
	 *
	 * Responsible for loading element queue and dispatching routes
	 *
	 * @var Service\Router
	 */
	protected Service\Router $router;
	/**
	 * Block loader class
	 *
	 * Responsible for loading assets for blocks
	 *
	 * @var Service\BlockLoader
	 */
	protected Service\BlockLoader $block_loader;
	/**
	 * Public constructor
	 *
	 * @param Service\Router      $router : router service instance.
	 * @param Service\BlockLoader $block_loader : block loader service instance.
	 */
	public function __construct(
		Service\Router $router,
		Service\BlockLoader $block_loader
	) {
		$this->router = $router;
		$this->block_loader = $block_loader;
		parent::__construct();
	}
	/**
	 * Get definitions that should be added to the service container
	 *
	 * @return array<string, mixed>
	 */
	public static function getServiceDefinitions(): array
	{
		return [
			Service\Router::class           => DI\Utilities::autowire(),
			Service\BlockLoader::class      => DI\Utilities::autowire(),
			Service\ScriptLoader::class     => DI\Utilities::autowire(),
			Service\StyleLoader::class      => DI\Utilities::autowire(),
		];
	}
	/**
	 * Mount actions for this class
	 *
	 * @return void
	 */
	public function mountActions(): void
	{
		add_action( 'wp', [ $this->router, 'dispatchRoute' ], 4 );
		add_action( 'admin_init', [ $this->router, 'dispatchRoute' ], 4 );
	}
}
