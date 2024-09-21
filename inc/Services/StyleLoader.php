<?php
/**
 * Router Service Definition
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

 namespace Devkit\BlockTheme\Services;

use Devkit\BlockTheme\Core\Abstracts;

/**
 * Service class for router actions
 *
 * @subpackage Services
 */
class StyleLoader extends Abstracts\Module
{
	/**
	 * Register a CSS stylesheet with WP
	 *
	 * @param string             $handle : handle to register.
	 * @param string             $src : relative path to css file.
	 * @param array<int, string> $dependencies : any dependencies that should be loaded first, optional.
	 * @param string             $version : version of CSS file, optional.
	 * @param string             $screens : what screens to register for, optional.
	 *
	 * @return string
	 */
	public function register(
		string $handle,
		string $src,
		array $dependencies = [],
		string $version = null,
		$screens = 'all'
	): string {
		/**
		 * Get full file path
		*/
		$file = get_theme_file_path( $src );
		/**
		 * Bail if local file, but empty
		*/
		if ( is_file( $file ) && ! filesize( $file ) ) {
			return $handle;
		}
		/**
		 * Load local assets if local file
		*/
		if ( is_file( $file ) ) {
			$version = $version ?? filemtime( $file );

			$full_handle = str_replace( [ '/', '\\', ' ' ], '-', $this->package ) . '-' . $handle;

			$src = get_theme_file_uri( $src );
		}

		$valid = str_starts_with( $src, '//' ) || filter_var( $src, FILTER_VALIDATE_URL );

		if ( ! $valid ) {
			return $full_handle ?? $handle;
		}

		wp_register_style(
			$full_handle ?? $handle,
			$src,
			apply_filters( "{$this->package}_{$handle}_style_dependencies", $dependencies ),
			$version,
			$screens
		);

		return $full_handle ?? $handle;
	}
	/**
	 * Enqueue a style in the dist/build directories
	 *
	 * @param string             $handle : handle to register.
	 * @param string             $src : relative path to css file.
	 * @param array<int, string> $dependencies : any dependencies that should be loaded first, optional.
	 * @param string             $version : version of CSS file, optional.
	 * @param string             $screens : what screens to register for, optional.
	 *
	 * @return void
	 */
	public function enqueue(
		string $handle,
		string $src,
		array $dependencies = [],
		string $version = null,
		$screens = 'all'
	): void {
		$handle = $this->register( $handle, $src, $dependencies, $version, $screens );
		if ( wp_style_is( $handle, 'registered' ) ) {
			wp_enqueue_style( $handle );
		}
	}
}
