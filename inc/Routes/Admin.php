<?php
/**
 * Admin Route Definition
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

namespace Devkit\BlockTheme\Routes;

use Devkit\BlockTheme\Core\Interfaces,
	 Devkit\BlockTheme\Core\Abstracts;

/**
 * Admin router class
 *
 * @subpackage Route
 */
class Admin extends Abstracts\Route {
	/**
	 * Mount actions for this class
	 *
	 * @return void
	 */
	public function mountActions(): void
	{
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueueAssets' ] );
	}
	/**
	 * Enqueue admin styles and JS bundles
	 *
	 * @return void
	 */
	public function enqueueAssets(): void
	{
		$this->enqueueScript(
			'admin',
			'build/scripts/admin.bundle.js'
		);
		$this->enqueueStyle(
			'admin',
			'build/styles/admin.bundle.css'
		);
	}
}
