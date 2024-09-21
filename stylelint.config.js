module.exports = {
	extends: '@wordpress/stylelint-config/scss',
	rules: {
		indentation: 4,
		'number-leading-zero': null,
		// 'declaration-no-important': null,
		'no-descending-specificity': null,
		'no-duplicate-selectors': null,
		'selector-class-pattern': [
			'^[a-z]([-]?[a-z0-9]+)*(__[a-z0-9]([-]?[a-z0-9]+)*)?(--[a-z0-9]([-]?[a-z0-9]+)*)?$',
			{
				/** This option will resolve nested selectors with & interpolation. - https://stylelint.io/user-guide/rules/selector-class-pattern/#resolvenestedselectors-true--false-default-false */
				resolveNestedSelectors: true,
				/**
				 * Custom message
				 * @param {string} selectorValue
				 */
				message: function expected( selectorValue ) {
					return `Expected class selector "${ selectorValue }" to use all lowercase, and separate words with hyphens and/or BEM CSS pattern : https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/`;
				},
			},
		],
		'selector-pseudo-class-no-unknown': [
			true,
			{
				ignorePseudoClasses: [ 'global' ],
			},
		],
	},
};
