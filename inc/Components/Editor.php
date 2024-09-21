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

namespace Devkit\BlockTheme\Components;

use Devkit\BlockTheme\Core\Abstracts,
	Devkit\BlockTheme\Services;

/**
 * Service class for router actions
 *
 * @subpackage Services
 */
class Editor extends Abstracts\Module
{
	/**
	 * Undocumented function
	 *
	 * @param Services\StyleLoader  $style_loader : instance of style loader service.
	 * @param Services\ScriptLoader $script_loader : instance of script loader service.
	 */
	public function __construct(
		protected Services\StyleLoader $style_loader,
		protected Services\ScriptLoader $script_loader
	) {
		parent::__construct();
	}
	/**
	 * Enqueue assets for the block editor
	 *
	 * @return void
	 */
	public function enqueueAssets(): void
	{
		$this->script_loader->enqueue(
			'editor',
			'build/scripts/editor.bundle.js'
		);
	}
	/**
	 * Add theme support for the block editor
	 *
	 * @return void
	 */
	public function addThemeSupport(): void
	{
		add_theme_support( 'editor-styles' );
	}
	/**
	 * Add stylesheet to the block editor
	 *
	 * @return void
	 */
	public function addEditorStyles(): void
	{
		add_editor_style( 'build/styles/editor.bundle.css' );
	}
	/**
	 * Filters default colors for the block editor
	 *
	 * @param \WP_Theme_JSON_Data $theme_json default theme json data.
	 *
	 * @return \WP_Theme_JSON_Data
	 */
	public function defaultColors( \WP_Theme_JSON_Data $theme_json ): \WP_Theme_JSON_Data
	{
		$settings = $theme_json->get_data();

		$settings['settings']['color']['palette']['default'] = [
			[
				'slug' => 'red',
				'color' => '#D50101',
				'name' => 'Red',
			],
			[
				'slug' => 'pink',
				'color' => '#C51162',
				'name' => 'Pink',
			],
			[
				'slug' => 'purple',
				'color' => '#4A138C',
				'name' => 'Purple',
			],
			[
				'slug' => 'indigo',
				'color' => '#1B237E',
				'name' => 'Indigo',
			],
			[
				'slug' => 'blue',
				'color' => '#2A61FF',
				'name' => 'Blue',
			],
			[
				'slug' => 'cyan',
				'color' => '#006064',
				'name' => 'Cyan',
			],
			[
				'slug' => 'teal',
				'color' => '#004D40',
				'name' => 'Teal',
			],
			[
				'slug' => 'green',
				'color' => '#00C853',
				'name' => 'green',
			],
			[
				'slug' => 'yellow',
				'color' => '#FFEB3C',
				'name' => 'Yellow',
			],
			[
				'slug' => 'Orange',
				'color' => '#FF6D01',
				'name' => 'Orange',
			],
			[
				'slug' => 'blue-gray',
				'color' => '#37474F',
				'name' => 'Blue Gray',
			],
			[
				'slug' => 'blue-gray-50',
				'color' => '#ECEFF1',
				'name' => 'Blue Gray 50',
			],
			[
				'slug' => '900',
				'color' => '#0d0d0d',
				'name' => '900',
			],
			[
				'slug' => '800',
				'color' => '#262626',
				'name' => '800',
			],
			[
				'slug' => '700',
				'color' => '#404040',
				'name' => '700',
			],
			[
				'slug' => '600',
				'color' => '#595959',
				'name' => '600',
			],
			[
				'slug' => '500',
				'color' => '#737373',
				'name' => '500',
			],
			[
				'slug' => '400',
				'color' => '#8c8c8c',
				'name' => '400',
			],
			[
				'slug' => '300',
				'color' => '#a6a6a6',
				'name' => '300',
			],
			[
				'slug' => '200',
				'color' => '#bfbfbf',
				'name' => '200',
			],
			[
				'slug' => '100',
				'color' => '#d9d9d9',
				'name' => '100',
			],
			[
				'slug' => 'gray-50',
				'color' => '#f7f7f7',
				'name' => 'Gray 50',
			],
			[
				'slug' => 'white',
				'color' => '#FFFFFF',
				'name' => 'White',
			],
		];
		return $theme_json->update_with( $settings );
	}
}
