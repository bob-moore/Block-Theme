<?php
/**
 * Theme bootstrap file
 *
 * PHP Version 8.2
 *
 * @package Apollo
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link    https://github.com/MDMDevOps/slabyandassociates.com
 * @since   1.0.0
 */

namespace Devkit\BlockTheme;

defined( 'ABSPATH' ) || exit;

/**
 * Check to ensure autoload file exists, and load the theme
 */
if ( is_file( get_theme_file_path( 'vendor/autoload.php' ) ) ) {
	require_once get_theme_file_path( 'vendor/scoped/autoload.php' );
	require_once get_theme_file_path( 'vendor/scoped/scoper-autoload.php' );
	require_once get_theme_file_path( 'vendor/autoload.php' );
	
	Core\Factory::create( Main::class );
}
