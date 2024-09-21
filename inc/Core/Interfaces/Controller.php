<?php
/**
 * Controller interface definition
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @package https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

namespace Devkit\BlockTheme\Core\Interfaces;

/**
 * Define controller requirements
 *
 * @subpackage Interfaces
 */

interface Controller
{
	/**
	 * Return an array of service definitions
	 *
	 * @return array<string, mixed>
	 */
	public static function getServiceDefinitions(): array;
}
