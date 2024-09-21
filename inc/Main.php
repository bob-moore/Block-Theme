<?php
/**
 * Main app file
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @package https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

namespace Devkit\BlockTheme;

/**
 * Main App Class
 *
 * Defines the service container and mounts the plugin.
 *
 * @subpackage Traits
 */
class Main extends Core\Abstracts\Controller
{
	/**
	 * Get service definitions to add to service container
	 *
	 * @return array<string, mixed>
	 */
	public static function getServiceDefinitions(): array
	{
		return [
			Controllers\Services::class   => DI\Utilities::autowire(),
			Controllers\Routes::class     => DI\Utilities::autowire(),
			Controllers\Components::class => DI\Utilities::autowire(),
		];
	}
	/**
	 * Fire Mounted action on mount
	 *
	 * @return void
	 */
	public function onMount(): void
	{
		DI\Locator::get( Controllers\Services::class );
		DI\Locator::get( Controllers\Routes::class );
		DI\Locator::get( Controllers\Components::class );

		parent::onMount();
	}
	/**
	 * Locate a specific service
	 *
	 * Use primarily by 3rd party interactions to remove actions/filters
	 *
	 * @param string $service : name of service to locate.
	 *
	 * @return mixed
	 */
	public static function locateService( string $service ): mixed
	{
		$retrieved = DI\Locator::get( $service );

		if ( is_wp_error( $retrieved ) ) {
			$retrieved = DI\Locator::get( __NAMESPACE__ . '\\' . $service );
		}

		return $retrieved;
	}
}
