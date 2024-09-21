<?php
/**
 * Image Service Definition
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @package https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

namespace Devkit\BlockTheme\Components;

use Devkit\BlockTheme\Core\Abstracts;

/**
 * Service class for image actions
 *
 * @subpackage Services
 */
class Images extends Abstracts\Module
{
	/**
	 * Add theme support for post thumbnails
	 *
	 * @return void
	 */
	public function addThemeSupport(): void
	{
		add_theme_support( 'post-thumbnails' );
	}
	/**
	 * Add custom image sizes
	 *
	 * @return void
	 */
	public function addImageSizes(): void
	{
		add_image_size( 'featured', 1200, 685, true );
	}
	/**
	 * Add custom fallback image to featured images
	 *
	 * @param int|string|null $id : image id of the featured image.
	 * @param \WP_Post        $post : post it's attached to.
	 *
	 * @return int|string|null
	 */
	public function fallbackImage( int|string|null $id, \WP_Post $post ): int|string|null
	{
		if ( ! empty( $id ) ) {
			return $id;
		}

		if ( is_singular() && is_main_query() ) {
			return $id;
		}

		return get_theme_mod( 'fallback_post_thumbnail', $id );
	}
}
