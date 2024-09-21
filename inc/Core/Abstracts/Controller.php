<?php
/**
 * MountableComponent definition file
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @package https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

namespace Devkit\BlockTheme\Core\Abstracts;

use Devkit\BlockTheme\Core\Interfaces,
	Devkit\BlockTheme\Core\Traits;

/**
 * Abstract ActionModule class
 *
 * Action modules are modules that have actions and filters that need to be mounted.
 *
 * @subpackage Abstracts
 */
abstract class Controller extends Module implements Interfaces\Controller, Interfaces\Mountable
{
	use Traits\Mountable;
	use Traits\ActionLoader;
	use Traits\FilterLoader;

	/**
	 * Public constructor
	 *
	 * Adds function to the onMount action, to further execute the mountActions and mountFilters functions.
	 */
	public function __construct()
	{
		add_action( "{$this->getClassSlug()}_mount", [ $this, 'mountActions' ], 5 );
		add_action( "{$this->getClassSlug()}_mount", [ $this, 'mountFilters' ], 5 );

		parent::__construct();
	}
	/**
	 * Get definitions that should be added to the service container
	 *
	 * @return array<string, mixed>
	 */
	public static function getServiceDefinitions(): array
	{
		return [];
	}
}
