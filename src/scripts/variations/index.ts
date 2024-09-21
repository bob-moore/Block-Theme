import { registerBlockVariation } from '@wordpress/blocks';

import primaryNavigation from './primary-navigation';

registerBlockVariation( primaryNavigation.block, primaryNavigation.args );
