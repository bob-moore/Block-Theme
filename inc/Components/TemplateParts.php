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

use Devkit\BlockTheme\Core\Abstracts;

/**
 * Service class for router actions
 *
 * @subpackage Services
 */
class TemplateParts extends Abstracts\Module
{
	/**
	 * Register custom template part areas
	 *
	 * @param array<array<string,string>> $areas : existing areas.
	 *
	 * @return array<string, mixed>
	 */
	public function registerAreas( array $areas ): array
	{
		$areas[] = [
			'area'        => 'aside',
			'area_tag'    => 'aside',
			'label'       => __( 'Aside', 'mwf_block_theme' ),
			'description' => __( 'Aside Content Area', 'mwf_block_theme' ),
			'icon'        => 'sidebar',
		];
		$areas[] = [
			'area'        => 'section',
			'area_tag'    => 'section',
			'label'       => __( 'Sections', 'mwf_block_theme' ),
			'description' => __( 'Content Sections', 'mwf_block_theme' ),
			'icon'        => 'sidebar',
		];

		return $areas;
	}
}
