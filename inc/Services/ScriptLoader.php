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
class ScriptLoader extends Abstracts\Module
{
	/**
	 * Get script assets from {handle}.asset.php
	 *
	 * @param string             $path : relative path to script.
	 * @param array<int, string> $dependencies : current dependencies passed, if any.
	 * @param string             $version : current version passed, if any.
	 *
	 * @return array<string, mixed>
	 */
	private function scriptAssets( string $path, array $dependencies = [], string $version = '' )
	{
		$asset_file = get_theme_file_path( sprintf( '%s.asset.php', str_ireplace( '.js', '', $path ) ) );

		if ( is_file( $asset_file ) ) {
			$args = include $asset_file;

			$assets = [
				'dependencies' => wp_parse_args( $args['dependencies'], $dependencies ),
				'version'      => empty( $version ) ? $args['version'] : $version,
			];
		} else {
			$assets = [
				'dependencies' => $dependencies,
				'version'      => $version,
			];
		}
		return $assets;
	}
	/**
	 * Register a JS file with WordPress
	 *
	 * @param string             $handle : handle to register.
	 * @param string             $src : relative path to script.
	 * @param array<int, string> $dependencies : any set dependencies not in assets file, optional.
	 * @param string             $version : version of JS file, optional.
	 * @param boolean            $in_footer : whether to enqueue in footer, optional.
	 *
	 * @return string
	 */
	public function register(
		string $handle,
		string $src,
		array $dependencies = [],
		string $version = '',
		$in_footer = true
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
			$assets = $this->scriptAssets( $src, $dependencies, $version );

			$dependencies = $assets['dependencies'];

			$version = ! empty( $assets['version'] ) ? $assets['version'] : filemtime( $file );

			$full_handle = str_replace( [ '/', '\\', ' ' ], '-', $this->package ) . '-' . $handle;

			$src = get_theme_file_uri( $src );
		}

		$valid = str_starts_with( $src, '//' ) || filter_var( $src, FILTER_VALIDATE_URL );

		if ( ! $valid ) {
			return $full_handle ?? $handle;
		}
		/**
		* Enqueue script
		*/
		wp_register_script(
			$full_handle ?? $handle,
			$src,
			apply_filters( "{$this->package}_{$handle}_script_dependencies", $dependencies ),
			$version,
			$in_footer
		);

		return $full_handle ?? $handle;
	}
	/**
	 * Enqueue a script in the build/dist directories
	 *
	 * @param string             $handle : handle to register.
	 * @param string             $src : relative path to script.
	 * @param array<int, string> $dependencies : any set dependencies not in assets file, optional.
	 * @param string             $version : version of JS file, optional.
	 * @param boolean            $in_footer : whether to enqueue in footer, optional.
	 *
	 * @return void
	 */
	public function enqueue(
		string $handle,
		string $src,
		array $dependencies = [],
		string $version = '',
		$in_footer = true
	): void {

		$handle = $this->register( $handle, $src, $dependencies, $version, $in_footer );

		if ( wp_script_is( $handle, 'registered' ) ) {
			wp_enqueue_script( $handle );
		}
	}
}
