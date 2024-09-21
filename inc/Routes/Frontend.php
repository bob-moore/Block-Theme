<?php
/**
 * Frontend Route Definition
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

use Devkit\BlockTheme\Core\Abstracts;

/**
 * Frontend router class
 *
 * @subpackage Route
 */
class Frontend extends Abstracts\Route {
	/**
	 * Mount actions for this class
	 *
	 * @return void
	 */
	public function mountActions(): void
	{
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueueAssets' ] );
	}
	/**
	 * Enqueue admin styles and JS bundles
	 *
	 * @return void
	 */
	public function enqueueAssets(): void
	{
		$this->enqueueScript(
			'frontend',
			'build/scripts/frontend.bundle.js'
		);
		$this->enqueueStyle(
			'frontend',
			'build/styles/frontend.bundle.css'
		);
	}
}
