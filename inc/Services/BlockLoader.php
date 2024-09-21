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
class BlockLoader extends Abstracts\Module
{
	/**
	 * Resolve block styles
	 *
	 * @return void
	 */
	public function loadStyles(): void
	{
		$files = glob( get_theme_file_path() . 'build/styles/blocks/**/*.css' );

		foreach ( $files as $file ) {
			$block = sprintf( '%s/%s', basename( dirname( $file ) ), pathinfo( $file, PATHINFO_FILENAME ) );

			$this->enqueueBlockStyle(
				$block,
				sprintf( '%s-%s', basename( dirname( $file ) ), pathinfo( $file, PATHINFO_FILENAME ) ),
				'build/styles/blocks/' . $block . '.css',
				[],
				(string) filemtime( $file ),
				'all',
				$file
			);
		}
	}
	/**
	 * Enqueue a block style in the dist/build directories
	 *
	 * @param string             $block_name : name of the block.
	 * @param string             $handle : handle to register.
	 * @param string             $src : relative path to css file.
	 * @param array<int, string> $dependencies : any dependencies that should be loaded first, optional.
	 * @param string             $version : version of CSS file, optional.
	 * @param string             $screens : what screens to register for, optional.
	 * @param string             $path : full path to the css file.
	 *
	 * @see https://developer.wordpress.org/reference/functions/wp_enqueue_block_style/
	 *
	 * @return void
	 */
	public function enqueueBlockStyle(
		string $block_name,
		string $handle,
		string $src,
		array $dependencies = [],
		string $version = null,
		string $screens = 'all',
		string $path = ''
	): void {
		/**
		 * Get full file path
		*/
		$file = get_theme_file_path( $src );

		/**
		 * Bail if local file, but empty
		*/
		if ( is_file( $file ) && ! filesize( $file ) ) {
			return;
		}

		/**
		 * Load local assets if local file
		*/
		if ( is_file( $file ) ) {
			$version = $version ?? filemtime( $file );

			$full_handle = str_replace( [ '/', '\\', ' ' ], '-', $this->package ) . '-' . $handle;

			$src = get_theme_file_uri( $src );
		}

		$valid = str_starts_with( $src, '//' )
			|| filter_var( $src, FILTER_VALIDATE_URL );

		if ( ! $valid ) {
			return;
		}

		wp_enqueue_block_style(
			$block_name,
			[
				'handle' => $full_handle ?? $handle,
				'src'    => $src,
				'deps'   => apply_filters( "{$this->package}_{$handle}_block_style_dependencies", $dependencies ),
				'ver'    => $version,
				'media'  => $screens,
				'path'   => is_file( $file ) ? $file : null,
			]
		);
	}
}
