<?php
/**
 * Service Controller
 *
 * PHP Version 8.2
 *
 * @package Theme
 * @author  Bob Moore <bob@bobmoore.dev>
 * @license GPL-2.0+ <http://www.gnu.org/licenses/gpl-2.0.txt>
 * @link https://github.com/bob-moore/Block-Theme
 * @since   1.0.0
 */

namespace Devkit\BlockTheme\Controllers;

use Devkit\BlockTheme\DI,
	Devkit\BlockTheme\Components as Component,
	Devkit\BlockTheme\Core\Interfaces,
	Devkit\BlockTheme\Core\Abstracts;

/**
 * Controls the registration and execution of services
 *
 * @subpackage Controllers
 */
class Components extends Abstracts\Controller
{
	/**
	 * Public constructor
	 *
	 * @param Component\Blocks        $blocks : instance of blocks component.
	 * @param Component\TemplateParts $template_parts : instance of template parts component.
	 * @param Component\Editor        $editor : instance of editor component.
	 * @param Component\Images        $images : instance of images component.
	 */
	public function __construct(
		protected Component\Blocks $blocks,
		protected Component\TemplateParts $template_parts,
		protected Component\Editor $editor,
		protected Component\Images $images
	) {
		parent::__construct();
	}
	/**
	 * Get definitions that should be added to the service container
	 *
	 * @return array<string, mixed>
	 */
	public static function getServiceDefinitions(): array
	{
		return [
			Component\Blocks::class        => DI\Utilities::autowire(),
			Component\TemplateParts::class => DI\Utilities::autowire(),
			Component\Editor::class => DI\Utilities::autowire(),
			Component\Images::class => DI\Utilities::autowire(),
		];
	}
	/**
	 * Mount actions for this class
	 *
	 * @return void
	 */
	public function mountActions(): void
	{
		add_action( 'after_setup_theme', [ $this->blocks, 'loadStyles' ] );

		add_action( 'after_setup_theme', [ $this->editor, 'addThemeSupport' ] );
		add_action( 'after_setup_theme', [ $this->editor, 'addEditorStyles' ] );
		add_action( 'enqueue_block_editor_assets', [ $this->editor, 'enqueueAssets' ] );

		add_action( 'after_setup_theme', [ $this->images, 'addThemeSupport' ] );
		add_action( 'after_setup_theme', [ $this->images, 'addImageSizes' ] );
	}
	/**
	 * Mount filters for this class
	 *
	 * @return void
	 */
	public function mountFilters(): void
	{
		add_filter( 'should_load_separate_core_block_assets', '__return_true' );
		add_filter( 'wp_theme_json_data_default', [$this->editor, 'defaultColors'] );
		
		add_filter( 'default_wp_template_part_areas', [ $this->template_parts, 'registerAreas' ] );
		add_filter( 'post_thumbnail_id', [ $this->images, 'fallbackImage' ], 10, 2 );
		add_filter( 'render_block_core/template-part', [ $this->blocks, 'addTagId' ], 10, 3 );
	}
}
