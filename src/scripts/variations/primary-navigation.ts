type Variation = {
	block: string;
	args: {};
};

export default < Variation >{
	block: 'core/navigation',
	args: {
		name: 'primary-navigation',
		title: 'Primary Nav',
		isDefault: false,
		attributes: {
			showSubmenuIcon: false,
			className: 'is-style-navbar',
		},
	},
};
